<template lang="html">
<form>
    <div class="row">
        <div class="col-lg-12 col-md-6 col-sm-12 col-xs-12">
            <div class="form-group label-floating">
                <label class="control-label">Name</label>
                <input class="form-control" placeholder="" type="text" value="{{ $user->name }}">
            </div>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
            <div class="form-group label-floating">
                <label class="control-label">Your Email</label>
                <input class="form-control" placeholder="" type="email" value="{{ $user->email }}">
            </div>
            <div class="form-group date-time-picker label-floating">
                <label class="control-label">Your Birthday</label>
                <input name="datetimepicker" value="{{ $user->birthday }}" />
                <span class="input-group-addon">
                    <svg class="olymp-month-calendar-icon icon"><use xlink:href="{{ asset('frontend/icons/icons.svg#olymp-month-calendar-icon') }}"></use></svg>
                </span>
            </div>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
            <div class="form-group label-floating">
                <label class="control-label">Your address</label>
                <textarea class="form-control" placeholder="">{{ $user->address }}</textarea>
            </div>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
            <div class="form-group label-floating">
                <label class="control-label">Write a little description about you</label>
                <textarea class="form-control" placeholder="">Hi, I’m James, I’m 36 and I work as a Digital Designer for the  “Daydreams” Agency in Pier 56</textarea>
            </div>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
            <div class="form-group label-floating">
                <label class="control-label">Your Phone Number</label>
                <input class="form-control" placeholder="" type="text" value="{{ $user->phone }}">
            </div>
            <div class="form-group label-floating is-select">
                <label class="control-label">Your Gender</label>
                <select class="selectpicker form-control">
                    <option value="MA">Male</option>
                    <option value="FE">Female</option>
                </select>
            </div>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
            <button class="btn btn-secondary btn-lg full-width">Restore all Attributes</button>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
            <button class="btn btn-primary btn-lg full-width">Save all Changes</button>
        </div>

    </div>
</form>
</template>

<script>
export default {

}
</script>

<style lang="scss">
</style>
