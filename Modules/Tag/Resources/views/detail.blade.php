@extends('tag::layouts.master')

@section('title-page', 'Tags')

@section('small-info')
<small>Tag Detail</small>
@endsection

@section('breakcumb')
<ol class="breadcrumb">
    <li><a href="{{ route('admin') }}"><i class="fa fa-dashboard"></i> Admin</a></li>
    <li><a href="{{ route('tag.index') }}">Tag</a></li>
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
                            <p>{{ $tag->name }}</p>
                        </div>
                    </div>
                </div>
                <div class="field-group">
                    <div class="row">
                        <div class="col-lg-2">
                            <p><strong>Author</strong></p>
                        </div>
                        <div class="col-lg-10">
                            <p>{{ $tag->user->fullname }}</p>
                        </div>
                    </div>
                </div>
                <div class="field-group">
                    <div class="row">
                        <div class="col-lg-2">
                            <p><strong>Description</strong></p>
                        </div>
                        <div class="col-lg-10">
                            <p>{{ $tag->description }}</p>
                        </div>
                    </div>
                </div>
                <div class="field-group">
                    <div class="row">
                        <div class="col-lg-2">
                            <p><strong>Created At</strong></p>
                        </div>
                        <div class="col-lg-10">
                            <p>{{ $tag->created_at->format('H:i:s d/m/Y') }}</p>
                        </div>
                    </div>
                </div>
                <div class="field-group">
                    <div class="row">
                        <div class="col-lg-2">
                            <p><strong>Updated At</strong></p>
                        </div>
                        <div class="col-lg-10">
                            <p>{{ $tag->updated_at->format('H:i:s d/m/Y') }}</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="box-footer">
                <a href="{{ route('tag.index') }}" class="btn btn-default">Back</a>
                <a href="{{ route('tag.edit', $tag->id) }}" class="btn btn-primary">Edit</a>
            </div>
        </div>
    </div>
</div>
@endsection