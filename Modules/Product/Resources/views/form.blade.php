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
    <div class="col-lg-9">
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
                                <input type="text" class="form-control" value="SP23-0010" disabled>
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
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="">Name <span class="text-red">(*)</span></label>
                                <input type="text" class="form-control" placeholder="input name">
                                <span class="help-block hidden">Name is require</span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="">Price <span class="text-red">(*)</span></label>
                                <input type="text" class="form-control" placeholder="input price">
                                <span class="help-block hidden">Price is require</span>
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
                                <label for="">Note <span class="fa fa-fw fa-question-circle" data-toggle="tooltip" title="Admin Note"></span></label>
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
    <div class="col-lg-3">
        <div class="box box-primary box-category">
            <div class="box-header">
                <div class="box-title">Categories</div>
            </div>
            <div class="box-body p-5 pt-0">
                <p class="mb-3 hidden">Check product categories</p>
                <div class="box-content">
                    <ul class="form-group">
                        <li class="checkbox"><label for="cate_1"><input type="checkbox"> Category 1</label></li>
                        <li class="checkbox"><label for="cate_2"><input type="checkbox"> Category 2</label></li>
                        <li class="checkbox">
                            <label for="cate_3"><input type="checkbox"> Category 3</label>
                            <ul class="form-group list-child">
                                <li class="checkbox"><label for="cate_31"><input type="checkbox"> Category 31</label></li>
                                <li class="checkbox">
                                    <label for="cate_32"><input type="checkbox"> Category 32</label>
                                    <ul class="form-group list-child">
                                        <li class="checkbox"><label for="cate_31"><input type="checkbox"> Category 321</label></li>
                                        <li class="checkbox"><label for="cate_32"><input type="checkbox"> Category 322</label></li>
                                    </ul>
                                </li>
                                <li class="checkbox"><label for="cate_31"><input type="checkbox"> Category 33</label></li>
                            </ul>
                        </li>
                        <li class="checkbox"><label for="cate_2"><input type="checkbox"> Category 4</label></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="box box-primary">
            <div class="box-header with-border">
                <div class="box-title">Tags</div>
            </div>
            <div class="box-body p-5">
                <div class="group">
                    <div class="badge">tag1</div>
                    <div class="badge">tag2 lorem</div>
                    <div class="badge bg-blue">tag3 lorem</div>
                    <div class="badge">tag4</div>
                    <div class="badge">tag5</div>
                    <div class="badge">tag6</div>
                    <div class="badge">tag7</div>
                    <div class="badge bg-blue">tag8 lorem</div>
                    <div class="badge">tag9</div>
                    <div class="badge bg-blue">tag10 lorem</div>
                    <div class="badge">tag11 lorem</div>
                    <div class="badge">tag12</div>
                    <div class="badge">tag13</div>
                    <div class="badge">tag14</div>
                    <div class="badge">tag15</div>
                    <div class="badge">tag16</div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection