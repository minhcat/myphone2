@extends('brand::layouts.master')

@section('title-page', 'Brands')

@section('small-info')
<small>List of brands ({{ $brands->total() }})</small>
@endsection

@section('breakcumb')
<ol class="breadcrumb">
    <li><a href="{{ route('admin') }}"><i class="fa fa-dashboard"></i> Admin</a></li>
    <li><a href="{{ route('admin.brand.index') }}">Brand</a></li>
    <li class="active">Index</li>
</ol>
@endsection

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="box box-primary">
            <div class="box-header with-border">
                <div class="box-title">List</div>
                @can('brand:add')
                <a href="{{ route('admin.brand.create') }}" class="btn btn-primary pull-right"><i class="fa fa-plus"></i> Add New</a>
                @endcan
            </div>
            <div class="box-body">
                <div class="table-header">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="filter" style="text-align: left">
                                <label for="search">
                                    Search:
                                    <input id="search" type="search" class="form-control input-sm" name="search" value="{{ request()->search }}" data-url="{{ route('admin.brand.index') }}">
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
                                @canany(['brand:edit', 'brand:delete'])
                                <th style="width: 1px">Action</th>
                                @endcanany
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($brands as $key => $brand)                                
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    @can('brand:read')
                                    <td><a href="{{ route('admin.brand.show', $brand->id) }}">{{ $brand->name }}</a></td>
                                    @else
                                    <td>{{ $brand->name }}</td>
                                    @endcan
                                    <td>{{ $brand->country }}</td>
                                    @if ($brand->user)
                                    @can('user:read')
                                    <td><a href="{{ route('admin.user.show', $brand->user->id) }}">{{ $brand->user->fullname }}</a></td>
                                    @else
                                    <td>{{ $brand->user->fullname }}</td>
                                    @endcan
                                    @else
                                    <td></td>
                                    @endif
                                    <td>{{ $brand->created_at->format('H:i:s d/m/Y') }}</td>
                                    <td>{{ $brand->updated_at->format('H:i:s d/m/Y') }}</td>
                                    @canany(['brand:edit', 'brand:delete'])
                                    <td class="nowrap">
                                        @can('brand:edit')
                                        <a class="btn btn-primary" href="{{ route('admin.brand.edit', $brand->id) }}"><i class="fa fa-edit"></i> Edit</a>
                                        @endcan
                                        @can('brand:delete')
                                        <button class="btn btn-danger btn-delete" data-toggle="modal" data-target="#modal-brand-delete" data-id="{{ $brand->id }}"><i class="fa fa-trash"></i> Delete</button>
                                        @endcan
                                    </td>
                                    @endcanany
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
            'url'       => route('admin.brand.delete', ':id'),
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
