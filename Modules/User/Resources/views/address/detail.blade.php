@extends('user::address.layouts.master')

@section('title-page', 'Addresses')

@section('small-info')
<small>Address Detail</small>
@endsection

@section('breakcumb')
<ol class="breadcrumb">
    <li><a href="{{ route('admin') }}"><i class="fa fa-dashboard"></i> Admin</a></li>
    <li><a href="{{ route('admin.user.index') }}">User</a></li>
    <li><a href="{{ route('admin.user.address.index', $user_id) }}">Address</a></li>
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
                            <p><strong>Content</strong></p>
                        </div>
                        <div class="col-lg-10">
                            <p>{{ $address->content }}</p>
                        </div>
                    </div>
                </div>
                <div class="field-group">
                    <div class="row">
                        <div class="col-lg-2">
                            <p><strong>Ward</strong></p>
                        </div>
                        <div class="col-lg-10">
                            <p>{{ $address->ward?->name }}</p>
                        </div>
                    </div>
                </div>
                <div class="field-group">
                    <div class="row">
                        <div class="col-lg-2">
                            <p><strong>District</strong></p>
                        </div>
                        <div class="col-lg-10">
                            <p>{{ $address->ward?->district?->name }}</p>
                        </div>
                    </div>
                </div>
                <div class="field-group">
                    <div class="row">
                        <div class="col-lg-2">
                            <p><strong>City</strong></p>
                        </div>
                        <div class="col-lg-10">
                            <p>{{ $address->ward?->district?->city?->name }}</p>
                        </div>
                    </div>
                </div>
                <div class="field-group">
                    <div class="row">
                        <div class="col-lg-2">
                            <p><strong>Created At</strong></p>
                        </div>
                        <div class="col-lg-10">
                            <p>{{ $address->created_at->format('H:i:s d/m/Y') }}</p>
                        </div>
                    </div>
                </div>
                <div class="field-group">
                    <div class="row">
                        <div class="col-lg-2">
                            <p><strong>Updated At</strong></p>
                        </div>
                        <div class="col-lg-10">
                            <p>{{ $address->updated_at->format('H:i:s d/m/Y') }}</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="box-footer">
                <a href="{{ route('admin.user.address.index', $user_id) }}" class="btn btn-default">Back</a>
                <a href="{{ route('admin.user.address.edit', ['user_id' => $user_id, 'id' => $address->id]) }}" class="btn btn-primary">Edit</a>
            </div>
        </div>
    </div>
</div>
@endsection