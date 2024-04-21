@extends('cart::details.layouts.master')

@section('title-page', 'Details')

@section('small-info')
<small>Add Detail</small>
@endsection

@section('breakcumb')
<ol class="breadcrumb">
    <li><a href="{{ route('admin') }}"><i class="fa fa-dashboard"></i> Admin</a></li>
    <li><a href="{{ route('cart.index') }}">Cart</a></li>
    <li><a href="{{ route('cart.detail.index', $cart_id) }}">Detail</a></li>
    <li class="active">Create</li>
</ol>
@endsection

@section('content')
    @include('cart::details.layouts.form')
@endsection