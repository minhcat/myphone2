@extends('promotion::layouts.master')

@section('title-page', 'Promotions')

@section('small-info')
<small>Edit Promotion</small>
@endsection

@section('breakcumb')
<ol class="breadcrumb">
    <li><a href="{{ route('admin') }}"><i class="fa fa-dashboard"></i> Admin</a></li>
    <li><a href="{{ route('admin.promotion.index') }}">Promotion</a></li>
    <li class="active">Edit</li>
</ol>
@endsection

@section('content')
    @include('promotion::layouts.form')
@endsection