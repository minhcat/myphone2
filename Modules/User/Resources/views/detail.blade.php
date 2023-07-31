@extends('user::layouts.master')

@section('title-page', 'Users')

@section('small-info')
<small>User Detail</small>
@endsection

@section('breakcumb')
<ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Admin</a></li>
    <li><a href="#">User</a></li>
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
                            <p><strong>Account</strong></p>
                        </div>
                        <div class="col-lg-10">
                            <p></p>
                        </div>
                    </div>
                </div>
                <div class="field-group">
                    <div class="row">
                        <div class="col-lg-2">
                            <p><strong>Fullname</strong></p>
                        </div>
                        <div class="col-lg-10">
                            <p></p>
                        </div>
                    </div>
                </div>
                <div class="field-group">
                    <div class="row">
                        <div class="col-lg-2">
                            <p><strong>Gender</strong></p>
                        </div>
                        <div class="col-lg-10">
                            <p></p>
                        </div>
                    </div>
                </div>
                <div class="field-group">
                    <div class="row">
                        <div class="col-lg-2">
                            <p><strong>Job</strong></p>
                        </div>
                        <div class="col-lg-10">
                            <p></p>
                        </div>
                    </div>
                </div>
                <div class="field-group">
                    <div class="row">
                        <div class="col-lg-2">
                            <p><strong>Email</strong></p>
                        </div>
                        <div class="col-lg-10">
                            <p></p>
                        </div>
                    </div>
                </div>
                <div class="field-group">
                    <div class="row">
                        <div class="col-lg-2">
                            <p><strong>Admin</strong></p>
                        </div>
                        <div class="col-lg-10">
                            <p></p>
                        </div>
                    </div>
                </div>
                <div class="field-group">
                    <div class="row">
                        <div class="col-lg-2">
                            <p><strong>Created At</strong></p>
                        </div>
                        <div class="col-lg-10">
                            <p>24/07/2023</p>
                        </div>
                    </div>
                </div>
                <div class="field-group">
                    <div class="row">
                        <div class="col-lg-2">
                            <p><strong>Updated At</strong></p>
                        </div>
                        <div class="col-lg-10">
                            <p>24/07/2023</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="box-footer">
                <a href="#" class="btn btn-default">Back</a>
                <a href="#" class="btn btn-primary">Edit</a>
            </div>
        </div>
    </div>
</div>
@endsection