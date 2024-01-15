@extends('product::products.layouts.master')

@section('title-page', 'Products')

@section('small-info')
<small>Product Specification Detail</small>
@endsection

@section('breakcumb')
<ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Admin</a></li>
    <li><a href="#">Product</a></li>
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
                                <label for="">Product Name</label>
                                <input type="text" class="form-control" value="{{ $details[0]->product->name ?? '' }}" disabled>
                            </div>
                        </div>
                    </div>
                    @foreach($specifications as $key => $specification)
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="">{{ $specification->name }}</label>
                                    @foreach($specification->informations as $information)
                                        <div class="radio">
                                            <label>
                                                <input 
                                                type="radio"
                                                name="information[{{ $key }}]"
                                                class="info a{{ $key }}"
                                                value="{{ $information->id }}" 
                                                @foreach($details as $detail)
                                                    @if ($detail->specification_id == $specification->id && $detail->information_id == $information->id)
                                                        checked
                                                    @endif
                                                @endforeach
                                                >
                                                {{ $information->value }}
                                            </label>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="box-footer">
                    <a href="{{ route('product.index') }}" class="btn btn-default">Back</a>
                    <button class="btn btn-primary" type="submit">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
