@extends('permission::layouts.master')

@section('title-page', 'Permissions')

@section('small-info')
<small>Edit Permission</small>
@endsection

@section('breakcumb')
<ol class="breadcrumb">
    <li><a href="{{ route('admin') }}"><i class="fa fa-dashboard"></i> Admin</a></li>
    <li><a href="{{ route('admin.permission.index') }}">Permission</a></li>
    <li class="active">Edit</li>
</ol>
@endsection

@section('content')
    @include('permission::layouts.form')
@endsection