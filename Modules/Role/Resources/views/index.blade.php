@extends('role::layouts.master')

@section('title-page', 'Role')

@section('small-info')
<small>List of roles ({{ $roles->total() }})</small>
@endsection

@section('breakcumb')
<ol class="breadcrumb">
    <li><a href="{{ route('admin') }}"><i class="fa fa-dashboard"></i> Admin</a></li>
    <li><a href="{{ route('admin.role.index') }}">Role</a></li>
    <li class="active">Index</li>
</ol>
@endsection

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="box box-primary">
            <div class="box-header with-border">
                <div class="box-title">List</div>
                <a href="{{ route('admin.role.create') }}" class="btn btn-primary pull-right"><i class="fa fa-plus"></i> Add New</a>
            </div>
            <div class="box-body">
                <div class="table-header">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="filter">
                                <label for="search">
                                    Search:
                                    <input id="search" type="search" class="form-control input-sm" name="search" value="{{ request()->search }}" data-url="{{ route('admin.role.index') }}">
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
                                <th>Created At</th>
                                <th>Updated At</th>
                                <th style="width: 175px">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($roles as $key => $role)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td><a href="{{ route('admin.role.show', $role->id) }}">{{ $role->name }}</a></td>
                                    @if ($role->user)
                                    <td><a href="{{ route('admin.user.show', $role->user->id) }}">{{ $role->user->fullname }}</a></td>
                                    @else
                                    <td></td>
                                    @endif
                                    <td>{{ $role->created_at->format('H:i:s d/m/Y') }}</td>
                                    <td>{{ $role->updated_at->format('H:i:s d/m/Y') }}</td>
                                    <td style="text-align: right">
                                        <a class="btn btn-primary" href="{{ route('admin.role.edit', $role->id) }}"><i class="fa fa-edit"></i> Edit</a>
                                        <button class="btn btn-danger btn-delete" data-toggle="modal" data-target="#modal-role-delete" data-id="{{ $role->id }}"><i class="fa fa-trash"></i> Delete</button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="table-footer mt-3">
                    <div class="row">
                        <div class="col-lg-12">
                            {{ $roles->appends($_GET)->links('themes.adminlte.paginate') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@include('role::layouts.modal', [
    'modal'             => [
        'id'            => 'modal-role-delete',
        'title'         => 'Delete Role',
        'message'       => 'Are you sure to delete this role!',
        'form'          => [
            'url'       => route('admin.role.delete', ':id'),
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

@include('role::layouts.modal', [
    'modal'                 => [
        'id'                => 'modal-role-update',
        'title'             => 'Update Status Role',
        'message'           => 'Are you sure to update status this role!',
        'form'              => [
            'url'           => route('admin.role.update', ':id'),
            'method'        => 'PUT',
            'inputs'        => [
                [
                    'name'  => 'status',
                    'value' => ':status'
                ]
            ]
        ],
        'buttons'           => [
            'primary'       => [
                'text'      => 'Update'
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

        let url_delete = $('#modal-role-delete form').attr('action');
        $('.btn-delete').click(function() {
            let id = $(this).data('id');
            let url = url_delete.replace(':id', id)
            $('#modal-role-delete form').attr('action', url);
        })
        $('#modal-role-delete').on('hide.bs.modal', function() {
            $('#modal-role-delete form').attr('action', url_delete);
        })

        let url_update = $('#modal-role-update form').attr('action');
        $('.btn-update').click(function() {
            let id = $(this).data('id');
            let url = url_update.replace(':id', id)
            let status = $(this).data('status');
            $('#modal-role-update form').attr('action', url);
            $('#modal-role-update form input[name="status"]').val(status);
        })
        $('#modal-role-update').on('hide.bs.modal', function() {
            $('#modalroler-update form').attr('action', url_update);
        })
    })
</script>
@endpush
