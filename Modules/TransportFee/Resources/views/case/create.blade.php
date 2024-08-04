@extends('transportfee::case.layouts.master')

@section('title-page', 'Transport Fees')

@section('small-info')
<small>Add Transport fee area case</small>
@endsection

@section('breakcumb')
<ol class="breadcrumb">
    <li><a href="{{ route('admin') }}"><i class="fa fa-dashboard"></i> Admin</a></li>
    <li><a href="{{ route('admin.transport_fee.index') }}">Transport fee</a></li>
    <li><a href="{{ route('admin.transport_fee.area.index', $transport_fee_id) }}">Transport fee</a></li>
    <li><a href="{{ route('admin.transport_fee.area.case.index', ['transport_fee_id' => $transport_fee_id, 'transport_fee_area_id' => $transport_fee_area_id]) }}">Transport fee</a></li>
    <li class="active">Create</li>
</ol>
@endsection

@section('content')
    @include('transportfee::case.layouts.form')
@endsection