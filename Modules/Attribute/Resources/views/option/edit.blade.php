@extends('attribute::option.layouts.master')

@section('title-page', 'Options')

@section('small-info')
<small>Edit Options</small>
@endsection

@section('breakcumb')
<ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Admin</a></li>
    <li><a href="#">Attribute</a></li>
    <li><a href="#">Option</a></li>
    <li class="active">Edit</li>
</ol>
@endsection

@section('content')
    @include('attribute::option.layouts.form')
@endsection