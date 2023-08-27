@extends('attribute::layouts.master')

@section('title-page', 'Attribute')

@section('small-info')
<small>List of attributes ({{ $attributes->total() }})</small>
@endsection

@section('breakcumb')
<ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Admin</a></li>
    <li><a href="#">Attribute</a></li>
    <li class="active">Index</li>
</ol>
@endsection

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="box box-primary">
            <div class="box-header with-border">
                <div class="box-title">List</div>
                <a href="{{ route('attribute.create') }}" class="btn btn-primary pull-right">New Attribute</a>
            </div>
            <div class="box-body">
                <div class="table-header">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="filter">
                                <label for="search">
                                    Search:
                                    <input id="search" type="search" class="form-control input-sm" name="search" value="{{ request()->search }}" data-url="{{ route('attribute.index') }}">
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
                                <th>Description</th>
                                <th>Author</th>
                                <th>Created At</th>
                                <th>Updated At</th>
                                <th>List</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($attributes as $attribute)
                                <tr>
                                    <td>{{ $attribute->id }}</td>
                                    <td><a href="{{ route('attribute.show', $attribute->id) }}">{{ $attribute->name }}</a></td>
                                    <td>{{ Str::limit($attribute->description, 90, '...') }}</td>
                                    <td>@if (!is_null($attribute->user)) <a href="{{ route('user.show', $attribute->user->id) }}">{{ $attribute->user->fullname }}</a>@endif</td>
                                    <td>{{ $attribute->created_at->format('H:i:s d/m/Y') }}</td>
                                    <td>{{ $attribute->updated_at->format('H:i:s d/m/Y') }}</td>
                                    <td><a href="">options</a></td>
                                    <td>
                                        <a class="btn btn-icon btn-primary" href="{{ route('attribute.edit', $attribute->id) }}"><i class="fa fa-edit"></i></a>
                                        <button class="btn btn-icon btn-danger btn-delete" data-toggle="modal" data-target="#modal-product-delete" data-id="{{ $attribute->id }}"><i class="fa fa-trash"></i></button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="table-footer mt-3">
                    <div class="row">
                        <div class="col-lg-12">
                            {{ $attributes->appends($_GET)->links('themes.adminlte.paginate') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@include('attribute::layouts.modal', [
    'modal'             => [
        'id'            => 'modal-attribute-delete',
        'title'         => 'Delete Attribute',
        'message'       => 'Are you sure to delete this attribute!',
        'form'          => [
            'url'       => route('attribute.delete', ':id'),
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
        let url_delete = $('#modal-attribute-delete form').attr('action');
        $('.btn-delete').click(function() {
            let id = $(this).data('id');
            let url = url_delete.replace(':id', id)
            $('#modal-attribute-delete form').attr('action', url);
        })
        $('#modal-attribute-delete').on('hide.bs.modal', function() {
            $('#modal-attribute-delete form').attr('action', url_delete);
        })
    })
</script>
@endpush

