@extends('brand::layouts.master')

@section('title-page', 'Brands')

@section('small-info')
<small>List of brands ({{ $brands->total() }})</small>
@endsection

@section('breakcumb')
<ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Admin</a></li>
    <li><a href="#">Brand</a></li>
    <li class="active">Index</li>
</ol>
@endsection

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="box box-primary">
            <div class="box-header with-border">
                <div class="box-title">List</div>
                <a href="{{ route('brand.create') }}" class="btn btn-primary pull-right">New Brand</a>
            </div>
            <div class="box-body">
                <div class="table-header">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="filter" style="text-align: left">
                                <label for="search">
                                    Search:
                                    <input id="search" type="search" class="form-control input-sm" name="search" value="{{ request()->search }}" data-url="{{ route('brand.index') }}">
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
                                <th>Country</th>
                                <th>Author</th>
                                <th>Create At</th>
                                <th>Updated At</th>
                                <th style="width: 100px">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($brands as $brand)                                
                                <tr>
                                    <td>{{ $brand->id }}</td>
                                    <td><a href="{{ route('brand.show', $brand->id) }}">{{ $brand->name }}</a></td>
                                    <td>{{ $brand->country }}</td>
                                    <td><a href="#">Minh Cat</a></td>
                                    <td>{{ $brand->created_at->format('H:i:s d/m/Y') }}</td>
                                    <td>{{ $brand->updated_at->format('H:i:s d/m/Y') }}</td>
                                    <td>
                                        <a class="btn btn-icon btn-primary" href="{{ route('brand.edit', $brand->id) }}"><i class="fa fa-edit"></i></a>
                                        <button class="btn btn-icon btn-danger btn-delete" data-toggle="modal" data-target="#modal-brand-delete" data-id="{{ $brand->id }}"><i class="fa fa-trash"></i></button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="table-footer mt-3">
                    <div class="row">
                        <div class="col-lg-12">
                            {{ $brands->appends($_GET)->links('themes.adminlte.paginate') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@include('brand::layouts.modal', [
    'modal'             => [
        'id'            => 'modal-brand-delete',
        'title'         => 'Delete Brand',
        'message'       => 'Are you sure to delete this brand!',
        'form'          => [
            'url'       => route('brand.delete', ':id'),
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
        let url_delete = $('#modal-brand-delete form').attr('action');
        $('.btn-delete').click(function() {
            let id = $(this).data('id');
            let url = url_delete.replace(':id', id)
            $('#modal-brand-delete form').attr('action', url);
            console.log(url)
        })
        $('#modal-brand-delete').on('hide.bs.modal', function() {
            $('#modal-brand-delete form').attr('action', url_delete);
        })
    })
</script>
@endpush
