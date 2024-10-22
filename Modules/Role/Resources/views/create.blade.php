@extends('role::layouts.master')

@section('title-page', 'Cities')

@section('small-info')
<small>Add Role</small>
@endsection

@section('breakcumb')
<ol class="breadcrumb">
    <li><a href="{{ route('admin') }}"><i class="fa fa-dashboard"></i> Admin</a></li>
    <li><a href="{{ route('admin.role.index') }}">Role</a></li>
    <li class="active">Create</li>
</ol>
@endsection

@section('content')
    @include('role::layouts.form')
@endsection