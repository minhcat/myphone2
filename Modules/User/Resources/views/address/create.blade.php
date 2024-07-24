@extends('user::address.layouts.master')

@section('title-page', 'User Addresses')

@section('small-info')
<small>Add User Address</small>
@endsection

@section('breakcumb')
<ol class="breadcrumb">
    <li><a href="{{ route('admin') }}"><i class="fa fa-dashboard"></i> Admin</a></li>
    <li><a href="{{ route('admin.user.index') }}">User</a></li>
    <li><a href="{{ route('admin.user.address.index', $user_id) }}">Address</a></li>
    <li class="active">Create</li>
</ol>
@endsection

@section('content')
    @include('user::address.layouts.form')
@endsection