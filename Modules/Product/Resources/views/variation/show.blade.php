@extends('product::variation.layouts.master')

@section('title-page', 'Variation')

@section('small-info')
<small>Variation Detail</small>
@endsection

@section('breakcumb')
<ol class="breadcrumb">
    <li><a href="{{ route('admin') }}"><i class="fa fa-dashboard"></i> Admin</a></li>
    <li><a href="{{ route('admin.product.index') }}">Product</a></li>
    <li><a href="{{ route('admin.product.variation.index', $product_id) }}">Variation</a></li>
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
                            <p>{{ $variation->code }}</p>
                        </div>
                    </div>
                </div>
                <div class="field-group">
                    <div class="row">
                        <div class="col-lg-2">
                            <p><strong>Product Name</strong></p>
                        </div>
                        <div class="col-lg-10">
                            <p>{{ $variation->product->name }}</p>
                        </div>
                    </div>
                </div>
                @foreach($attributes as $attribute)
                    <div class="field-group">
                        <div class="row">
                            <div class="col-lg-2">
                                <p><strong>{{ $attribute->name }}</strong></p>
                            </div>
                            <div class="col-lg-10">
                                @foreach($variation->options as $option)
                                    @if ($option->attribute_id == $attribute->id)
                                        {{ $option->value }}
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    </div>
                @endforeach
                <div class="field-group">
                    <div class="row">
                        <div class="col-lg-2">
                            <p><strong>Description</strong></p>
                        </div>
                        <div class="col-lg-10">
                            <p>{{ $variation->description }}</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="box-footer">
                <a href="{{ route('admin.product.variation.index', $product_id) }}" class="btn btn-default">Back</a>
                <a href="{{ route('admin.product.variation.edit', ['product_id' => $product_id, 'id' => $variation->id]) }}" class="btn btn-primary">Edit</a>
            </div>
        </div>
    </div>
</div>
@endsection