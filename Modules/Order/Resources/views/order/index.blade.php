@extends('order::order.layouts.master')

@section('title-page', 'Orders')

@section('small-info')
<small>List of orders ({{ $orders->total() }})</small>
@endsection

@section('breakcumb')
<ol class="breadcrumb">
    <li><a href="{{ route('admin') }}"><i class="fa fa-dashboard"></i> Admin</a></li>
    <li><a href="{{ route('order.index') }}">Order</a></li>
    <li class="active">Index</li>
</ol>
@endsection

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="box box-primary">
            <div class="box-header with-border">
                <div class="box-title">List</div>
            </div>
            <div class="box-body">
                <div class="table-header">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="filter">
                                <label for="search">
                                    Search:
                                    <input id="search" type="search" class="form-control input-sm" name="search" value="{{ request()->search }}" data-url="{{ route('order.index') }}">
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
                                <th>Code</th>
                                <th>User</th>
                                <th>Created At</th>
                                <th>Updated At</th>
                                <th>Detail</th>
                                <th>Quantity</th>
                                <th>Total</th>
                                <th>Status</th>
                                <th style="width: 200px">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($orders as $order)
                                <tr>
                                    <td>{{ $order->id }}</td>
                                    <td><a href="{{ route('order.show', $order->id) }}">{{ $order->code }}</a></td>
                                    @if ($order->user)
                                    <td><a href="{{ route('user.show', $order->user->id) }}">{{ $order->user->fullname }}</a></td>
                                    @else
                                    <td></td>
                                    @endif
                                    <td>{{ $order->created_at->format('H:i:s d/m/Y') }}</td>
                                    <td>{{ $order->updated_at->format('H:i:s d/m/Y') }}</td>
                                    <td><a href="{{ route('order.detail.index', $order->id) }}">detail</a></td>
                                    <td>{{ $order->quantity }}</td>
                                    <td>{{ number_format($order->total) }}</td>
                                    <td>{!! generate_label_orderstatus($order->status) !!}</td>
                                    <td>
                                        {!! generate_button_orderstatus($order->status, $order->id) !!}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="table-footer mt-3">
                    <div class="row">
                        <div class="col-lg-12">
                            {{ $orders->appends($_GET)->links('themes.adminlte.paginate') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@include('order::order.layouts.modal', [
    'modal'             => [
        'id'            => 'modal-order-delete',
        'title'         => 'Delete Order',
        'message'       => 'Are you sure to delete this order!',
        'form'          => [
            'url'       => route('order.delete', ':id'),
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

@include('order::order.layouts.modal', [
    'modal'                 => [
        'id'                => 'modal-order-update',
        'title'             => 'Update Order',
        'message'           => 'Are you sure to update status this order!',
        'form'              => [
            'url'           => route('order.update', ':id'),
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
        let url_delete = $('#modal-order-delete form').attr('action');
        $('.btn-delete').click(function() {
            let id = $(this).data('id');
            let url = url_delete.replace(':id', id)
            $('#modal-order-delete form').attr('action', url);
        })
        $('#modal-order-delete').on('hide.bs.modal', function() {
            $('#modal-order-delete form').attr('action', url_delete);
        })
        let url_update = $('#modal-order-update form').attr('action');
        $('.btn-update').click(function() {
            let id = $(this).data('id');
            let url = url_update.replace(':id', id)
            let status = $(this).data('status');
            $('#modal-order-update form').attr('action', url);
            $('#modal-order-update form input[name="status"]').val(status);
        })
        $('#modal-order-update').on('hide.bs.modal', function() {
            $('#modal-order-update form').attr('action', url_update);
        })
    })
</script>
@endpush
