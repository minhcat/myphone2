@extends('category::layouts.master')

@section('title-page', 'Category')

@section('small-info')
<small>Builder categories</small>
@endsection

@section('breakcumb')
<ol class="breadcrumb">
    <li><a href="{{ route('admin') }}"><i class="fa fa-dashboard"></i> Admin</a></li>
    <li><a href="{{ route('category.index') }}">Category</a></li>
    <li class="active">Builder</li>
</ol>
@endsection

@section('style')
<link rel="stylesheet" href="{{ asset('modules/category/dd.css') }}">
@endsection

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="box box-primary">
            <div class="box-header with-border">
                <div class="box-title">Builder</div>
            </div>
            <div class="box-body">
                <div class="dd">
                    @include('category::layouts.nestable', ['items' => $categories])
                </div>
            </div>
            <div class="box-footer">
                <a href="{{ route('category.index') }}" class="btn btn-default">Back</a>
                <button id="builder_submit" class="btn btn-primary">Save</button>
            </div>
        </div>
    </div>
</div>
@endsection

@push('script')
<script src="{{ asset('modules/category/jquery.nestable.js') }}"></script>
<script>
    $(function() {
        $('.dd').nestable({
            expandBtnHTML: '',
            collapseBtnHTML: ''
        });
        $('#builder_submit').click(function() {
            $.post('{{ route('category.build') }}', {
                categories: JSON.stringify($('.dd').nestable('serialize')),
                _token: '{{ csrf_token() }}'
            }, function (data) {
                console.log(data)
                $('.content .mp-alert').append(`
                <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h4>${data.type}</h4>
                    <p>${data.message}</p>
                </div>
                `)
            })
        });
    });
</script>
@endpush