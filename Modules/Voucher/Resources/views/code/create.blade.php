@extends('voucher::code.layouts.master')

@section('title-page', 'Voucher Codes')

@section('small-info')
<small>Add Voucher Code</small>
@endsection

@section('breakcumb')
<ol class="breadcrumb">
    <li><a href="{{ route('admin') }}"><i class="fa fa-dashboard"></i> Admin</a></li>
    <li><a href="{{ route('admin.voucher.index') }}">Voucher</a></li>
    <li><a href="{{ route('admin.voucher.code.index', $voucher_id) }}">Code</a></li>
    <li class="active">Create</li>
</ol>
@endsection

@section('content')
    @include('voucher::code.layouts.form')
@endsection