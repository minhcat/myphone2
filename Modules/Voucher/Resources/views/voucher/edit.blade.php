@extends('voucher::voucher.layouts.master')

@section('title-page', 'Vouchers')

@section('small-info')
<small>Edit Voucher</small>
@endsection

@section('breakcumb')
<ol class="breadcrumb">
    <li><a href="{{ route('admin') }}"><i class="fa fa-dashboard"></i> Admin</a></li>
    <li><a href="{{ route('admin.voucher.index') }}">Voucher</a></li>
    <li class="active">Edit</li>
</ol>
@endsection

@section('content')
    @include('voucher::voucher.layouts.form')
@endsection