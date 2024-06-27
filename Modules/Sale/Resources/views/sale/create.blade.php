@extends('sale::sale.layouts.master')

@section('title-page', 'Sales')

@section('small-info')
<small>Add Sale</small>
@endsection

@section('breakcumb')
<ol class="breadcrumb">
    <li><a href="{{ route('admin') }}"><i class="fa fa-dashboard"></i> Admin</a></li>
    <li><a href="{{ route('admin.sale.index') }}">Sale</a></li>
    <li class="active">Create</li>
</ol>
@endsection

@section('content')
    @include('sale::sale.layouts.form')
@endsection