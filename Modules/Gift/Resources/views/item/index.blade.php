@extends('gift::item.layouts.master')

@section('title-page', 'Gift Product Items')

@section('small-info')
<small>List of gift product item ({{ $gift_product_items->total() }})</small>
@endsection

@section('breakcumb')
<ol class="breadcrumb">
    <li><a href="{{ route('admin') }}"><i class="fa fa-dashboard"></i> Admin</a></li>
    <li><a href="{{ route('admin.gift.index') }}">Gift</a></li>
    <li><a href="{{ route('admin.gift.product.index', $gift_id) }}">Product</a></li>
    <li><a href="{{ route('admin.gift.product.item.index', ['gift_id' => $gift_id, 'gift_product_id' => $gift_product_id]) }}">Product</a></li>
    <li class="active">Index</li>
</ol>
@endsection

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="box box-primary box-main">
            <div class="box-header with-border">
                <div class="box-title">List</div>
                @can('gift_product_item:add')
                <a href="{{ route('admin.gift.product.item.create', ['gift_id' => $gift_id, 'gift_product_id' => $gift_product_id]) }}" class="btn btn-primary pull-right"><i class="fa fa-plus"></i> Add New</a>
                @endcan
                <a href="{{ route('admin.gift.product.index', $gift_id) }}" class="btn btn-default pull-right mr-1"><i class="fa fa-arrow-left"></i> Back</a>
            </div>
            <div class="box-body">
                <div class="table-header">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="filter" style="text-align: left">
                                <label for="search">
                                    Search:
                                    <input id="search" type="search" class="form-control input-sm" name="search" value="{{ request()->search }}" data-url="{{ route('admin.gift.product.item.index', ['gift_id' => $gift_id, 'gift_product_id' => $gift_product_id]) }}">
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
                                <th>Created At</th>
                                <th>Updated At</th>
                                @canany(['gift_product_item:edit', 'gift_product_item:delete'])
                                <th style="width: 1px">Action</th>
                                @endcanany
                            </tr>
                        </thead>
                        <tbody class="tbody-loading">
                            <tr>
                                <td colspan="10"><i class="fa fa-spin fa-spinner fa-lg"></i></td>
                            </tr>
                        </tbody>
                        <tbody class="tbody-data hidden">
                            @foreach ($gift_product_items as $key => $gift_product_item)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    @if ($gift_product_item->target_type === TargetType::PRODUCT)
                                    @can('product:read')
                                    <td><a href="{{ route('admin.product.show', $gift_product_item->target_id) }}">{{ $gift_product_item->target->name }}</a></td>
                                    @else
                                    <td>{{ $gift_product_item->target->name }}</td>
                                    @endcan
                                    @else
                                    @can('product_variation:read')
                                    <td><a href="{{ route('admin.product.variation.show', ['product_id' => $gift_product_item->target->product_id, 'id' => $gift_product_item->target_id]) }}">{{ $gift_product_item->target->name }}</a></td>
                                    @else
                                    <td>{{ $gift_product_item->target->name }}</td>
                                    @endcan
                                    @endif
                                    @if ($gift_product_item->user)
                                    @can('user:read')
                                    <td><a href="{{ route('admin.user.show', $gift_product_item->user->id) }}">{{ $gift_product_item->user->account }}</a></td>
                                    @else
                                    <td>{{ $gift_product_item->user->account }}</td>
                                    @endcan
                                    @else
                                    <td></td>
                                    @endif
                                    <td>{{ $gift_product_item->quantity === null ? '#' : $gift_product_item->quantity }}</td>
                                    <td>{{ $gift_product_item->created_at->format('H:i:s d-m-Y') }}</td>
                                    <td>{{ $gift_product_item->updated_at->format('H:i:s d-m-Y') }}</td>
                                    @canany(['gift_product_item:edit', 'gift_product_item:delete'])
                                    <td style="text-align: right" class="nowrap">
                                        @can('gift_product_item:edit')
                                        <a class="btn btn-primary"
                                        href="{{ route('admin.gift.product.item.edit', [
                                            'gift_id' => $gift_id,
                                            'gift_product_id' => $gift_product_id,
                                            'id' => $gift_product_item->id
                                        ]) }}"><i class="fa fa-edit"></i> Edit</a>
                                        @endcan
                                        @can('gift_product_item:delete')
                                        <button class="btn btn-danger btn-delete" data-toggle="modal" data-target="#modal-gift-product-item-delete" data-id="{{ $gift_product_item->id }}"><i class="fa fa-trash"></i> Delete</button>
                                        @endcan
                                    </td>
                                    @endcanany
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="table-footer mt-3">
                    <div class="row">
                        <div class="col-lg-12">
                            {{ $gift_product_items->appends($_GET)->links(get_admin_theme_extend($admin_active_theme, 'paginate')) }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@include('gift::item.layouts.modal', [
    'modal'             => [
        'id'            => 'modal-gift-product-item-delete',
        'title'         => 'Delete Gift Product Item',
        'message'       => 'Are you sure to delete this gift product item!',
        'form'          => [
            'url'       => route('admin.gift.product.item.delete', ['gift_id' => $gift_id, 'gift_product_id' => $gift_product_id, 'id' => ':id']),
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

        let url_delete = $('#modal-gift-product-item-delete form').attr('action');
        $('.btn-delete').click(function() {
            let id = $(this).data('id');
            let url = url_delete.replace(':id', id)
            $('#modal-gift-product-item-delete form').attr('action', url);
        })
        $('#modal-gift-delete').on('hide.bs.modal', function() {
            $('#modal-gift-product-item-delete form').attr('action', url_delete);
        })

        $('.box-main table .tbody-loading').addClass('hidden')
        $('.box-main table .tbody-data').removeClass('hidden')
    })
</script>
@endpush
