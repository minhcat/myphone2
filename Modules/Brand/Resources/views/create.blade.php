@extends('product::layouts.master')

@section('title-page', 'Brands')

@section('small-info')
<small>Add Brand</small>
@endsection

@section('breakcumb')
<ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Admin</a></li>
    <li><a href="#">Brand</a></li>
    <li class="active">Create</li>
</ol>
@endsection

@section('content')
    @include('brand::layouts.form')
@endsection