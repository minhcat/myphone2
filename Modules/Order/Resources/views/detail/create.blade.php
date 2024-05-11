@extends('order::detail.layouts.master')

@section('title-page', 'Details')

@section('small-info')
<small>Add Detail</small>
@endsection

@section('breakcumb')
<ol class="breadcrumb">
    <li><a href="{{ route('admin') }}"><i class="fa fa-dashboard"></i> Admin</a></li>
    <li><a href="{{ route('order.index') }}">Order</a></li>
    <li><a href="{{ route('order.detail.index', $order_id) }}">Detail</a></li>
    <li class="active">Create</li>
</ol>
@endsection

@section('content')
    @include('order::detail.layouts.form')
@endsection