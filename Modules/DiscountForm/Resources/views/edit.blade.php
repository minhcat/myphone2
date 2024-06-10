@extends('discountform::layouts.master')

@section('title-page', 'Discount Form')

@section('small-info')
<small>Edit Discount Form</small>
@endsection

@section('breakcumb')
<ol class="breadcrumb">
    <li><a href="{{ route('admin') }}"><i class="fa fa-dashboard"></i> Admin</a></li>
    <li><a href="{{ route('discount_form.index') }}">Discount Form</a></li>
    <li class="active">Edit</li>
</ol>
@endsection

@section('content')
    @include('discountform::layouts.form')
@endsection