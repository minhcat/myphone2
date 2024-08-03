@extends('transportfee::area.layouts.master')

@section('title-page', 'Transport Fee Areas')

@section('small-info')
<small>Edit Transport fee area</small>
@endsection

@section('breakcumb')
<ol class="breadcrumb">
    <li><a href="{{ route('admin') }}"><i class="fa fa-dashboard"></i> Admin</a></li>
    <li><a href="{{ route('admin.transport_fee.index') }}">Transport fee</a></li>
    <li><a href="{{ route('admin.transport_fee.area.index', $transport_fee_id) }}">Area</a></li>
    <li class="active">Edit</li>
</ol>
@endsection

@section('content')
    @include('transportfee::area.layouts.form')
@endsection