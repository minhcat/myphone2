@extends('cart::cart.layouts.master')

@section('title-page', 'Cart Detail')

@section('small-info')
<small>List of cart details ({{ $details->total() }})</small>
@endsection

@section('breakcumb')
<ol class="breadcrumb">
    <li><a href="{{ route('admin') }}"><i class="fa fa-dashboard"></i> Admin</a></li>
    <li><a href="{{ route('admin.cart.index') }}">Cart</a></li>
    <li><a href="{{ route('admin.cart.detail.index', 1) }}">Detail</a></li>
    <li class="active">Index</li>
</ol>
@endsection

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="box box-primary">
            <div class="box-header with-border">
                <div class="box-title">List</div>
                <a href="{{ route('admin.cart.detail.create', $cart_id) }}" class="btn btn-primary pull-right"><i class="fa fa-plus"></i> Add New</a>
            </div>
            <div class="box-body">
                <div class="table-body">
                    <table class="table table-bordered table-striped mt-3">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Product</th>
                                <th>Quantity</th>
                                <th>Price</th>
                                <th>Total</th>
                                <th style="width: 175px">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($details as $key => $detail)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    @if ($detail->target_type === TargetType::PRODUCT)
                                    <td><a href="{{ route('admin.product.show', $detail->target_id) }}">{{ $detail->target->name }}</a></td>
                                    @else
                                    <td><a href="{{ route('admin.product.variation.show', ['product_id' => $detail->target->product_id, 'id' => $detail->target_id]) }}">{{ $detail->target->name }}</a></td>
                                    @endif
                                    <td>{{ $detail->quantity }}</td>
                                    <td>{{ $detail->price }}</td>
                                    <td>{{ $detail->price * $detail->quantity }}</td>
                                    <td>
                                        <a class="btn btn-primary" href="{{ route('admin.cart.detail.edit', ['cart_id' => $cart_id, 'id' => $detail->id]) }}"><i class="fa fa-edit"></i> Edit</a>
                                        <button class="btn btn-danger btn-delete" data-toggle="modal" data-target="#modal-cart-detail-delete" data-id="{{ $detail->id }}"><i class="fa fa-trash"></i> Delete</button>
                                    </td>
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

@include('cart::detail.layouts.modal', [
    'modal'             => [
        'id'            => 'modal-cart-detail-delete',
        'title'         => 'Delete Cart Detail',
        'message'       => 'Are you sure to delete this detail!',
        'form'          => [
            'url'       => route('admin.cart.detail.delete', [
                'cart_id'   => $cart_id,
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

        let url_delete = $('#modal-cart-detail-delete form').attr('action');
        $('.btn-delete').click(function() {
            let id = $(this).data('id');
            let url = url_delete.replace(':id', id)
            $('#modal-cart-detail-delete form').attr('action', url);
        })
        $('#modal-cart-detail-delete').on('hide.bs.modal', function() {
            $('#modal-cart-detail-delete form').attr('action', url_delete);
        })
    })
</script>
@endpush
