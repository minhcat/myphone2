@extends('product::layouts.master')

@section('title-page', 'Variations')

@section('small-info')
<small>Edit Variation</small>
@endsection

@section('breakcumb')
<ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Admin</a></li>
    <li><a href="#">Product</a></li>
    <li><a href="#">Variation</a></li>
    <li class="active">Edit</li>
</ol>
@endsection

@section('content')
    @include('product::variations.form')
@endsection