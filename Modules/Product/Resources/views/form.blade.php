@extends('product::layouts.master')

@section('title-page', 'Products')

@section('small-info')
<small>Product Detail</small>
@endsection

@section('breakcumb')
<ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Admin</a></li>
    <li><a href="#">Product</a></li>
    <li class="active">Detail</li>
</ol>
@endsection

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="box box-primary">
            <div class="box-header with-border">
                <div class="box-title">Create</div>
            </div>
            <div class="box-body">
                <form action="">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="">SKU</label>
                                <input type="text" class="form-control" value="SP-00010" disabled>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="">Name</label>
                                <input type="text" class="form-control" placeholder="input name">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="">Brand</label>
                                <select class="form-control" aria-placeholder="not select">
                                    <option disabled selected>-- choose brand --</option>
                                    <option>Apple</option>
                                    <option>Samsung</option>
                                    <option>Xiao</option>
                                    <option>OPPO</option>
                                    <option>Vsmart</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="">Price</label>
                                <input type="text" class="form-control" placeholder="input price">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="">Category</label>
                                <select class="form-control">
                                    <option disabled selected>-- choose category --</option>
                                    <option>smartphone</option>
                                    <option>laptop</option>
                                    <option>tablet</option>
                                    <option>PC</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="">Description</label>
                                <textarea class="form-control" rows="4"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="">Tag</label>
                                <input type="text" class="form-control">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="box-footer">
                <button class="btn btn-default">Back</button>
                <button class="btn btn-primary">Save</button>
            </div>
        </div>
    </div>
</div>
@endsection