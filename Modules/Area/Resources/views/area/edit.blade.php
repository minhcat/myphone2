@extends('area::area.layouts.master')

@section('title-page', 'Areas')

@section('small-info')
<small>Edit Area</small>
@endsection

@section('breakcumb')
<ol class="breadcrumb">
    <li><a href="{{ route('admin') }}"><i class="fa fa-dashboard"></i> Admin</a></li>
    <li><a href="{{ route('admin.area.index') }}">Area</a></li>
    <li class="active">Edit</li>
</ol>
@endsection

@section('content')
    @include('area::area.layouts.form')
@endsection