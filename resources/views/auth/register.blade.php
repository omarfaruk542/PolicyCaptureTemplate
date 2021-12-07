@extends('adminpanel.dashboard')
@section('dashboard')
    <div class="content-header">
        <!-- Notification -->
        @if (session('status'))
            <div class="toast message" style="position: absolute; top: 60px; right: 0; z-index: 1070; width:300px;"
                data-delay="5000">
                <div class="toast-header bg-success">
                    <strong class="mr-auto">Success</strong>
                    <small>Just Now</small>
                    <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="toast-body">
                    <div>
                        <i class="fas fa-check-square mr-2 text-success"></i>
                        <span>{{ session('status') }}</span>

                    </div>
                </div>
            </div>
        @endif
        <!-- Notification -->
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">CSL Software Resources Ltd.</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('user.index') }}">User List</a></li>
                        <li class="breadcrumb-item active">Create User</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <!-- main content -->
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Register') }}</div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('register') }}">
                            @csrf
                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                                        name="name" value="{{ old('name') }}" autocomplete="name" autofocus
                                        placeholder="Enter user name">

                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="email"
                                    class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                        name="email" value="{{ old('email') }}" autocomplete="email"
                                        placeholder="Enter email address">

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="number"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Contact Number') }}</label>

                                <div class="col-md-6">
                                    <input id="number" type="text"
                                        class="form-control @error('number') is-invalid @enderror" name="number"
                                        value="{{ old('number') }}" autocomplete="number"
                                        placeholder="Enter contact number">
                                    @error('number')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="company"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Select Company') }}</label>

                                <div class="col-md-6">
                                    <select class="form-control select2 select2-hidden-accessible" style="width: 100%;"
                                        data-select2-id="1" tabindex="-1" aria-hidden="true"
                                        data-placeholder="Select Company" name="company" value="{{ old('company') }}" id="company">
                                        <option value="0" selected="selected" disabled>Select Company</option>
                                    </select>
                                    @error('company')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password" type="password"
                                        class="form-control @error('password') is-invalid @enderror" name="password"
                                        autocomplete="new-password" placeholder="Enter password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password-confirm"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>
                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control"
                                        name="password_confirmation" autocomplete="new-password"
                                        placeholder="Enter confirm password">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-4"></div>
                                <div class="col-md-6 d-flex justify-content-start">
                                    <div class="custom-control custom-checkbox mr-5">
                                        <input class="custom-control-input" type="checkbox" id="for_client"
                                            checked="true" name="for_client">
                                        <label for="for_client" class="custom-control-label">Is Client</label>
                                    </div>
                                    <div class="custom-control custom-checkbox">
                                        <input class="custom-control-input" type="checkbox" id="user_active"
                                            checked="true" name="is_active">
                                        <label for="user_active" class="custom-control-label">Is Active</label>
                                    </div>
                                </div>
                                </div>


                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary float-right">
                                        {{ __('Register') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
