@extends('order::detail.layouts.master')

@section('title-page', 'Orders')

@section('small-info')
<small>List of detail order ({{ $details->total() }})</small>
@endsection

@section('breakcumb')
<ol class="breadcrumb">
    <li><a href="{{ route('admin') }}"><i class="fa fa-dashboard"></i> Admin</a></li>
    <li><a href="{{ route('order.index') }}">Order</a></li>
    <li><a href="{{ route('order.detail.index', $order_id) }}">Detail</a></li>
    <li class="active">Index</li>
</ol>
@endsection

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="box box-primary">
            <div class="box-header with-border">
                <div class="box-title">List</div>
                @if (check_can_edit_by_orderid($order_id))
                <a href="{{ route('order.detail.create', $order_id) }}" class="btn btn-primary pull-right">New Order</a>
                @endif
            </div>
            <div class="box-body">
                <div class="table-body">
                    <table class="table table-bordered table-striped mt-3 table-fix">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Product</th>
                                <th>Quantity</th>
                                <th>Price</th>
                                <th>Total</th>
                                @if (check_can_edit_by_orderid($order_id))
                                <th style="width: 100px">Action</th>
                                @endif
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($details as $detail)
                                <tr>
                                    <td>{{ $detail->id }}</td>
                                    @if ($detail->product)
                                    <td><a href="{{ route('product.show', $detail->product->id) }}">{{ $detail->product->name }}</a></td>
                                    @else
                                    <td></td>
                                    @endif
                                    <td>{{ $detail->quantity }}</td>
                                    <td>{{ $detail->price }}</td>
                                    <td>{{ $detail->price * $detail->quantity }}</td>
                                    @if (check_can_edit_by_orderid($order_id))
                                    <td>
                                        <a class="btn btn-icon btn-primary" href="{{ route('order.detail.edit', ['order_id' => $order_id, 'id' => $detail->id]) }}"><i class="fa fa-edit"></i></a>
                                        <button class="btn btn-icon btn-danger btn-delete" data-toggle="modal" data-target="#modal-order-detail-delete" data-id="{{ $detail->id }}"><i class="fa fa-trash"></i></button>
                                    </td>
                                    @endif
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="table-footer mt-3">
                    <div class="row">
                        <div class="col-lg-12">
                            {{ $details->appends($_GET)->links('themes.adminlte.paginate') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@include('order::detail.layouts.modal', [
    'modal'             => [
        'id'            => 'modal-order-detail-delete',
        'title'         => 'Delete Order Detail',
        'message'       => 'Are you sure to delete this detail!',
        'form'          => [
            'url'       => route('order.detail.delete', [
                'order_id'  => $order_id,
                'id'        => ':id'
            ]),
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
        let url_delete = $('#modal-order-detail-delete form').attr('action');
        $('.btn-delete').click(function() {
            let id = $(this).data('id');
            let url = url_delete.replace(':id', id)
            $('#modal-order-detail-delete form').attr('action', url);
        })
        $('#modal-order-detail-delete').on('hide.bs.modal', function() {
            $('#modal-order-detail-delete form').attr('action', url_delete);
        })
    })
</script>
@endpush
