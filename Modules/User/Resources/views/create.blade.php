@extends('user::layouts.master')

@section('title-page', 'Users')

@section('small-info')
<small>Add User</small>
@endsection

@section('breakcumb')
<ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Admin</a></li>
    <li><a href="#">User</a></li>
    <li class="active">Create</li>
</ol>
@endsection

@section('content')
    @include('user::layouts.form')
@endsection