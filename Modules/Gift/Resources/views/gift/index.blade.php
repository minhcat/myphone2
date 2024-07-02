@extends('gift::gift.layouts.master')

@section('title-page', 'Gift')

@section('small-info')
<small>List of gifts ({{ $gifts->total() }})</small>
@endsection

@section('breakcumb')
<ol class="breadcrumb">
    <li><a href="{{ route('admin') }}"><i class="fa fa-dashboard"></i> Admin</a></li>
    <li><a href="{{ route('admin.gift.index') }}">Gift</a></li>
    <li class="active">Index</li>
</ol>
@endsection

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="box box-primary">
            <div class="box-header with-border">
                <div class="box-title">List</div>
                <a href="{{ route('admin.gift.create') }}" class="btn btn-primary pull-right"><i class="fa fa-plus"></i> Add New</a>
            </div>
            <div class="box-body">
                <div class="table-header">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="filter">
                                <label for="search">
                                    Search:
                                    <input id="search" type="search" class="form-control input-sm" name="search" value="{{ request()->search }}" data-url="{{ route('admin.gift.index') }}">
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
                                <th>List</th>
                                <th>Start Date</th>
                                <th>End Date</th>
                                <th>Status</th>
                                <th style="width: 274px">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($gifts as $key => $gift)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td><a href="{{ route('admin.gift.show', $gift->id) }}">{{ $gift->name }}</a></td>
                                    @if ($gift->user)
                                    <td><a href="{{ route('admin.user.show', $gift->user->id) }}">{{ $gift->user->fullname }}</a></td>
                                    @else
                                    <td></td>
                                    @endif
                                    <td><a href="">list</a></td>
                                    <td>{{ $gift->start_datetime?->format('H:i:s d/m/Y') }}</td>
                                    <td>{{ $gift->end_datetime?->format('H:i:s d/m/Y') }}</td>
                                    <td>{!! generate_label($gift->status, new PromotionStatus) !!}</td>
                                    <td style="text-align: right">
                                        {!! generate_button_update_status($gift->status, new PromotionStatus, ['toggle' => 'modal', 'target' => '#modal-gift-update', 'id' => $gift->id, 'status' => PromotionStatus::getNextStatus($gift->status)]) !!}
                                        <a class="btn btn-primary" href="{{ route('admin.gift.edit', $gift->id) }}"><i class="fa fa-edit"></i> Edit</a>
                                        <button class="btn btn-danger btn-delete" data-toggle="modal" data-target="#modal-gift-delete" data-id="{{ $gift->id }}"><i class="fa fa-trash"></i> Delete</button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="table-footer mt-3">
                    <div class="row">
                        <div class="col-lg-12">
                            {{ $gifts->appends($_GET)->links('themes.adminlte.paginate') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@include('gift::gift.layouts.modal', [
    'modal'             => [
        'id'            => 'modal-gift-delete',
        'title'         => 'Delete Gift',
        'message'       => 'Are you sure to delete this gift!',
        'form'          => [
            'url'       => route('admin.gift.delete', ':id'),
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

@include('gift::gift.layouts.modal', [
    'modal'                 => [
        'id'                => 'modal-gift-update',
        'title'             => 'Update Status Gift',
        'message'           => 'Are you sure to update status this gift!',
        'form'              => [
            'url'           => route('admin.gift.update', ':id'),
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

        let url_delete = $('#modal-gift-delete form').attr('action');
        $('.btn-delete').click(function() {
            let id = $(this).data('id');
            let url = url_delete.replace(':id', id)
            $('#modal-gift-delete form').attr('action', url);
        })
        $('#modal-gift-delete').on('hide.bs.modal', function() {
            $('#modal-gift-delete form').attr('action', url_delete);
        })

        let url_update = $('#modal-gift-update form').attr('action');
        $('.btn-update').click(function() {
            let id = $(this).data('id');
            let url = url_update.replace(':id', id)
            let status = $(this).data('status');
            $('#modal-gift-update form').attr('action', url);
            $('#modal-gift-update form input[name="status"]').val(status);
        })
        $('#modal-gift-update').on('hide.bs.modal', function() {
            $('#modalgiftr-update form').attr('action', url_update);
        })
    })
</script>
@endpush
