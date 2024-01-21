@extends('category::layouts.master')

@section('title-page', 'Categories')

@section('small-info')
<small>Edit Category</small>
@endsection

@section('breakcumb')
<ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Admin</a></li>
    <li><a href="#">Category</a></li>
    <li class="active">Edit</li>
</ol>
@endsection

@section('content')
    @include('category::layouts.form')
@endsection