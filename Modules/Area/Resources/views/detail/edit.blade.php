@extends('area::detail.layouts.master')

@section('title-page', 'Area Details')

@section('small-info')
<small>Edit Area Detail</small>
@endsection

@section('breakcumb')
<ol class="breadcrumb">
    <li><a href="{{ route('admin') }}"><i class="fa fa-dashboard"></i> Admin</a></li>
    <li><a href="{{ route('admin.area.index') }}">Area</a></li>
    <li><a href="{{ route('admin.area.detail.index', $area_id) }}">Detail</a></li>
    <li class="active">Edit</li>
</ol>
@endsection

@section('content')
    @include('area::detail.layouts.form')
@endsection