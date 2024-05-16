@extends('cart::cart.layouts.master')

@section('title-page', 'Carts')

@section('small-info')
<small>Cart Detail</small>
@endsection

@section('breakcumb')
<ol class="breadcrumb">
    <li><a href="{{ route('admin') }}"><i class="fa fa-dashboard"></i> Admin</a></li>
    <li><a href="{{ route('cart.index') }}">Cart</a></li>
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
                            <p>{{ $cart->code }}</p>
                        </div>
                    </div>
                </div>
                <div class="field-group">
                    <div class="row">
                        <div class="col-lg-2">
                            <p><strong>Author</strong></p>
                        </div>
                        <div class="col-lg-10">
                            <p>{{ $cart->user->fullname }}</p>
                        </div>
                    </div>
                </div>
                <div class="field-group">
                    <div class="row">
                        <div class="col-lg-2">
                            <p><strong>Quantity</strong></p>
                        </div>
                        <div class="col-lg-10">
                            <p>10</p>
                        </div>
                    </div>
                </div>
                <div class="field-group">
                    <div class="row">
                        <div class="col-lg-2">
                            <p><strong>Total</strong></p>
                        </div>
                        <div class="col-lg-10">
                            <p>10,000,000</p>
                        </div>
                    </div>
                </div>
                <div class="field-group">
                    <div class="row">
                        <div class="col-lg-2">
                            <p><strong>Created At</strong></p>
                        </div>
                        <div class="col-lg-10">
                            <p>{{ $cart->created_at->format('H:i:s d/m/Y') }}</p>
                        </div>
                    </div>
                </div>
                <div class="field-group">
                    <div class="row">
                        <div class="col-lg-2">
                            <p><strong>Updated At</strong></p>
                        </div>
                        <div class="col-lg-10">
                            <p>{{ $cart->updated_at->format('H:i:s d/m/Y') }}</p>
                        </div>
                    </div>
                </div>
                <div class="field-group">
                    <div class="row">
                        <div class="col-lg-2">
                            <p><strong>Note</strong></p>
                        </div>
                        <div class="col-lg-10">
                            <p>{{ $cart->note }}</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="box-footer">
                <a href="{{ route('cart.index') }}" class="btn btn-default">Back</a>
            </div>
        </div>
    </div>
</div>
@endsection