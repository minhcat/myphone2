@extends('voucher::voucher.layouts.master')

@section('title-page', 'Vouchers')

@section('small-info')
<small>Voucher Detail</small>
@endsection

@section('breakcumb')
<ol class="breadcrumb">
    <li><a href="{{ route('admin') }}"><i class="fa fa-dashboard"></i> Admin</a></li>
    <li><a href="{{ route('admin.voucher.index') }}">Voucher</a></li>
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
                            <p><strong>Name</strong></p>
                        </div>
                        <div class="col-lg-10">
                            <p>{{ $voucher->name }}</p>
                        </div>
                    </div>
                </div>
                <div class="field-group">
                    <div class="row">
                        <div class="col-lg-2">
                            <p><strong>Description</strong></p>
                        </div>
                        <div class="col-lg-10">
                            <p>{{ $voucher->description }}</p>
                        </div>
                    </div>
                </div>
                <div class="field-group">
                    <div class="row">
                        <div class="col-lg-2">
                            <p><strong>Discount Target</strong></p>
                        </div>
                        <div class="col-lg-10">
                            <p>{!! generate_label($voucher->discount_target, new DiscountTarget) !!}</p>
                        </div>
                    </div>
                </div>
                <div class="field-group">
                    <div class="row">
                        <div class="col-lg-2">
                            <p><strong>Discount Type</strong></p>
                        </div>
                        <div class="col-lg-10">
                            <p>{!! generate_label($voucher->discount_type, new DiscountType) !!}</p>
                        </div>
                    </div>
                </div>
                <div class="field-group">
                    <div class="row">
                        <div class="col-lg-2">
                            <p><strong>Discount Value</strong></p>
                        </div>
                        <div class="col-lg-10">
                            <p>{{ number_format($voucher->discount_value) }}</p>
                        </div>
                    </div>
                </div>
                <div class="field-group">
                    <div class="row">
                        <div class="col-lg-2">
                            <p><strong>Discount Minimum</strong></p>
                        </div>
                        <div class="col-lg-10">
                            <p>{{ number_format($voucher->discount_minimum) }}</p>
                        </div>
                    </div>
                </div>
                <div class="field-group">
                    <div class="row">
                        <div class="col-lg-2">
                            <p><strong>Discount Maximum</strong></p>
                        </div>
                        <div class="col-lg-10">
                            <p>{{ number_format($voucher->discount_maximum) }}</p>
                        </div>
                    </div>
                </div>
                <div class="field-group">
                    <div class="row">
                        <div class="col-lg-2">
                            <p><strong>Start Datetime</strong></p>
                        </div>
                        <div class="col-lg-10">
                            <p>{{ $voucher->start_datetime?->format('H:i:s d/m/Y') }}</p>
                        </div>
                    </div>
                </div>
                <div class="field-group">
                    <div class="row">
                        <div class="col-lg-2">
                            <p><strong>End Datetime</strong></p>
                        </div>
                        <div class="col-lg-10">
                            <p>{{ $voucher->end_datetime?->format('H:i:s d/m/Y') }}</p>
                        </div>
                    </div>
                </div>
                <div class="field-group">
                    <div class="row">
                        <div class="col-lg-2">
                            <p><strong>Status</strong></p>
                        </div>
                        <div class="col-lg-10">
                            <p>{!! generate_label($voucher->status, new PromotionStatus) !!}</p>
                        </div>
                    </div>
                </div>
                <div class="field-group">
                    <div class="row">
                        <div class="col-lg-2">
                            <p><strong>Author</strong></p>
                        </div>
                        <div class="col-lg-10">
                            <p>{{ $voucher->user->fullname }}</p>
                        </div>
                    </div>
                </div>
                <div class="field-group">
                    <div class="row">
                        <div class="col-lg-2">
                            <p><strong>Created At</strong></p>
                        </div>
                        <div class="col-lg-10">
                            <p>{{ $voucher->created_at?->format('H:i:s d/m/Y') }}</p>
                        </div>
                    </div>
                </div>
                <div class="field-group">
                    <div class="row">
                        <div class="col-lg-2">
                            <p><strong>Updated At</strong></p>
                        </div>
                        <div class="col-lg-10">
                            <p>{{ $voucher->updated_at?->format('H:i:s d/m/Y') }}</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="box-footer">
                <a href="{{ route('admin.voucher.index') }}" class="btn btn-default">Back</a>
                <a href="{{ route('admin.voucher.edit', $voucher->id) }}" class="btn btn-primary">Edit</a>
            </div>
        </div>
    </div>
</div>
@endsection