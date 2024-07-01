@extends('voucher::code.layouts.master')

@section('title-page', 'Voucher Codes')

@section('small-info')
<small>Voucher Codes Detail</small>
@endsection

@section('breakcumb')
<ol class="breadcrumb">
    <li><a href="{{ route('admin') }}"><i class="fa fa-dashboard"></i> Admin</a></li>
    <li><a href="{{ route('admin.voucher.index') }}">Voucher</a></li>
    <li><a href="{{ route('admin.voucher.code.index', $voucher_id) }}">Code</a></li>
    <li class="active">Detail</li>
</ol>
@endsection

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="box box-primary">
            <div class="box-header with-border">
                <div class="box-title">Detail</div>
            </div>
            <div class="box-body text-4">
                <div class="field-group">
                    <div class="row">
                        <div class="col-lg-2">
                            <p><strong>Code</strong></p>
                        </div>
                        <div class="col-lg-10">
                            <p>{{ $voucher_code->code }}</p>
                        </div>
                    </div>
                </div>
                <div class="field-group">
                    <div class="row">
                        <div class="col-lg-2">
                            <p><strong>Discount Target</strong></p>
                        </div>
                        <div class="col-lg-10">
                            <p>{!! generate_label($voucher_code->discount_target, new DiscountTarget) !!}</p>
                        </div>
                    </div>
                </div>
                <div class="field-group">
                    <div class="row">
                        <div class="col-lg-2">
                            <p><strong>Discount Type</strong></p>
                        </div>
                        <div class="col-lg-10">
                            <p>{!! generate_label($voucher_code->discount_type, new DiscountType) !!}</p>
                        </div>
                    </div>
                </div>
                <div class="field-group">
                    <div class="row">
                        <div class="col-lg-2">
                            <p><strong>Discount Value</strong></p>
                        </div>
                        <div class="col-lg-10">
                            <p>{{ number_format($voucher_code->discount_value) }}</p>
                        </div>
                    </div>
                </div>
                <div class="field-group">
                    <div class="row">
                        <div class="col-lg-2">
                            <p><strong>Discount Minimum</strong></p>
                        </div>
                        <div class="col-lg-10">
                            <p>{{ number_format($voucher_code->discount_minimum) }}</p>
                        </div>
                    </div>
                </div>
                <div class="field-group">
                    <div class="row">
                        <div class="col-lg-2">
                            <p><strong>Discount Maximum</strong></p>
                        </div>
                        <div class="col-lg-10">
                            <p>{{ number_format($voucher_code->discount_maximum) }}</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="box-footer">
                <a href="{{ route('admin.voucher.code.index', $voucher_id) }}" class="btn btn-default">Back</a>
                <a href="{{ route('admin.voucher.code.edit', ['voucher_id' => $voucher_id, 'id' => $voucher_code->id]) }}" class="btn btn-primary">Edit</a>
            </div>
        </div>
    </div>
</div>
@endsection