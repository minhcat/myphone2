@extends('area::area.layouts.master')

@section('title-page', 'Area')

@section('small-info')
<small>List of areas ({{ $areas->total() }})</small>
@endsection

@section('breakcumb')
<ol class="breadcrumb">
    <li><a href="{{ route('admin') }}"><i class="fa fa-dashboard"></i> Admin</a></li>
    <li><a href="{{ route('admin.area.index') }}">Area</a></li>
    <li class="active">Index</li>
</ol>
@endsection

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="box box-primary">
            <div class="box-header with-border">
                <div class="box-title">List</div>
                @can('area:add')
                <a href="{{ route('admin.area.create') }}" class="btn btn-primary pull-right"><i class="fa fa-plus"></i> Add New</a>
                @endcan
            </div>
            <div class="box-body">
                <div class="table-header">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="filter">
                                <label for="search">
                                    Search:
                                    <input id="search" type="search" class="form-control input-sm" name="search" value="{{ request()->search }}" data-url="{{ route('admin.area.index') }}">
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
                                <th>Author</th>
                                @can('area_detail:browse')
                                <th>Details</th>
                                @endcan
                                <th>Created At</th>
                                <th>Updated At</th>
                                @canany(['area:edit', 'area:delete'])
                                <th style="width: 1px">Action</th>
                                @endcanany
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($areas as $key => $area)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    @can('area:read')
                                    <td><a href="{{ route('admin.area.show', $area->id) }}">{{ $area->name }}</a></td>
                                    @else
                                    <td>{{ $area->name }}</td>
                                    @endcan
                                    @if ($area->user)
                                    @can('user:read')
                                    <td><a href="{{ route('admin.user.show', $area->user->id) }}">{{ $area->user->account }}</a></td>
                                    @else
                                    <td>{{ $area->user->account }}</td>
                                    @endcan
                                    @else
                                    <td></td>
                                    @endif
                                    @can('area_detail:browse')
                                    <td><a href="{{ route('admin.area.detail.index', $area->id) }}">list</a></td>
                                    @endcan
                                    <td>{{ $area->created_at->format('H:i:s d/m/Y') }}</td>
                                    <td>{{ $area->updated_at->format('H:i:s d/m/Y') }}</td>
                                    @canany(['area:edit', 'area:delete'])
                                    <td class="nowrap">
                                        @can('area:edit')
                                        <a class="btn btn-primary" href="{{ route('admin.area.edit', $area->id) }}"><i class="fa fa-edit"></i> Edit</a>
                                        @endcan
                                        @can('area:delete')
                                        <button class="btn btn-danger btn-delete" data-toggle="modal" data-target="#modal-area-delete" data-id="{{ $area->id }}"><i class="fa fa-trash"></i> Delete</button>
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
                            {{ $areas->appends($_GET)->links('themes.adminlte.paginate') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@include('area::area.layouts.modal', [
    'modal'             => [
        'id'            => 'modal-area-delete',
        'title'         => 'Delete Area',
        'message'       => 'Are you sure to delete this area!',
        'form'          => [
            'url'       => route('admin.area.delete', ':id'),
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

        let url_delete = $('#modal-area-delete form').attr('action');
        $('.btn-delete').click(function() {
            let id = $(this).data('id');
            let url = url_delete.replace(':id', id)
            $('#modal-area-delete form').attr('action', url);
        })
        $('#modal-area-delete').on('hide.bs.modal', function() {
            $('#modal-area-delete form').attr('action', url_delete);
        })
    })
</script>
@endpush
