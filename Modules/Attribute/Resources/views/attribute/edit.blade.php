@extends('attribute::attribute.layouts.master')

@section('title-page', 'Attributes')

@section('small-info')
<small>Edit Attribute</small>
@endsection

@section('breakcumb')
<ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Admin</a></li>
    <li><a href="#">Attribute</a></li>
    <li class="active">Edit</li>
</ol>
@endsection

@section('content')
    @include('attribute::attribute.layouts.form')
@endsection