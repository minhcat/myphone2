@extends('product::variation.layouts.master')

@section('title-page', 'Variations')

@section('small-info')
<small>Edit Variation</small>
@endsection

@section('breakcumb')
<ol class="breadcrumb">
    <li><a href="{{ route('admin') }}"><i class="fa fa-dashboard"></i> Admin</a></li>
    <li><a href="{{ route('admin.product.index') }}">Product</a></li>
    <li><a href="{{ route('admin.product.variation.index', $product_id) }}">Variation</a></li>
    <li class="active">Edit</li>
</ol>
@endsection

@section('content')
    @include('product::variation.layouts.form')
@endsection