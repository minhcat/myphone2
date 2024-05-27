@extends('promotion::promotion.layouts.master')

@section('title-page', 'Promotions')

@section('small-info')
<small>Add Promotion</small>
@endsection

@section('breakcumb')
<ol class="breadcrumb">
    <li><a href="{{ route('admin') }}"><i class="fa fa-dashboard"></i> Admin</a></li>
    <li><a href="{{ route('promotion.index') }}">Promotion</a></li>
    <li class="active">Create</li>
</ol>
@endsection

@section('content')
    @include('promotion::promotion.layouts.form')
@endsection