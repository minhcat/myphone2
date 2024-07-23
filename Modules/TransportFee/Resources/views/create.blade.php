@extends('transportfee::layouts.master')

@section('title-page', 'Transport Fees')

@section('small-info')
<small>Add Transport fee</small>
@endsection

@section('breakcumb')
<ol class="breadcrumb">
    <li><a href="{{ route('admin') }}"><i class="fa fa-dashboard"></i> Admin</a></li>
    <li><a href="{{ route('admin.transport_fee.index') }}">Transport fee</a></li>
    <li class="active">Create</li>
</ol>
@endsection

@section('content')
    @include('transportfee::layouts.form')
@endsection