@extends('product::product.layouts.master')

@section('title-page', 'Products')

@section('small-info')
<small>Product Detail</small>
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
                <div class="field-group">
                    <div class="row">
                        <div class="col-lg-2">
                            <p><strong>Name</strong></p>
                        </div>
                        <div class="col-lg-10">
                            <p>{{ $product->name }}</p>
                        </div>
                    </div>
                </div>
                <div class="field-group">
                    <div class="row">
                        <div class="col-lg-2">
                            <p><strong>SKU</strong></p>
                        </div>
                        <div class="col-lg-10">
                            <p>{{ $product->sku }}</p>
                        </div>
                    </div>
                </div>
                <div class="field-group">
                    <div class="row">
                        <div class="col-lg-2">
                            <p><strong>Brand</strong></p>
                        </div>
                        <div class="col-lg-10">
                            <p>{{ optional($product->brand)->name }}</p>
                        </div>
                    </div>
                </div>
                <div class="field-group">
                    <div class="row">
                        <div class="col-lg-2">
                            <p><strong>Category</strong></p>
                        </div>
                        <div class="col-lg-10">
                            <p>
                                @foreach($product->categories as $category)
                                    @if ($loop->last)
                                        {{ $category->name }}
                                    @else
                                        {{ $category->name }},
                                    @endif
                                @endforeach
                            </p>
                        </div>
                    </div>
                </div>
                <div class="field-group">
                    <div class="row">
                        <div class="col-lg-2">
                            <p><strong>Tag</strong></p>
                        </div>
                        <div class="col-lg-10">
                            <p>
                                @foreach($product->tags as $tag)
                                    @if ($loop->last)
                                        {{ $tag->name }}
                                    @else
                                        {{ $tag->name }},
                                    @endif
                                @endforeach
                            </p>
                        </div>
                    </div>
                </div>
                <div class="field-group">
                    <div class="row">
                        <div class="col-lg-2">
                            <p><strong>Price</strong></p>
                        </div>
                        <div class="col-lg-10">
                            <p>{{ $product->price_format }} vnđ</p>
                        </div>
                    </div>
                </div>
                <div class="field-group">
                    <div class="row">
                        <div class="col-lg-2">
                            <p><strong>Description</strong></p>
                        </div>
                        <div class="col-lg-10">
                            <p>{{ $product->description }}</p>
                        </div>
                    </div>
                </div>
                <div class="field-group">
                    <div class="row">
                        <div class="col-lg-2">
                            <p><strong>Created At</strong></p>
                        </div>
                        <div class="col-lg-10">
                            <p>{{ $product->created_at->format('H:i:s d/m/Y') }}</p>
                        </div>
                    </div>
                </div>
                <div class="field-group">
                    <div class="row">
                        <div class="col-lg-2">
                            <p><strong>Updated At</strong></p>
                        </div>
                        <div class="col-lg-10">
                            <p>{{ $product->updated_at->format('H:i:s d/m/Y') }}</p>
                        </div>
                    </div>
                </div>
                <div class="field-group">
                    <div class="row">
                        <div class="col-lg-2">
                            <p><strong>Note</strong></p>
                        </div>
                        <div class="col-lg-10">
                            <p>{{ $product->note }}</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="box-footer">
                <a href="{{ route('admin.product.index') }}" class="btn btn-default">Back</a>
                <a href="{{ route('admin.product.edit', $product->id) }}" class="btn btn-primary">Edit</a>
            </div>
        </div>
    </div>
</div>
@endsection