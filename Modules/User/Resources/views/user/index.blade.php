@extends('user::user.layouts.master')

@section('title-page', 'User')

@section('small-info')
<small>List of users ({{ $users->total() }})</small>
@endsection

@section('breakcumb')
<ol class="breadcrumb">
    <li><a href="{{ route('admin') }}"><i class="fa fa-dashboard"></i> Admin</a></li>
    <li><a href="{{ route('admin.user.index') }}">User</a></li>
    <li class="active">Index</li>
</ol>
@endsection

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="box box-primary box-main">
            <div class="box-header with-border">
                <div class="box-title">List</div>
                @can('user:add')
                <a href="{{ route('admin.user.create') }}" class="btn btn-primary pull-right"><i class="fa fa-plus"></i> Add New</a>
                @endcan
            </div>
            <div class="box-body">
                <div class="table-header">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="filter">
                                <label for="search">
                                    Search:
                                    <input id="search" type="search" class="form-control input-sm" name="search" value="{{ request()->search }}" data-url="{{ route('admin.user.index') }}">
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="table-body">
                    <table class="table table-bordered table-striped table-fix mt-3">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Account</th>
                                <th>Fullname</th>
                                <th>Gender</th>
                                @can('address:browse')
                                <th>Addresses</th>
                                @endcan
                                @if (!is_kaiadmin($admin_active_theme))
                                <th>Email</th>
                                <th>Created At</th>
                                <th>Updated At</th>
                                @endif
                                @canany(['user:edit', 'user:delete'])
                                <th style="width: 1px">Action</th>
                                @endcanany
                            </tr>
                        </thead>
                        <tbody class="tbody-loading">
                            <tr>
                                <td colspan="10"><i class="fa fa-spin fa-spinner fa-lg"></i></td>
                            </tr>
                        </tbody>
                        <tbody class="tbody-data hidden">
                            @foreach($users as $key => $user)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    @can('user:read')
                                    <td><a href="{{ route('admin.user.show', $user->id) }}">{{ $user->account }}</a></td>
                                    @else
                                    <td>{{ $user->account }}</td>
                                    @endcan
                                    <td>{{ $user->fullname }}</td>
                                    <td>{!! generate_label($user->gender, new Gender) !!}</td>
                                    @can('address:browse')
                                    <td><a href="{{ route('admin.user.address.index', $user->id) }}">list</a></td>
                                    @endcan
                                    @if (!is_kaiadmin($admin_active_theme))
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->created_at->format('H:i:s d/m/Y') }}</td>
                                    <td>{{ $user->updated_at->format('H:i:s d/m/Y') }}</td>
                                    @endif
                                    @canany(['user:edit', 'user:delete'])
                                    <td class="nowrap">
                                        @can('user:edit')
                                        <a class="btn btn-primary" href="{{ route('admin.user.edit', $user->id) }}"><i class="fa fa-edit"></i> Edit</a>
                                        @endcan
                                        @can('user:delete')
                                        <button class="btn btn-danger btn-delete" data-toggle="modal" data-target="#modal-user-delete" data-id="{{ $user->id }}"><i class="fa fa-trash"></i> Delete</button>
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
                            {{ $users->appends($_GET)->links(get_admin_theme_extend($admin_active_theme, 'paginate')) }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@include('user::user.layouts.modal', [
    'modal'             => [
        'id'            => 'modal-user-delete',
        'title'         => 'Delete User',
        'message'       => 'Are you sure to delete this user!',
        'form'          => [
            'url'       => route('admin.user.delete', ':id'),
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

        let url_delete = $('#modal-user-delete form').attr('action');
        $('.btn-delete').click(function() {
            let id = $(this).data('id');
            let url = url_delete.replace(':id', id)
            $('#modal-user-delete form').attr('action', url);
        })
        $('#modal-user-delete').on('hide.bs.modal', function() {
            $('#modal-user-delete form').attr('action', url_delete);
        })

        $('.box-main table .tbody-loading').addClass('hidden')
        $('.box-main table .tbody-data').removeClass('hidden')
    })
</script>
@endpush
