@extends('product::detail.layouts.master')

@section('title-page', 'Products')

@section('small-info')
<small>Product Specification Detail</small>
@endsection

@section('breakcumb')
<ol class="breadcrumb">
    <li><a href="{{ route('admin') }}"><i class="fa fa-dashboard"></i> Admin</a></li>
    <li><a href="{{ route('admin.product.index') }}">Product</a></li>
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
                @foreach($specifications as $specification)
                    <div class="field-group">
                        <div class="row">
                            <div class="col-lg-2">
                                <p><strong>{{ $specification->name }}</strong></p>
                            </div>
                            <div class="col-lg-10">
                                @foreach($details as $detail)
                                    @if ($detail->specification_id == $specification->id)
                                        <p>{{ optional($detail)->information->value }}</p>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="box-footer">
                <a href="{{ route('admin.product.index') }}" class="btn btn-default">Back</a>
                <a href="{{ route('admin.product.detail.edit', $product_id) }}" class="btn btn-primary">Edit</a>
            </div>
        </div>
    </div>
</div>
@endsection