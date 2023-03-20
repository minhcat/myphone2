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
                <div class="box-title">Detail</div>
            </div>
            <div class="box-body text-4">
                <div class="field-group">
                    <div class="row">
                        <div class="col-lg-2">
                            <p><strong>Name</strong></p>
                        </div>
                        <div class="col-lg-10">
                            <p>Iphone 14 Promax</p>
                        </div>
                    </div>
                </div>
                <div class="field-group">
                    <div class="row">
                        <div class="col-lg-2">
                            <p><strong>SKU</strong></p>
                        </div>
                        <div class="col-lg-10">
                            <p>SP-00015</p>
                        </div>
                    </div>
                </div>
                <div class="field-group">
                    <div class="row">
                        <div class="col-lg-2">
                            <p><strong>Brand</strong></p>
                        </div>
                        <div class="col-lg-10">
                            <p>Apple</p>
                        </div>
                    </div>
                </div>
                <div class="field-group">
                    <div class="row">
                        <div class="col-lg-2">
                            <p><strong>Category</strong></p>
                        </div>
                        <div class="col-lg-10">
                            <p>smartphone</p>
                        </div>
                    </div>
                </div>
                <div class="field-group">
                    <div class="row">
                        <div class="col-lg-2">
                            <p><strong>Tag</strong></p>
                        </div>
                        <div class="col-lg-10">
                            <p>new, modern, usa</p>
                        </div>
                    </div>
                </div>
                <div class="field-group">
                    <div class="row">
                        <div class="col-lg-2">
                            <p><strong>Price</strong></p>
                        </div>
                        <div class="col-lg-10">
                            <p>25,000,000 vnđ</p>
                        </div>
                    </div>
                </div>
                <div class="field-group">
                    <div class="row">
                        <div class="col-lg-2">
                            <p><strong>Description</strong></p>
                        </div>
                        <div class="col-lg-10">
                            <p>Tommy Hilfiger men striped pink sweatshirt. Crafted with cotton. Material composition is 100% organic cotton. This is one of the world’s leading designer lifestyle brands and is internationally recognized for celebrating the essence of classic American cool style, featuring preppy with a twist designs. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum eget auctor elit, sit amet varius dolor. Etiam id eros mi. Curabitur sed pulvinar sem. Mauris at porttitor lorem. Morbi faucibus non eros non consectetur. Nulla suscipit leo et sapien maximus vehicula. Etiam leo justo, lobortis lacinia placerat non, tempor a diam.</p>
                        </div>
                    </div>
                </div>
                <div class="field-group">
                    <div class="row">
                        <div class="col-lg-2">
                            <p><strong>Created At</strong></p>
                        </div>
                        <div class="col-lg-10">
                            <p>12:00:00 20/03/2023</p>
                        </div>
                    </div>
                </div>
                <div class="field-group">
                    <div class="row">
                        <div class="col-lg-2">
                            <p><strong>Updated At</strong></p>
                        </div>
                        <div class="col-lg-10">
                            <p>12:00:00 20/03/2023</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="box-footer">
                <button class="btn btn-default">Back</button>
                <button class="btn btn-primary">Edit</button>
            </div>
        </div>
    </div>
</div>
@endsection