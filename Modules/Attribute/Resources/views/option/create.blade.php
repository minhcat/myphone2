@extends('attribute::option.layouts.master')

@section('title-page', 'Options')

@section('small-info')
<small>Add Options</small>
@endsection

@section('breakcumb')
<ol class="breadcrumb">
    <li><a href="{{ route('admin') }}"><i class="fa fa-dashboard"></i> Admin</a></li>
    <li><a href="{{ route('admin.attribute.index') }}">Attribute</a></li>
    <li><a href="{{ route('admin.attribute.option.index', $attribute_id) }}">Option</a></li>
    <li class="active">Create</li>
</ol>
@endsection

@section('content')
    @include('attribute::option.layouts.form')
@endsection