@extends('login::layouts.master')

@section('title', 'MyPhone - Admin Login')

@section('style')
<link rel="stylesheet" href="{{ asset('themes/adminlte/plugins/iCheck/square/blue.css') }}">
@endsection

@section('body-class', 'login-page')

@section('content')
<div class="login-box">
    <div class="login-logo">
        <a href="{{ route('admin') }}"><b>Select Your Role</b></a>
    </div>
    <div class="mp-alert">
        @if (session('danger'))
            <div class="alert alert-danger">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h4>Danger</h4>
                <p>{{ session('danger') }}</p>
            </div>
        @elseif (session('success'))
            <div class="alert alert-success">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h4>Success</h4>
                <p>{{ session('success') }}</p>
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
        <p class="login-box-msg">Select your role</p>
    
        <form action="{{ route('admin.login.set_role') }}" method="POST">
            @csrf
            @foreach($user->roles as $role)
            <div class="form-group has-feedback">
                <input type="hidden" class="form-control" name="account">
                <button type="button" class="btn-block btn-success px-2" data-value="{{ $role->id }}">{{ $role->name }}</button>
            </div>
            @endforeach
            <input type="hidden" name="role">
        </form>
    </div>
    <!-- /.login-box-body -->
  </div>
@endsection

@push('script')
<script>
$(function () {
    $('.btn-block').click(function() {
        $('input[name=role]').val($(this).data('value'))
        console.log($(this).data('value'))
        $('form').submit()
    })
});
</script>
@endpush
