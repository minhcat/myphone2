@extends('example::layouts.master')

@section('title-page', 'Examples')

@section('small-info')
<small>Edit Example</small>
@endsection

@section('breakcumb')
<ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Admin</a></li>
    <li><a href="#">Example</a></li>
    <li class="active">Edit</li>
</ol>
@endsection

@section('content')
    @include('example::layouts.form')
@endsection