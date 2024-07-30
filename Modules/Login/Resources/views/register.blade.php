@extends('login::layouts.master')

@section('title', 'MyPhone - Admin Register')

@section('style')
<link rel="stylesheet" href="{{ asset('themes/adminlte/plugins/iCheck/square/blue.css') }}">
<style>
    .has-feedback label ~ .form-control-feedback {
        top: 20px;
    }
</style>
@endsection

@section('body-class', 'login-page')

@section('content')
<div class="login-box" style="margin: 4% auto">
    <div class="login-logo">
        <a href="{{ route('admin') }}"><b>Register</b></a>
    </div>
    <div class="mp-alert">
        @if (session('danger'))
            <div class="alert alert-danger">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h4>Danger</h4>
                <p>{{ session('danger') }}</p>
            </div>
        @endif
        @if(session('errors'))
            <div class="alert alert-danger">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h4>Error</h4>
                @foreach(get_messages(session('errors')) as $message)
                <p>{{ $message }}</p>
                @endforeach
            </div>
        @endif
    </div>
    <!-- /.login-logo -->
    <div class="login-box-body">
        <p class="login-box-msg">Register a new membership</p>
    
        <form action="{{ route('admin.login.register') }}" method="POST">
            @csrf
            <div class="form-group has-feedback">
                <label for="account" class="control-label">Account</label>
                <input type="text" class="form-control" placeholder="Enter account" name="account" id="account">
            </div>
            <div class="form-group has-feedback">
                <label for="email" class="control-label">Email</label>
                <input type="text" class="form-control" placeholder="Email" name="email" id="email">
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <div class="form-group has-feedback">
                        <label for="firstname" class="control-label">Firstname</label>
                        <input type="text" class="form-control" placeholder="Firstname" name="firstname" id="firstname">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group has-feedback">
                        <label for="lastname" class="control-label">Lastname</label>
                        <input type="text" class="form-control" placeholder="Lastname" name="lastname" id="lastname">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <div class="form-group has-feedback">
                        <label for="gender" class="control-label">Gender</label>
                        <select name="gender" class="form-control" id="gender">
                            @foreach($genders as $gender)
                            <option value="{{ $gender->code }}">{{ $gender->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group has-feedback">
                        <label for="job" class="control-label">Job</label>
                        <input type="text" class="form-control" placeholder="Job" name="job" id="job">
                    </div>
                </div>
            </div>
            <div class="form-group has-feedback">
                <label for="password" class="control-label">Password</label>
                <input type="password" class="form-control" placeholder="Password" name="password" id="password">
            </div>
            <div class="form-group has-feedback">
                <label for="password_confirmation" class="control-label">Repassword</label>
                <input type="password" class="form-control" placeholder="Retype Password" name="password_confirmation" id="password_confirmation">
            </div>
            <div class="row">
                <div class="col-xs-8">
                    <div class="checkbox icheck">
                    <label>
                        <input type="checkbox" name="agree_terms">  I agree to the terms
                    </label>
                    </div>
                </div>
                <!-- /.col -->
                <div class="col-xs-4">
                    <button type="submit" class="btn btn-primary btn-block btn-flat">Register</button>
                </div>
                <!-- /.col -->
            </div>
        </form>
    
        <a href="{{ route('admin.login.index') }}" class="text-center">I already have a membership</a>
  
    </div>
    <!-- /.login-box-body -->
  </div>
@endsection

@push('script')
<script src="{{ asset('themes/adminlte/plugins/iCheck/icheck.js') }}"></script>
<script>
$(function () {
    $('input').iCheck({
    checkboxClass: 'icheckbox_square-blue',
    radioClass: 'iradio_square-blue',
    increaseArea: '20%' /* optional */
    });
});
</script>
@endpush
