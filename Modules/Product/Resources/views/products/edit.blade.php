@extends('product::products.layouts.master')

@section('title-page', 'Products')

@section('small-info')
<small>Edit Product</small>
@endsection

@section('breakcumb')
<ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Admin</a></li>
    <li><a href="#">Product</a></li>
    <li class="active">Edit</li>
</ol>
@endsection

@section('content')
    @include('product::products.layouts.form')
@endsection