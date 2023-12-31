@extends('admin.includes.app')
@section('title', 'Profile')
@section('content')


    <!-- BEGIN: Content-->
    <div class="app-content content ">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">
            <div class=" content-header row">
                <div style="margin-bottom: 30px;" class="content-header-left col-md-9 col-12">
                    <div class="row breadcrumbs-top">
                        <div class="col-12">
                            <h2 class="content-header-title float-left mb-0">Account Settings</h2>
                            <div class="breadcrumb-wrapper">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a>
                                    </li>
                                    <li class="breadcrumb-item active"> Account Settings
                                    </li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <div class="content-body">
                <!-- account setting page -->
                <section id="page-account-settings">
                    <div class="row">
                        <!-- left menu section -->
                        <div class="col-md-3 mb-2 mb-md-0">
                            <ul class="nav nav-pills flex-column nav-left">
                                <!-- general -->
                                <li class="nav-item">
                                    <a class="nav-link {{ $errors->updatePassword->any() ? '' : 'active' }} "
                                        id="account-pill-general" data-toggle="pill" href="#account-vertical-general"
                                        aria-expanded="true">
                                        <i data-feather="user" class="font-medium-3 mr-1"></i>
                                        <span class="font-weight-bold">Admin Profile</span>
                                    </a>
                                </li>

                                <!-- change password -->
                                <li class="nav-item">
                                    <a class="nav-link  {{ $errors->updatePassword->any() ? 'active' : '' }}"
                                        id="account-pill-password" data-toggle="pill" href="#account-vertical-password"
                                        aria-expanded="false">
                                        <i data-feather="lock" class="font-medium-3 mr-1"></i>
                                        <span class="font-weight-bold">Change Password</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="col-md-9">

                            {{-- <x-input-error :messages="$errors->updatePassword->get('current_password')" class="alert alert-danger alert-validation-msg err-msg" />
                            <x-input-error :messages="$errors->updatePassword->get('current_password')" class="alert alert-danger alert-validation-msg err-msg" />
                            <x-input-error :messages="$errors->updatePassword->get('current_password')" class="alert alert-danger alert-validation-msg err-msg" /> --}}
                            <div class="card">
                                <div class="card-body">
                                    <div class="tab-content">
                                        <!-- general tab -->
                                        <div role="tabpanel"
                                            class="tab-pane  {{ $errors->updatePassword->any() ? 'fade' : 'active' }}"
                                            id="account-vertical-general" aria-labelledby="account-pill-general">
                                            <form method="post" enctype="multipart/form-data"
                                                action="{{ route('profile.update') }}" class="mt-6 space-y-6">
                                                @csrf
                                                @method('patch')
                                                <div class="mb-20 media">
                                                    <a href="javascript:void(0);" class="mr-25">

                                                        <img src="{{ Auth::user()->profile_img ? url('profilee/' . Auth::user()->profile_img) : url('profilee/user.jpg') }}"
                                                            id="account-upload-img" class="rounded mr-50"
                                                            alt="{{ Auth::user()->name }} profile image" height="80"
                                                            width="80">
                                                    </a>
                                                    <div class="media-body mt-75 ml-1">

                                                        <button type="button"
                                                            class="btn btn-sm btn-primary mr-0 mr-sm-1 mb-1 mb-sm-0"
                                                            data-toggle="modal" data-target="#addImagePopup">
                                                            Change Profile Picture
                                                        </button>
                                                        @if (Auth::user()->profile_img)
                                                            <a href="{{ route('profile.image.destroy') }}"
                                                                onclick="confirm('are your sure you want to delete your profile picture')"
                                                                class="btn btn-sm btn-danger mr-0 mr-sm-1 mb-1 mb-sm-0">
                                                                Delete Profile Picture
                                                            </a>
                                                        @endif

                                                    </div>
                                                </div>

                                                <div style="margin-top: 15px;" class="row">
                                                    <div class="col-12 mb-2 col-sm-6">
                                                        <x-input-label for="name" :value="__('Name')" />
                                                        <x-text-input id="name" name="name" type="text"
                                                            class="form-control" value="{{ Auth::user()->name }}" autofocus
                                                            autocomplete="name" />
                                                        <x-input-error
                                                            class="alert alert-danger mt-1 alert-validation-msg err-msg mt-2 "
                                                            :messages="$errors->get('name')" />
                                                    </div>


                                                    <div class="col-12 col-sm-6">
                                                        <x-input-label for="email" :value="__('Email')" />
                                                        <x-text-input id="email" name="email" type="email"
                                                            class="form-control" value="{{ Auth::user()->email }}" autofocus
                                                            autocomplete="email" />
                                                        <x-input-error
                                                            class="alert alert-danger mt-1 alert-validation-msg err-msg mt-2 "
                                                            :messages="$errors->get('email')" />
                                                    </div>
                                                    <div class="col-12 col-sm-6">
                                                        <div class="form-group">
                                                            <x-input-label for="phone_no" :value="__('Phone no')" />
                                                            <x-text-input id="phone_no" name="phone_no" type="text"
                                                                class="form-control" value="{{ Auth::user()->phone_no }}"
                                                                autofocus autocomplete="phone_no" />
                                                            <x-input-error :messages="$errors->get('phone_no')"
                                                                class="alert alert-danger mt-1 alert-validation-msg err-msg mt-2 " />
                                                        </div>
                                                    </div>


                                                    <div class="col-12">
                                                        <button type="submit" class="btn btn-primary mt-2 mr-1">Save
                                                            changes</button>

                                                        @if (session('status') === 'profile-updated')
                                                            <p x-data="{ show: true }" x-show="show" x-transition
                                                                x-init="setTimeout(() => show = false, 2000)"
                                                                class="text-sm text-gray-600 dark:text-gray-400">
                                                                {{ __('Profile Saved Successfully.') }}
                                                            </p>
                                                        @endif
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                        <!-- change password -->
                                        <div class="tab-pane   {{ $errors->updatePassword->any() ? 'active' : 'fade' }}"
                                            id="account-vertical-password" role="tabpanel"
                                            aria-labelledby="account-pill-password">
                                            <!-- form -->

                                                <form method="post" action="{{ route('password.update') }}"
                                                    class="mt-6 space-y-6">
                                                    @csrf
                                                    @method('put')
                                                    <div class="col-12 col-sm-6">
                                                        <div class="form-group">
                                                            <label for="account-old-password">Current Password</label> <br>

                                                            <div
                                                                class="input-group form-password-toggle input-group-merge">
                                                                <x-text-input id="current_password"
                                                                    name="current_password" type="password"
                                                                    class="form-control"
                                                                    autocomplete="current-password" />
                                                                <div class="input-group-append">
                                                                    <div class="input-group-text cursor-pointer">
                                                                        <i data-feather="eye"></i>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <x-input-error :messages="$errors->updatePassword->get('current_password')" class="err-msg" />
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-sm-6">
                                                        <div class="form-group">
                                                            <label for="account-old-password">New Password</label> <br>
                                                            <div
                                                                class="input-group form-password-toggle input-group-merge">
                                                                <x-text-input id="password" name="password"
                                                                    type="password" class="form-control"
                                                                    autocomplete="new-password" />
                                                                <div class="input-group-append">
                                                                    <div class="input-group-text cursor-pointer">
                                                                        <i data-feather="eye"></i>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <x-input-error :messages="$errors->updatePassword->get('password')" class="err-msg" />
                                                        </div>
                                                    </div>

                                                    <div class="col-12 col-sm-6">
                                                        <div class="form-group">
                                                            <label for="password_confirmation">Confirm
                                                                Password</label>
                                                            <br>
                                                            <div
                                                                class="input-group form-password-toggle input-group-merge">
                                                                <x-text-input id="password_confirmation"
                                                                    name="password_confirmation" type="password"
                                                                    class="form-control" autocomplete="new-password" />
                                                                <div class="input-group-append">
                                                                    <div class="input-group-text cursor-pointer">
                                                                        <i data-feather="eye"></i>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <x-input-error :messages="$errors->updatePassword->get(
                                                                'password_confirmation',
                                                            )"class="err-msg" />
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <button class="btn btn-primary mr-1 ">Save
                                                            changes</button>
                                                        @if (session('status') === 'password-updated')
                                                            <p x-data="{ show: true }" x-show="show" x-transition
                                                                x-init="setTimeout(() => show = false, 2000)"
                                                                class="text-sm text-gray-600 dark:text-gray-400">
                                                                {{ __('Saved.') }}
                                                            </p>
                                                        @endif
                                                    </div>

                                                </form>

                                        </div>
                                        <!--/ change password -->
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--/ right content section -->
                    </div>
                </section>
                <!-- / account setting page -->
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="addImagePopup" tabindex="-1" role="dialog" aria-labelledby="addImagePopupLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addImagePopupLabel">
                        Add Image
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form class="form" action="{{ route('profile.image.update') }}" method="post"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class=" col-12">
                                <div class="form-group">
                                    <label for="profile_image">
                                        Project Image
                                        <span class="text-danger">
                                            (300 x 200 px)
                                        </span>
                                    </label>
                                    <div class="custom-file">
                                        <input type="file" name="profile_image" class="custom-file-input"
                                            id="profile_image">
                                        <label class="custom-file-label" for="profile_image">
                                            Choose file
                                        </label>
                                    </div>
                                    @error('profile_image')
                                        <span class="text-danger">
                                            {{ $message }}
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-12">
                                <button type="submit" class="btn btn-primary mr-1">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">
                        Close
                    </button>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    @if ($errors->any())
        <script>
            $('#addImagePopup').modal('show')
        </script>
    @endif
@endsection
