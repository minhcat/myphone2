@extends('product::detail.layouts.master')

@section('title-page', 'Product Detail')

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

@php
    $product = isset($product) ? $product : new Modules\Product\Entities\Product;
@endphp
<div class="row">
    <div class="col-lg-12">
        <div class="box box-primary">
            <div class="box-header with-border">
                <div class="box-title">{{ $form['title'] }}</div>
            </div>
            <form action="{{ $form['url'] }}" method="{{ $form['method'] == 'GET' ? 'GET' : 'POST' }}">
                @csrf
                @method($form['method'])
                <div class="box-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="name">Product Name</label>
                                <input type="text" id="name" class="form-control" value="{{ $product_name }}" disabled autocomplete="name">
                            </div>
                        </div>
                    </div>
                    @foreach($specifications as $key => $specification)
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>{{ $specification->name }}</label>
                                    @foreach($specification->informations as $information)
                                        <div class="radio">
                                            <label>
                                                <input 
                                                type="radio"
                                                name="information[{{ $key }}]"
                                                class="info a{{ $key }}"
                                                value="{{ $information->id }}"
                                                @if ($details->count() > 0)
                                                    @foreach($details as $detail)
                                                        @if ($detail->specification_id == $specification->id && (old('information')[$key] == $information->id || $detail->information_id == $information->id))
                                                            checked
                                                        @endif
                                                    @endforeach
                                                @else
                                                    @if (old('information')[$key] == $information->id)
                                                        checked
                                                    @endif
                                                @endif
                                                >
                                                {{ $information->value }}
                                            </label>
                                        </div>
                                    @endforeach
                                    <input type="hidden" name="specification[{{ $key }}]" value="{{ $specification->id }}">
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="box-footer">
                    <a href="{{ route('admin.product.index') }}" class="btn btn-default">Back</a>
                    <button class="btn btn-primary" type="submit">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
