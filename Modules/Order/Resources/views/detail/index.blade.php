@extends('order::detail.layouts.master')

@section('title-page', 'Order Detail')

@section('small-info')
<small>List of detail order ({{ $details->total() }})</small>
@endsection

@section('breakcumb')
<ol class="breadcrumb">
    <li><a href="{{ route('admin') }}"><i class="fa fa-dashboard"></i> Admin</a></li>
    <li><a href="{{ route('admin.order.index') }}">Order</a></li>
    <li><a href="{{ route('admin.order.detail.index', $order_id) }}">Detail</a></li>
    <li class="active">Index</li>
</ol>
@endsection

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="box box-primary box-main">
            <div class="box-header with-border">
                <div class="box-title">List</div>
                @can('order_detail:add')
                @if (check_can_edit_by_orderid($order_id))
                <a href="{{ route('admin.order.detail.create', $order_id) }}" class="btn btn-primary pull-right"><i class="fa fa-plus"></i> Add New</a>
                @endif
                @endcan
                <a href="{{ route('admin.order.index') }}" class="btn btn-default pull-right mr-1"><i class="fa fa-arrow-left"></i> Back</a>
            </div>
            <div class="box-body">
                <div class="table-header">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="filter" style="text-align: left">
                                <label for="search">
                                    Search:
                                    <input id="search" type="search" class="form-control input-sm" name="search" value="{{ request()->search }}" data-url="{{ route('admin.order.detail.index', $order_id) }}">
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
                                <th>Product</th>
                                <th>Author</th>
                                <th>Quantity</th>
                                <th>Price</th>
                                <th>Total</th>
                                @canany(['order_detail:edit', 'order_detail:delete'])
                                @if (check_can_edit_by_orderid($order_id))
                                <th style="width: 1px">Action</th>
                                @endif
                                @endcanany
                            </tr>
                        </thead>
                        <tbody class="tbody-loading">
                            <tr>
                                <td colspan="10"><i class="fa fa-spin fa-spinner fa-lg"></i></td>
                            </tr>
                        </tbody>
                        <tbody class="tbody-data hidden">
                            @foreach ($details as $key => $detail)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    @if ($detail->target_type === TargetType::PRODUCT)
                                    @can('product:read')
                                    <td><a href="{{ route('admin.product.show', $detail->target_id) }}">{{ $detail->target->name }}</a></td>
                                    @else
                                    <td>{{ $detail->target->name }}</td>
                                    @endcan
                                    @else
                                    @can('product_variation:read')
                                    <td><a href="{{ route('admin.product.variation.show', ['product_id' => $detail->target->product_id, 'id' => $detail->target_id]) }}">{{ $detail->target->name }}</a></td>
                                    @else
                                    <td>{{ $detail->target->name }}</td>
                                    @endcan
                                    @endif
                                    @if($detail->user)
                                    @can('user:read')
                                    <td><a href="{{ route('admin.user.show', $detail->author_id) }}">{{ $detail->user->account }}</a></td>
                                    @else
                                    <td>{{ $detail->user->account }}</td>
                                    @endcan
                                    @else
                                    <td></td>
                                    @endif
                                    <td>{{ $detail->quantity }}</td>
                                    <td>{{ number_format($detail->price) }}</td>
                                    <td>{{ number_format($detail->price * $detail->quantity) }}</td>
                                    @canany(['order_detail:edit', 'order_detail:delete'])
                                    @if (check_can_edit_by_orderid($order_id))
                                    <td class="nowrap">
                                        @can('order_detail:edit')
                                        <a class="btn btn-primary" href="{{ route('admin.order.detail.edit', ['order_id' => $order_id, 'id' => $detail->id]) }}"><i class="fa fa-edit"></i> Edit</a>
                                        @endcan
                                        @can('order_detail:delete')
                                        <button class="btn btn-danger btn-delete" data-toggle="modal" data-target="#modal-order-detail-delete" data-id="{{ $detail->id }}"><i class="fa fa-trash"></i> Delete</button>
                                        @endcan
                                    </td>
                                    @endif
                                    @endcanany
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="table-footer mt-3">
                    <div class="row">
                        <div class="col-lg-12">
                            {{ $details->appends($_GET)->links(get_admin_theme_extend($admin_active_theme, 'paginate')) }}
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
            'url'       => route('admin.order.detail.delete', [
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

        $('.box-main table .tbody-loading').addClass('hidden')
        $('.box-main table .tbody-data').removeClass('hidden')
    })
</script>
@endpush
