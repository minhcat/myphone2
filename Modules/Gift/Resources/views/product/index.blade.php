@extends('gift::product.layouts.master')

@section('title-page', 'Gift Products')

@section('small-info')
<small>List of gift product ({{ $gift_products->total() }})</small>
@endsection

@section('breakcumb')
<ol class="breadcrumb">
    <li><a href="{{ route('admin') }}"><i class="fa fa-dashboard"></i> Admin</a></li>
    <li><a href="{{ route('admin.gift.index') }}">Gift</a></li>
    <li><a href="{{ route('admin.gift.product.index', $gift_id) }}">Product</a></li>
    <li class="active">Index</li>
</ol>
@endsection

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="box box-primary">
            <div class="box-header with-border">
                <div class="box-title">List</div>
                <a href="{{ route('admin.gift.product.create', $gift_id) }}" class="btn btn-primary pull-right"><i class="fa fa-plus"></i> Add New</a>
            </div>
            <div class="box-body">
                <div class="table-body">
                    <table class="table table-bordered table-striped mt-3">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Product</th>
                                <th>Author</th>
                                <th>Items</th>
                                <th>Quantity</th>
                                <th>Created At</th>
                                <th>Updated At</th>
                                <th style="width: 175px">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($gift_products as $key => $gift_product)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    @if ($gift_product->target_type === TargetType::PRODUCT)
                                    <td><a href="{{ route('admin.product.show', $gift_product->target_id) }}">{{ $gift_product->target->name }}</a></td>
                                    @else
                                    <td><a href="{{ route('admin.product.variation.show', ['product_id' => $gift_product->target->product_id, 'id' => $gift_product->target_id]) }}">{{ $gift_product->target->name }}</a></td>
                                    @endif
                                    <td><a href="{{ route('admin.user.show', $gift_product->user->id) }}">{{ $gift_product->user->fullname }}</a></td>
                                    <td><a href="{{ route('admin.gift.product.item.index', ['gift_id' => $gift_id, 'gift_product_id' => $gift_product->id]) }}">list</a></td>
                                    <td>{{ $gift_product->quantity === null ? '#' : $gift_product->quantity }}</td>
                                    <td>{{ $gift_product->created_at->format('H:i:s d-m-Y') }}</td>
                                    <td>{{ $gift_product->updated_at->format('H:i:s d-m-Y') }}</td>
                                    <td style="text-align: right">
                                        <a class="btn btn-primary" href="{{ route('admin.gift.product.edit', ['gift_id' => $gift_id, 'id' => $gift_product->id]) }}"><i class="fa fa-edit"></i> Edit</a>
                                        <button class="btn btn-danger btn-delete" data-toggle="modal" data-target="#modal-gift-product-delete" data-id="{{ $gift_product->id }}"><i class="fa fa-trash"></i> Delete</button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="table-footer mt-3">
                    <div class="row">
                        <div class="col-lg-12">
                            {{ $gift_products->appends($_GET)->links('themes.adminlte.paginate') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@include('gift::product.layouts.modal', [
    'modal'             => [
        'id'            => 'modal-gift-product-delete',
        'title'         => 'Delete Gift',
        'message'       => 'Are you sure to delete this gift!',
        'form'          => [
            'url'       => route('admin.gift.product.delete', ['gift_id' => $gift_id, 'id' => ':id']),
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

        let url_delete = $('#modal-gift-product-delete form').attr('action');
        $('.btn-delete').click(function() {
            let id = $(this).data('id');
            let url = url_delete.replace(':id', id)
            $('#modal-gift-product-delete form').attr('action', url);
        })
        $('#modal-gift-delete').on('hide.bs.modal', function() {
            $('#modal-gift-product-delete form').attr('action', url_delete);
        })
    })
</script>
@endpush
