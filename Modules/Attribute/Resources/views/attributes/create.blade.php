@extends('attribute::attributes.layouts.master')

@section('title-page', 'Attributes')

@section('small-info')
<small>Add Attribute</small>
@endsection

@section('breakcumb')
<ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Admin</a></li>
    <li><a href="#">Attribute</a></li>
    <li class="active">Create</li>
</ol>
@endsection

@section('content')
    @include('attribute::attributes.layouts.form')
@endsection