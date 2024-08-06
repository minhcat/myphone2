@extends('user::address.layouts.master')

@section('title-page', 'User Addresses')

@section('small-info')
<small>List of addresses ({{ $addresses->total() }})</small>
@endsection

@section('breakcumb')
<ol class="breadcrumb">
    <li><a href="{{ route('admin') }}"><i class="fa fa-dashboard"></i> Admin</a></li>
    <li><a href="{{ route('admin.user.index') }}">User</a></li>
    <li><a href="{{ route('admin.user.address.index', $user_id) }}">Address</a></li>
    <li class="active">Index</li>
</ol>
@endsection

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="box box-primary">
            <div class="box-header with-border">
                <div class="box-title">List</div>
                <a href="{{ route('admin.user.address.create', $user_id) }}" class="btn btn-primary pull-right"><i class="fa fa-plus"></i> Add New</a>
            </div>
            <div class="box-body">
                <div class="table-header">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="filter">
                                <label for="search">
                                    Search:
                                    <input type="search" class="form-control input-sm" name="search" value="{{ request()->search }}" data-url="{{ route('admin.user.address.index', $user_id) }}">
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
                                <th>Content</th>
                                <th>Territory</th>
                                <th>Created At</th>
                                <th>Updated At</th>
                                <th style="width: 175px">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($addresses as $key => $address)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td><a href="{{ route('admin.user.address.show', ['user_id' => $user_id, 'id' => $address->id]) }}">{{ $address->content }}</a></td>
                                    <td>{{ $address->ward->name_more }}</td>
                                    <td>{{ $address->created_at->format('H:i:s d/m/Y') }}</td>
                                    <td>{{ $address->updated_at->format('H:i:s d/m/Y') }}</td>
                                    <td>
                                        <a class="btn btn-primary" href="{{ route('admin.user.address.edit', ['user_id' => $user_id, 'id' => $address->id]) }}"><i class="fa fa-edit"></i> Edit</a>
                                        <button class="btn btn-danger btn-delete" data-toggle="modal" data-target="#modal-user-address-delete" data-id="{{ $address->id }}"><i class="fa fa-trash"></i> Delete</button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="table-footer mt-3">
                    <div class="row">
                        <div class="col-lg-12">
                            {{ $addresses->appends($_GET)->links('themes.adminlte.paginate') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@include('user::address.layouts.modal', [
    'modal'             => [
        'id'            => 'modal-user-address-delete',
        'title'         => 'Delete Address',
        'message'       => 'Are you sure to delete this address!',
        'form'          => [
            'url'       => route('admin.user.address.delete', ['user_id' => $user_id, 'id' => ':id']),
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

        let url_delete = $('#modal-user-address-delete form').attr('action');
        $('.btn-delete').click(function() {
            let id = $(this).data('id');
            let url = url_delete.replace(':id', id)
            $('#modal-user-address-delete form').attr('action', url);
            console.log(url)
        })
        $('#modal-user-address-delete').on('hide.bs.modal', function() {
            $('#modal-user-address-delete form').attr('action', url_delete);
        })
    })
</script>
@endpush
