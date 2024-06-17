@extends('category::layouts.master')

@section('title-page', 'Category')

@section('small-info')
<small>List of categories ({{ $categories->total() }})</small>
@endsection

@section('breakcumb')
<ol class="breadcrumb">
    <li><a href="{{ route('admin') }}"><i class="fa fa-dashboard"></i> Admin</a></li>
    <li><a href="{{ route('category.index') }}">Category</a></li>
    <li class="active">Index</li>
</ol>
@endsection

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="box box-primary">
            <div class="box-header with-border">
                <div class="box-title">List</div>
                <a href="{{ route('category.create') }}" class="btn btn-primary pull-right"><i class="fa fa-plus"></i> Add New</a>
                <a href="{{ route('category.builder') }}" class="btn btn-success pull-right mr-2"><i class="fa fa-cog"></i> Builder</a>
            </div>
            <div class="box-body">
                <div class="table-header">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="filter">
                                <label for="search">
                                    Search:
                                    <input id="search" type="search" class="form-control input-sm" name="search" value="{{ request()->search }}" data-url="{{ route('category.index') }}">
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
                                <th>Parent</th>
                                <th>Author</th>
                                <th>Created At</th>
                                <th>Updated At</th>
                                <th style="width: 175px">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($categories as $category)
                                <tr>
                                    <td>{{ $category->id }}</td>
                                    <td><a href="{{ route('category.show', $category->id) }}">{{ $category->name }}</a></td>
                                    <td><a href="{{ route('category.show', $category->id) }}">{{ optional($category->parent)->name }}</a></td>
                                    <td>@if (!is_null($category->user)) <a href="{{ route('user.show', $category->user->id) }}">{{ $category->user->fullname }}</a>@endif</td>
                                    <td>{{ $category->created_at->format('H:i:s d/m/Y') }}</td>
                                    <td>{{ $category->updated_at->format('H:i:s d/m/Y') }}</td>
                                    <td>
                                        <a class="btn btn-primary" href="{{ route('category.edit', $category->id) }}"><i class="fa fa-edit"></i> Edit</a>
                                        <button class="btn btn-danger btn-delete" data-toggle="modal" data-target="#modal-category-delete" data-id="{{ $category->id }}"><i class="fa fa-trash"></i> Delete</button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="table-footer mt-3">
                    <div class="row">
                        <div class="col-lg-12">
                            {{ $categories->appends($_GET)->links('themes.adminlte.paginate') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@include('category::layouts.modal', [
    'modal'             => [
        'id'            => 'modal-category-delete',
        'title'         => 'Delete Category',
        'message'       => 'Are you sure to delete this category!',
        'form'          => [
            'url'       => route('category.delete', ':id'),
            'method'    => 'DELETE',
            'inputs'    => []
        ],
        'buttons'       => [
            'primary'   => [
                'text'  => 'Delete'
            ]
        ],
    ]
])
@endsection

@push('script')
<script>
    $(function() {
        $('.filter input').keypress(function(e) {
            if (e.which == 13) {
                let value = $(this).val().trim();
                let url = $(this).data('url') + '?search=' + value;
                window.location.href = url;
            }
        })

        let url_delete = $('#modal-category-delete form').attr('action');
        $('.btn-delete').click(function() {
            let id = $(this).data('id');
            let url = url_delete.replace(':id', id)
            $('#modal-category-delete form').attr('action', url);
        })
        $('#modal-category-delete').on('hide.bs.modal', function() {
            $('#modal-category-delete form').attr('action', url_delete);
        })
    })
</script>
@endpush

