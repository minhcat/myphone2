@extends('gift::product.layouts.master')

@section('title-page', 'Gift Products')

@section('small-info')
<small>Edit Gift Product</small>
@endsection

@section('breakcumb')
<ol class="breadcrumb">
    <li><a href="{{ route('admin') }}"><i class="fa fa-dashboard"></i> Admin</a></li>
    <li><a href="{{ route('admin.gift.index') }}">Gift</a></li>
    <li><a href="{{ route('admin.gift.product.index', $gift_id) }}">Product</a></li>
    <li class="active">Edit</li>
</ol>
@endsection

@section('content')
    @include('gift::product.layouts.form')
@endsection