@extends('sale::product.layouts.master')

@section('title-page', 'Sale Products')

@section('small-info')
<small>Add Sale Product</small>
@endsection

@section('breakcumb')
<ol class="breadcrumb">
    <li><a href="{{ route('admin') }}"><i class="fa fa-dashboard"></i> Admin</a></li>
    <li><a href="{{ route('admin.sale.index') }}">Sale</a></li>
    <li><a href="{{ route('admin.sale.product.index', $sale_id) }}">Product</a></li>
    <li class="active">Create</li>
</ol>
@endsection

@section('content')
    @include('sale::product.layouts.form')
@endsection