@extends('gift::item.layouts.master')

@section('title-page', 'Gift Product Items')

@section('small-info')
<small>Add Gift Product Item</small>
@endsection

@section('breakcumb')
<ol class="breadcrumb">
    <li><a href="{{ route('admin') }}"><i class="fa fa-dashboard"></i> Admin</a></li>
    <li><a href="{{ route('admin.gift.index') }}">Gift</a></li>
    <li><a href="{{ route('admin.gift.product.index', $gift_id) }}">Product</a></li>
    <li><a href="{{ route('admin.gift.product.item.index', ['gift_id' => $gift_id, 'gift_product_id' => $gift_product_id]) }}">Product</a></li>
    <li class="active">Create</li>
</ol>
@endsection

@section('content')
    @include('gift::item.layouts.form')
@endsection