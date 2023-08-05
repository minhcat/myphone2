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
                            <p>{{ $user->account }}</p>
                        </div>
                    </div>
                </div>
                <div class="field-group">
                    <div class="row">
                        <div class="col-lg-2">
                            <p><strong>Fullname</strong></p>
                        </div>
                        <div class="col-lg-10">
                            <p>{{ $user->fullname }}</p>
                        </div>
                    </div>
                </div>
                <div class="field-group">
                    <div class="row">
                        <div class="col-lg-2">
                            <p><strong>Gender</strong></p>
                        </div>
                        <div class="col-lg-10">
                            <p>{{ App\Enums\Gender::getDescription($user->gender) }}</p>
                        </div>
                    </div>
                </div>
                <div class="field-group">
                    <div class="row">
                        <div class="col-lg-2">
                            <p><strong>Job</strong></p>
                        </div>
                        <div class="col-lg-10">
                            <p>{{ $user->job }}</p>
                        </div>
                    </div>
                </div>
                <div class="field-group">
                    <div class="row">
                        <div class="col-lg-2">
                            <p><strong>Email</strong></p>
                        </div>
                        <div class="col-lg-10">
                            <p>{{ $user->email }}</p>
                        </div>
                    </div>
                </div>
                <div class="field-group">
                    <div class="row">
                        <div class="col-lg-2">
                            <p><strong>Admin</strong></p>
                        </div>
                        <div class="col-lg-10">
                            <p>{{ $user->is_admin ? 'true' : 'false' }}</p>
                        </div>
                    </div>
                </div>
                <div class="field-group">
                    <div class="row">
                        <div class="col-lg-2">
                            <p><strong>Created At</strong></p>
                        </div>
                        <div class="col-lg-10">
                            <p>{{ $user->created_at->format('d-m-Y') }}</p>
                        </div>
                    </div>
                </div>
                <div class="field-group">
                    <div class="row">
                        <div class="col-lg-2">
                            <p><strong>Updated At</strong></p>
                        </div>
                        <div class="col-lg-10">
                            <p>{{ $user->updated_at->format('d-m-Y') }}</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="box-footer">
                <a href="{{ route('user.index') }}" class="btn btn-default">Back</a>
                <a href="{{ route('user.edit', $user->id) }}" class="btn btn-primary">Edit</a>
            </div>
        </div>
    </div>
</div>
@endsection