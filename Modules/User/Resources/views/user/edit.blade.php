@extends('user::user.layouts.master')

@section('title-page', 'Users')

@section('small-info')
<small>Edit User</small>
@endsection

@section('breakcumb')
<ol class="breadcrumb">
    <li><a href="{{ route('admin') }}"><i class="fa fa-dashboard"></i> Admin</a></li>
    <li><a href="{{ route('admin.user.index') }}">User</a></li>
    <li class="active">Edit</li>
</ol>
@endsection

@section('content')
    @include('user::user.layouts.form')
@endsection