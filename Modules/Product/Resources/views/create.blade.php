@extends('product::layouts.master')

@section('title-page', 'Products')

@section('small-info')
<small>Add Product</small>
@endsection

@section('breakcumb')
<ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Admin</a></li>
    <li><a href="#">Product</a></li>
    <li class="active">Create</li>
</ol>
@endsection

@section('content')
    @include('product::layouts.form')
@endsection