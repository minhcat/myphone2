@extends('product::layouts.master')

@section('title-page', 'Products')

@section('small-info')
<small>List of products ({{ $total }})</small>
@endsection

@section('breakcumb')
<ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Admin</a></li>
    <li><a href="#">Product</a></li>
    <li class="active">Index</li>
</ol>
@endsection

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="box box-primary">
            <div class="box-header with-border">
                <div class="box-title">List</div>
                <button class="btn btn-primary pull-right">New Product</button>
            </div>
            <div class="box-body">
                <div class="table-header">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="length">
                                <label for="length">
                                    Show 
                                    <select name="length" id="length" class="form-control input-sm">
                                        @foreach ([5, 10, 25, 50] as $value)
                                            <option value="{{ $value }}" {{ $take == $value ? 'selected' : '' }}>{{ $value }}</option>
                                        @endforeach
                                    </select> 
                                    entries
                                </label>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="filter">
                                <label for="search">
                                    Search:
                                    <input type="text" class="form-control input-sm" name="search">
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="table-body">
                    <table class="table table-bordered table-striped mt-3">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Brand</th>
                                <th>Category</th>
                                <th>Tag</th>
                                <th>Price</th>
                                <th>Created At</th>
                                <th>Updated At</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($products as $product)
                                <tr>
                                    <td>{{ $product->id }}</td>
                                    <td><a href="{{ route('product.show', $product->id) }}">{{ $product->name }}</a></td>
                                    <td>Apple</td>
                                    <td>smartphone</td>
                                    <td>new, modern, usa</td>
                                    <td>{{ $product->price }}</td>
                                    <td>{{ $product->created_at->format('d-m-Y') }}</td>
                                    <td>{{ $product->updated_at->format('d-m-Y') }}</td>
                                    <td>
                                        <button class="btn btn-icon btn-primary"><i class="fa fa-edit"></i></button>
                                        <button class="btn btn-icon btn-danger"><i class="fa fa-trash"></i></button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="table-footer mt-3">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="table-info">Showing {{ $start }} to {{ $end }} of {{ $total }} entries</div>
                        </div>
                        <div class="col-lg-6">
                            {{ $products->links('themes.adminlte.paginate') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
