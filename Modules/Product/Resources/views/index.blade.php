@extends('product::layouts.master')

@section('title-page', 'Products')

@section('small-info')
<small>List of products (500)</small>
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
                                        <option value="5">5</option>
                                        <option value="10">10</option>
                                        <option value="25">25</option>
                                        <option value="50">50</option>
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
                            <tr>
                                <td>1</td>
                                <td><a href="#">Iphone 14 promax</a></td>
                                <td>Apple</td>
                                <td>smartphone</td>
                                <td>new, modern, usa</td>
                                <td>25,000,000</td>
                                <td>18-03-2023</td>
                                <td>18-03-2023</td>
                                <td>
                                    <button class="btn btn-icon btn-primary"><i class="fa fa-edit"></i></button>
                                    <button class="btn btn-icon btn-danger"><i class="fa fa-trash"></i></button>
                                </td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td><a href="#">Samsung Galaxy S10 Pro</a></td>
                                <td>Samsung</td>
                                <td>smartphone</td>
                                <td>new, modern, korea</td>
                                <td>24,000,000</td>
                                <td>18-03-2023</td>
                                <td>18-03-2023</td>
                                <td>
                                    <button class="btn btn-icon btn-primary"><i class="fa fa-edit"></i></button>
                                    <button class="btn btn-icon btn-danger"><i class="fa fa-trash"></i></button>
                                </td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td><a href="#">Redmi Note 11 Pro</a></td>
                                <td>Xiaomi</td>
                                <td>smartphone</td>
                                <td>new, modern, china</td>
                                <td>23,000,000</td>
                                <td>18-03-2023</td>
                                <td>18-03-2023</td>
                                <td>
                                    <button class="btn btn-icon btn-primary"><i class="fa fa-edit"></i></button>
                                    <button class="btn btn-icon btn-danger"><i class="fa fa-trash"></i></button>
                                </td>
                            </tr>
                            <tr>
                                <td>4</td>
                                <td><a href="#">Oppo Reno 8 Pro</a></td>
                                <td>Oppo</td>
                                <td>smartphone</td>
                                <td>new, modern, china</td>
                                <td>22,000,000</td>
                                <td>18-03-2023</td>
                                <td>18-03-2023</td>
                                <td>
                                    <button class="btn btn-icon btn-primary"><i class="fa fa-edit"></i></button>
                                    <button class="btn btn-icon btn-danger"><i class="fa fa-trash"></i></button>
                                </td>
                            </tr>
                            <tr>
                                <td>5</td>
                                <td><a href="#">Vsmart Joy 4</a></td>
                                <td>Vsmart</td>
                                <td>smartphone</td>
                                <td>new, modern, vietnam</td>
                                <td>20,000,000</td>
                                <td>18-03-2023</td>
                                <td>18-03-2023</td>
                                <td>
                                    <button class="btn btn-icon btn-primary"><i class="fa fa-edit"></i></button>
                                    <button class="btn btn-icon btn-danger"><i class="fa fa-trash"></i></button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="table-footer mt-3">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="table-info">Showing 1 to 5 of 500 entries</div>
                        </div>
                        <div class="col-lg-6">
                            <ul class="pagination pagination-sm pull-right">
                                <li><a href="#"><<</a></li>
                                <li><a href="#">1</a></li>
                                <li><a href="#">2</a></li>
                                <li><a href="#">3</a></li>
                                <li><a href="#">...</a></li>
                                <li><a href="#">10</a></li>
                                <li><a href="#">>></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
