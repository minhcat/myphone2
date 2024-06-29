@extends('voucher::voucher.layouts.master')

@section('title-page', 'Voucher')

@section('small-info')
<small>List of vouchers ({{ $vouchers->total() }})</small>
@endsection

@section('breakcumb')
<ol class="breadcrumb">
    <li><a href="{{ route('admin') }}"><i class="fa fa-dashboard"></i> Admin</a></li>
    <li><a href="{{ route('admin.voucher.index') }}">Voucher</a></li>
    <li class="active">Index</li>
</ol>
@endsection

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="box box-primary">
            <div class="box-header with-border">
                <div class="box-title">List</div>
                <a href="{{ route('admin.voucher.create') }}" class="btn btn-primary pull-right"><i class="fa fa-plus"></i> Add New</a>
            </div>
            <div class="box-body">
                <div class="table-header">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="filter">
                                <label for="search">
                                    Search:
                                    <input id="search" type="search" class="form-control input-sm" name="search" value="{{ request()->search }}" data-url="{{ route('admin.voucher.index') }}">
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
                                <th>Discount Target</th>
                                <th>Discount Type</th>
                                <th>Start Date</th>
                                <th>End Date</th>
                                <th>Status</th>
                                <th style="width: 274px">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($vouchers as $key => $voucher)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td><a href="{{ route('admin.voucher.show', $voucher->id) }}">{{ $voucher->name }}</a></td>
                                    @if ($voucher->user)
                                    <td><a href="{{ route('admin.user.show', $voucher->user->id) }}">{{ $voucher->user->fullname }}</a></td>
                                    @else
                                    <td></td>
                                    @endif
                                    <td><a href="#">list</a></td>
                                    <td>{!! generate_label($voucher->discount_target, new DiscountTarget) !!}</td>
                                    <td>{!! generate_label($voucher->discount_type, new DiscountType) !!}</td>
                                    <td>{{ $voucher->start_datetime?->format('H:i:s d/m/Y') }}</td>
                                    <td>{{ $voucher->end_datetime?->format('H:i:s d/m/Y') }}</td>
                                    <td>{!! generate_label($voucher->status, new PromotionStatus) !!}</td>
                                    <td style="text-align: right">
                                        {!! generate_button_update_status($voucher->status, new PromotionStatus, ['toggle' => 'modal', 'target' => '#modal-voucher-update', 'id' => $voucher->id, 'status' => PromotionStatus::getNextStatus($voucher->status)]) !!}
                                        <a class="btn btn-primary" href="{{ route('admin.voucher.edit', $voucher->id) }}"><i class="fa fa-edit"></i> Edit</a>
                                        <button class="btn btn-danger btn-delete" data-toggle="modal" data-target="#modal-voucher-delete" data-id="{{ $voucher->id }}"><i class="fa fa-trash"></i> Delete</button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="table-footer mt-3">
                    <div class="row">
                        <div class="col-lg-12">
                            {{ $vouchers->appends($_GET)->links('themes.adminlte.paginate') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@include('voucher::voucher.layouts.modal', [
    'modal'             => [
        'id'            => 'modal-voucher-delete',
        'title'         => 'Delete Voucher',
        'message'       => 'Are you sure to delete this voucher!',
        'form'          => [
            'url'       => route('admin.voucher.delete', ':id'),
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

@include('voucher::voucher.layouts.modal', [
    'modal'                 => [
        'id'                => 'modal-voucher-update',
        'title'             => 'Update Status Voucher',
        'message'           => 'Are you sure to update status this voucher!',
        'form'              => [
            'url'           => route('admin.voucher.update', ':id'),
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

        let url_delete = $('#modal-voucher-delete form').attr('action');
        $('.btn-delete').click(function() {
            let id = $(this).data('id');
            let url = url_delete.replace(':id', id)
            $('#modal-voucher-delete form').attr('action', url);
        })
        $('#modal-voucher-delete').on('hide.bs.modal', function() {
            $('#modal-voucher-delete form').attr('action', url_delete);
        })

        let url_update = $('#modal-voucher-update form').attr('action');
        $('.btn-update').click(function() {
            let id = $(this).data('id');
            let url = url_update.replace(':id', id)
            let status = $(this).data('status');
            $('#modal-voucher-update form').attr('action', url);
            $('#modal-voucher-update form input[name="status"]').val(status);
        })
        $('#modal-voucher-update').on('hide.bs.modal', function() {
            $('#modalvoucherr-update form').attr('action', url_update);
        })
    })
</script>
@endpush
