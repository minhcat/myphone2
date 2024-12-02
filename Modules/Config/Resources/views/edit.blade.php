@extends('config::layouts.master')

@section('title-page', 'Configs')

@section('small-info')
<small>Edit Config</small>
@endsection

@section('breakcumb')
<ol class="breadcrumb">
    <li><a href="{{ route('admin') }}"><i class="fa fa-dashboard"></i> Admin</a></li>
    <li><a href="{{ route('admin.config.index') }}">Config</a></li>
    <li class="active">Edit</li>
</ol>
@endsection

@section('content')
    @include('config::layouts.form')
@endsection