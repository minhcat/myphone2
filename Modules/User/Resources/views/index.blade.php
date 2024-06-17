@extends('user::layouts.master')

@section('title-page', 'Users')

@section('small-info')
<small>List of users ({{ $users->total() }})</small>
@endsection

@section('breakcumb')
<ol class="breadcrumb">
    <li><a href="{{ route('admin') }}"><i class="fa fa-dashboard"></i> Admin</a></li>
    <li><a href="{{ route('user.index') }}">User</a></li>
    <li class="active">Index</li>
</ol>
@endsection

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="box box-primary">
            <div class="box-header with-border">
                <div class="box-title">List</div>
                <a href="{{ route('user.create') }}" class="btn btn-primary pull-right"><i class="fa fa-plus"></i> Add New</a>
            </div>
            <div class="box-body">
                <div class="table-header">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="filter">
                                <label for="search">
                                    Search:
                                    <input type="search" class="form-control input-sm" name="search" value="{{ request()->search }}" data-url="{{ route('user.index') }}">
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
                                <th>Account</th>
                                <th>Fullname</th>
                                <th>Gender</th>
                                <th>Job</th>
                                <th>Email</th>
                                <th>Created At</th>
                                <th>Updated At</th>
                                <th style="width: 175px">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($users as $user)
                                <tr>
                                    <td>{{ $user->id }}</td>
                                    <td><a href="{{ route('user.show', $user->id) }}">{{ $user->account }}</a></td>
                                    <td>{{ $user->fullname }}</td>
                                    <td>{!! generate_label($user->gender, new Gender) !!}</td>
                                    <td>{{ $user->job }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->created_at->format('d-m-Y') }}</td>
                                    <td>{{ $user->updated_at->format('d-m-Y') }}</td>
                                    <td>
                                        <a class="btn btn-primary" href="{{ route('user.edit', $user->id) }}"><i class="fa fa-edit"></i> Edit</a>
                                        <button class="btn btn-danger btn-delete" data-toggle="modal" data-target="#modal-user-delete" data-id="{{ $user->id }}"><i class="fa fa-trash"></i> Delete</button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="table-footer mt-3">
                    <div class="row">
                        <div class="col-lg-12">
                            {{ $users->appends($_GET)->links('themes.adminlte.paginate') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@include('user::layouts.modal', [
    'modal'             => [
        'id'            => 'modal-user-delete',
        'title'         => 'Delete User',
        'message'       => 'Are you sure to delete this user!',
        'form'          => [
            'url'       => route('user.delete', ':id'),
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
            console.log(url)
        })
        $('#modal-user-delete').on('hide.bs.modal', function() {
            $('#modal-user-delete form').attr('action', url_delete);
        })
    })
</script>
@endpush
