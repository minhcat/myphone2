@extends('login::layouts.master')

@section('style')
<link rel="stylesheet" href="{{ asset('themes/adminlte/plugins/iCheck/square/blue.css') }}">
@endsection

@section('body-class', 'login-page')

@section('content')
<div class="login-box">
    <div class="login-logo">
        <a href="{{ route('admin') }}"><b>Login</b></a>
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
        <p class="login-box-msg">Sign in to start your session</p>
    
        <form action="{{ route('admin.login.login') }}" method="POST">
            @csrf
            <div class="form-group has-feedback">
                <input type="text" class="form-control" placeholder="Account or Email" name="account">
                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
                <input type="password" class="form-control" placeholder="Password" name="password">
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            </div>
            <div class="row">
                <div class="col-xs-8">
                    <div class="checkbox icheck">
                    <label>
                        <input type="checkbox" name="remember"> Remember Me
                    </label>
                    </div>
                </div>
                <!-- /.col -->
                <div class="col-xs-4">
                    <button type="submit" class="btn btn-primary btn-block btn-flat">Login</button>
                </div>
                <!-- /.col -->
            </div>
        </form>
    
        <a href="register.html" class="text-center">Register a new admin</a>
  
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
