@extends('brand::layouts.master')

@section('title-page', 'Brands')

@section('small-info')
<small>List of brands (30)</small>
@endsection

@section('breakcumb')
<ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Admin</a></li>
    <li><a href="#">Brand</a></li>
    <li class="active">Index</li>
</ol>
@endsection

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="box box-primary">
            <div class="box-header with-border">
                <div class="box-title">List</div>
                <a href="{{ route('brand.create') }}" class="btn btn-primary pull-right">New Brand</a>
            </div>
            <div class="box-body">
                <div class="table-header">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="filter" style="text-align: left">
                                <label for="search">
                                    Search:
                                    <input id="search" type="search" class="form-control input-sm" name="search" value="{{ request()->search }}" data-url="{{ route('product.index') }}">
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
                                <th>Author</th>
                                <th>Create At</th>
                                <th>Updated At</th>
                                <th style="width: 100px">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td><a href="{{ route('brand.edit', 1) }}">Samsung</a></td>
                                <td><a href="#">Minh Cat</a></td>
                                <td>12/07/2023</td>
                                <td>12/07/2023</td>
                                <td>
                                    <a class="btn btn-icon btn-primary" href="#"><i class="fa fa-edit"></i></a>
                                    <button class="btn btn-icon btn-danger btn-delete" data-toggle="modal" data-target="#modal-product-delete" data-id="1"><i class="fa fa-trash"></i></button>
                                </td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td><a href="{{ route('brand.edit', 1) }}">Apple</a></td>
                                <td><a href="#">Minh Cat</a></td>
                                <td>12/07/2023</td>
                                <td>12/07/2023</td>
                                <td>
                                    <a class="btn btn-icon btn-primary" href="#"><i class="fa fa-edit"></i></a>
                                    <button class="btn btn-icon btn-danger btn-delete" data-toggle="modal" data-target="#modal-product-delete" data-id="1"><i class="fa fa-trash"></i></button>
                                </td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td><a href="{{ route('brand.edit', 1) }}">Xiaomi</a></td>
                                <td><a href="#">Minh Cat</a></td>
                                <td>12/07/2023</td>
                                <td>12/07/2023</td>
                                <td>
                                    <a class="btn btn-icon btn-primary" href="#"><i class="fa fa-edit"></i></a>
                                    <button class="btn btn-icon btn-danger btn-delete" data-toggle="modal" data-target="#modal-product-delete" data-id="1"><i class="fa fa-trash"></i></button>
                                </td>
                            </tr>
                            <tr>
                                <td>4</td>
                                <td><a href="{{ route('brand.edit', 1) }}">OPPO</a></td>
                                <td><a href="#">Minh Cat</a></td>
                                <td>12/07/2023</td>
                                <td>12/07/2023</td>
                                <td>
                                    <a class="btn btn-icon btn-primary" href="#"><i class="fa fa-edit"></i></a>
                                    <button class="btn btn-icon btn-danger btn-delete" data-toggle="modal" data-target="#modal-product-delete" data-id="1"><i class="fa fa-trash"></i></button>
                                </td>
                            </tr>
                            <tr>
                                <td>5</td>
                                <td><a href="#">Vsmart</a></td>
                                <td><a href="#">Minh Cat</a></td>
                                <td>12/07/2023</td>
                                <td>12/07/2023</td>
                                <td>
                                    <a class="btn btn-icon btn-primary" href="#"><i class="fa fa-edit"></i></a>
                                    <button class="btn btn-icon btn-danger btn-delete" data-toggle="modal" data-target="#modal-product-delete" data-id="1"><i class="fa fa-trash"></i></button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="table-footer mt-3">
                    <div class="row">
                        <div class="col-lg-12">
                            <ul class="pagination pagination-sm mb-0 pull-right">
                                <li class="disabled"><span><<</span></li>
                                <li class="disabled"><span><</span></li>
                                <li class="active"><span>1</span></li>
                                <li><span>2</span></li>
                                <li><span>3</span></li>
                                <li class="disabled"><span><i class="fa fa-ellipsis-h"></i></span></li>
                                <li><span>10</span></li>
                                <li><span>></span></li>
                                <li><span>>></span></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
