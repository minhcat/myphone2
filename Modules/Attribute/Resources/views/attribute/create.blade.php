@extends('attribute::attribute.layouts.master')

@section('title-page', 'Attributes')

@section('small-info')
<small>Add Attribute</small>
@endsection

@section('breakcumb')
<ol class="breadcrumb">
    <li><a href="{{ route('admin') }}"><i class="fa fa-dashboard"></i> Admin</a></li>
    <li><a href="{{ route('admin.attribute.index') }}">Attribute</a></li>
    <li class="active">Create</li>
</ol>
@endsection

@section('content')
    @include('attribute::attribute.layouts.form')
@endsection