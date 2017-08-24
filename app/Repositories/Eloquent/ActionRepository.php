<?php

namespace App\Repositories\Eloquent;

use Exception;
use Carbon\Carbon;
use App\Models\Media;
use App\Models\Action;
use App\Models\Activity;
use App\Traits\Common\UploadableTrait;
use App\Exceptions\Api\UnknowException;
use App\Repositories\Contracts\ActionInterface;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class ActionRepository extends BaseRepository implements ActionInterface
{
    use UploadableTrait;

    public function model()
    {
        return Action::class;
    }

    public function createOrDeleteLike($action, $userId)
    {
        if (!is_numeric($userId) || !$action) {
            return false;
        }

        if ($action->likes->where('user_id', $userId)->isEmpty()) {
            return $this->createByRelationship('likes', [
                'model' => $action,
                'attribute' => ['user_id' => $userId],
            ]);
        }

        return $action->likes()->where('user_id', $userId)->first()->forceDelete();
    }

    public function showAction($action, $userId)
    {
        $data = [];
        $actions = $this->model->where('id', $action->id)
            ->getLikes()
            ->getComments()
            ->with('user', 'media');

        $data['list_action'] = $actions->first();
        $data['checkLikeAction'] = $this->checkLike($action, $userId);

        return $data;
    }

    public function update($action, $inputs)
    {
        if (!empty($inputs['upload'])) {
            $result = $this->createDataMedias($inputs['upload']);
            $action->media()->createMany($result);
        }

        return parent::update($action->id, $inputs['data_action']);
    }

    public function create($inputs)
    {
        $action = parent::create($inputs['data_action']);
        $action->activities()->create([
            'user_id' => $inputs['data_action']['user_id'],
            'name' => Activity::CREATE,
        ]);

        if (!is_null($inputs['upload'])) {
            $media = $this->createDataMedias($inputs['upload']);
            $action->media()->createMany($media);
        }

        return true;
    }

    public function getActionPaginate($action, $userId)
    {
        $data = [];

        $data['list_action'] = $action
            ->getLikes()
            ->getComments()
            ->with('user', 'media')
            ->orderBy('created_at', 'DESC')
            ->paginate(config('settings.actions.paginate_in_event'));

        $data['checkLikeAction'] = $this->checkLike($action, $userId);

        return $data;
    }

    public function searchAction($eventId, $key)
    {
        return $this->model
            ->with('user', 'media')
            ->where('event_id', $eventId)
            ->search($key, null, true)
            ->orderBy('created_at', 'DESC')
            ->paginate(config('settings.actions.paginate_in_event'));
    }

    public function getActionPhotos($eventIds, $userId)
    {
        $actions = $this->model
            ->whereIn('event_id', $eventIds)
            ->getLikes()
            ->getComments()
            ->with('user', 'media')
            ->whereHas('media', function ($query) {
                $query->where('type', Media::IMAGE)
                    ->orderBy('created_at', 'desc');
            });

        $dataAction['list_action'] = $actions->orderBy('created_at', 'DESC')
            ->paginate(config('settings.pagination.action'));

        $dataAction['checkLikeAction'] = $this->checkLike($actions, $userId);

        return $dataAction;
    }

    public function delete($action)
    {
        if ($action) {
            $action->comments()->delete();
            $action->likes()->delete();
            $action->media()->delete();
            $action->activities()->delete();

            return $action->delete();
        }

        return false;
    }

    public function deleteFromEvent($actions)
    {
        $actionIds = $actions->pluck('id');
        $actions = $this->model->whereIn('id', $actionIds);
        \DB::table('media')
            ->whereIn('mediable_id', $actionIds)
            ->where('mediable_type', Action::class)
            ->update(['deleted_at' => Carbon::Now()]);
        \DB::table('comments')
            ->whereIn('commentable_id', $actionIds)
            ->where('commentable_type', \App\Models\Action::class)
            ->update(['deleted_at' => Carbon::Now()]);
        \DB::table('likes')
            ->whereIn('likeable_id', $actionIds)
            ->where('likeable_type', \App\Models\Action::class)
            ->update(['deleted_at' => Carbon::Now()]);
        \DB::table('activities')
            ->whereIn('activitiable_id', $actionIds)
            ->where('activitiable_type', \App\Models\Action::class)
            ->update(['deleted_at' => Carbon::Now()]);

        return $actions->delete();
    }
}
