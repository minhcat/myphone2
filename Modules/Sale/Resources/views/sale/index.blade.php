@extends('sale::sale.layouts.master')

@section('title-page', 'Sale')

@section('small-info')
<small>List of sales ({{ $sales->total() }})</small>
@endsection

@section('breakcumb')
<ol class="breadcrumb">
    <li><a href="{{ route('admin') }}"><i class="fa fa-dashboard"></i> Admin</a></li>
    <li><a href="{{ route('admin.sale.index') }}">Sale</a></li>
    <li class="active">Index</li>
</ol>
@endsection

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="box box-primary">
            <div class="box-header with-border">
                <div class="box-title">List</div>
                <a href="{{ route('admin.sale.create') }}" class="btn btn-primary pull-right"><i class="fa fa-plus"></i> Add New</a>
            </div>
            <div class="box-body">
                <div class="table-header">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="filter">
                                <label for="search">
                                    Search:
                                    <input id="search" type="search" class="form-control input-sm" name="search" value="{{ request()->search }}" data-url="{{ route('admin.sale.index') }}">
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
                                <th>Products</th>
                                <th>Discount Target</th>
                                <th>Discount Type</th>
                                <th>Start Date</th>
                                <th>End Date</th>
                                <th>Status</th>
                                <th style="width: 274px">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($sales as $key => $sale)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td><a href="{{ route('admin.sale.show', $sale->id) }}">{{ $sale->name }}</a></td>
                                    @if ($sale->user)
                                    <td><a href="{{ route('admin.user.show', $sale->user->id) }}">{{ $sale->user->fullname }}</a></td>
                                    @else
                                    <td></td>
                                    @endif
                                    <td><a href="{{ route('admin.sale.product.index', $sale->id) }}">list</a></td>
                                    <td>{!! generate_label($sale->discount_target, new DiscountTarget) !!}</td>
                                    <td>{!! generate_label($sale->discount_type, new DiscountType) !!}</td>
                                    <td>{{ $sale->start_datetime?->format('H:i:s d/m/Y') }}</td>
                                    <td>{{ $sale->end_datetime?->format('H:i:s d/m/Y') }}</td>
                                    <td>{!! generate_label($sale->status, new PromotionStatus) !!}</td>
                                    <td style="text-align: right">
                                        {!! generate_button_update_status($sale->status, new PromotionStatus, ['toggle' => 'modal', 'target' => '#modal-sale-update', 'id' => $sale->id, 'status' => PromotionStatus::getNextStatus($sale->status)]) !!}
                                        <a class="btn btn-primary" href="{{ route('admin.sale.edit', $sale->id) }}"><i class="fa fa-edit"></i> Edit</a>
                                        <button class="btn btn-danger btn-delete" data-toggle="modal" data-target="#modal-sale-delete" data-id="{{ $sale->id }}"><i class="fa fa-trash"></i> Delete</button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="table-footer mt-3">
                    <div class="row">
                        <div class="col-lg-12">
                            {{ $sales->appends($_GET)->links('themes.adminlte.paginate') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@include('sale::sale.layouts.modal', [
    'modal'             => [
        'id'            => 'modal-sale-delete',
        'title'         => 'Delete Sale',
        'message'       => 'Are you sure to delete this sale!',
        'form'          => [
            'url'       => route('admin.sale.delete', ':id'),
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

@include('sale::sale.layouts.modal', [
    'modal'                 => [
        'id'                => 'modal-sale-update',
        'title'             => 'Update Status Sale',
        'message'           => 'Are you sure to update status this sale!',
        'form'              => [
            'url'           => route('admin.sale.update', ':id'),
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

        let url_delete = $('#modal-sale-delete form').attr('action');
        $('.btn-delete').click(function() {
            let id = $(this).data('id');
            let url = url_delete.replace(':id', id)
            $('#modal-sale-delete form').attr('action', url);
        })
        $('#modal-sale-delete').on('hide.bs.modal', function() {
            $('#modal-sale-delete form').attr('action', url_delete);
        })

        let url_update = $('#modal-sale-update form').attr('action');
        $('.btn-update').click(function() {
            let id = $(this).data('id');
            let url = url_update.replace(':id', id)
            let status = $(this).data('status');
            $('#modal-sale-update form').attr('action', url);
            $('#modal-sale-update form input[name="status"]').val(status);
        })
        $('#modal-sale-update').on('hide.bs.modal', function() {
            $('#modalsaler-update form').attr('action', url_update);
        })
    })
</script>
@endpush
