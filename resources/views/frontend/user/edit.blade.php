@extends('layouts.frontend')
@push('styles')
    {!! Html::style(asset('frontend/css/daterangepicker.css')) !!}
    {!! Html::style(asset('frontend/css/jquery.mCustomScrollbar.min.css')) !!}
    {!! Html::style(asset('frontend/css/bootstrap-select.css')) !!}
@endpush
@section('main')
<!-- Main Header Your Account -->
<div class="main-header bg-account" id="app">
    <profile></profile>
    <div class="container">
        <div class="row">
            <div class="col-lg-8 offset-lg-2 col-md-8 offset-md-2 col-sm-12 col-xs-12">
                <div class="main-header-content">
                    <h1>Your Account Dashboard</h1>
                    <p>Welcome to your account dashboard! Here you’ll find everything you need to change your
                        profile information, settings, read notifications and requests, view your latest messages,
                        change your pasword and much more! Also you can create or manage your own favourite page, have fun!
                    </p>
                </div>
            </div>
        </div>
    </div>
    {!! Html::image(asset('images/account-bottom.png'), 'friends', ['class' => 'img-bottom']) !!}
</div>
<!-- ... end Main Header Your Account -->

<!-- Your Account Personal Information -->
<div class="container">
    <div class="row">
        <div class="col-xl-9 push-xl-3 col-lg-9 push-lg-3 col-md-12 col-sm-12 col-xs-12">
            <div class="ui-block">
                <div class="ui-block-title">
                    <h6 class="title">Personal Information</h6>
                </div>
                <div class="ui-block-content">
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
                </div>
            </div>
            <div class="ui-block">
                <div class="ui-block-title">
                    <h6 class="title">Change Password</h6>
                </div>
                <div class="ui-block-content">
                    <form>
                        <div class="row">

                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="form-group label-floating">
                                    <label class="control-label">Confirm Current Password</label>
                                    <input class="form-control" placeholder="" type="password" value="Olympus-2017">
                                </div>
                            </div>

                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                <div class="form-group label-floating">
                                    <label class="control-label">Your New Password</label>
                                    <input class="form-control" placeholder="" type="password">
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                <div class="form-group label-floating">
                                    <label class="control-label">Confirm New Password</label>
                                    <input class="form-control" placeholder="" type="password">
                                </div>
                            </div>
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <button class="btn btn-primary btn-lg full-width">Change Password Now!</button>
                            </div>

                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-xl-3 pull-xl-9 col-lg-3 pull-lg-9 col-md-12 col-sm-12 col-xs-12">
            <div class="ui-block">
                <div class="your-profile">
                    <div class="ui-block-title ui-block-title-small">
                        <h6 class="title">Your PROFILE</h6>
                    </div>

                    <div id="accordion" role="tablist" aria-multiselectable="true">
                        <div class="card">
                            <div class="card-header" role="tab" id="headingOne">
                                <h6 class="mb-0">
                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                        Profile Settings
                                        <svg class="olymp-dropdown-arrow-icon"><use xlink:href="icons/icons.svg#olymp-dropdown-arrow-icon"></use></svg>
                                    </a>
                                </h6>
                            </div>

                            <div id="collapseOne" class="collapse show" role="tabpanel" aria-labelledby="headingOne">
                                <ul class="your-profile-menu">
                                    <li>
                                        <a href="28-YourAccount-PersonalInformation.html">Personal Information</a>
                                    </li>
                                    <li>
                                        <a href="29-YourAccount-AccountSettings.html">Account Settings</a>
                                    </li>
                                    <li>
                                        <a href="30-YourAccount-ChangePassword.html">Change Password</a>
                                    </li>
                                    <li>
                                        <a href="31-YourAccount-HobbiesAndInterests.html">Hobbies and Interests</a>
                                    </li>
                                    <li>
                                        <a href="32-YourAccount-EducationAndEmployement.html">Education and Employement</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="ui-block-title">
                        <a href="33-YourAccount-Notifications.html" class="h6 title">Notifications</a>
                        <a href="#" class="items-round-little bg-primary">8</a>
                    </div>
                    <div class="ui-block-title">
                        <a href="34-YourAccount-ChatMessages.html" class="h6 title">Chat / Messages</a>
                    </div>
                    <div class="ui-block-title">
                        <a href="35-YourAccount-FriendsRequests.html" class="h6 title">Friend Requests</a>
                        <a href="#" class="items-round-little bg-blue">4</a>
                    </div>
                    <div class="ui-block-title ui-block-title-small">
                        <h6 class="title">FAVOURITE PAGE</h6>
                    </div>
                    <div class="ui-block-title">
                        <a href="36-FavPage-SettingsAndCreatePopup.html" class="h6 title">Create Fav Page</a>
                    </div>
                    <div class="ui-block-title">
                        <a href="36-FavPage-SettingsAndCreatePopup.html" class="h6 title">Fav Page Settings</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- ... end Your Account Personal Information -->
@endsection
@push('scripts')
    <!-- Datepicker input field script-->
    {!! Html::script(asset('frontend/js/moment.min.js')) !!}
    {!! Html::script(asset('frontend/js/daterangepicker.min.js')) !!}
    {!! Html::script(asset('frontend/js/mediaelement-and-player.min.js')) !!}
    {!! Html::script(asset('frontend/js/mediaelement-playlist-plugin.min.js')) !!}
@endpush
