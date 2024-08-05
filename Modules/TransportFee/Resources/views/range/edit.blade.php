@extends('transportfee::range.layouts.master')

@section('title-page', 'Transport Fee Area Case Ranges')

@section('small-info')
<small>Edit Transport fee area case range</small>
@endsection

@section('breakcumb')
<ol class="breadcrumb">
    <li><a href="{{ route('admin') }}"><i class="fa fa-dashboard"></i> Admin</a></li>
    <li><a href="{{ route('admin.transport_fee.index') }}">Transport fee</a></li>
    <li><a href="{{ route('admin.transport_fee.area.index', $transport_fee_id) }}">Area</a></li>
    <li><a href="{{ route('admin.transport_fee.area.case.index', ['transport_fee_id' => $transport_fee_id, 'transport_fee_area_id' => $transport_fee_area_id]) }}">Case</a></li>
    <li><a href="{{ route('admin.transport_fee.area.case.range.index', ['transport_fee_id' => $transport_fee_id, 'transport_fee_area_id' => $transport_fee_area_id, 'transport_fee_area_case_id' => $transport_fee_area_case_id]) }}">Range</a></li>
    <li class="active">Edit</li>
</ol>
@endsection

@section('content')
    @include('transportfee::range.layouts.form')
@endsection