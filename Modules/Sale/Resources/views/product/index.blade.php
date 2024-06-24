@extends('sale::product.layouts.master')

@section('title-page', 'Sale Products')

@section('small-info')
<small>List of sale product ({{ $sale_products->total() }})</small>
@endsection

@section('breakcumb')
<ol class="breadcrumb">
    <li><a href="{{ route('admin') }}"><i class="fa fa-dashboard"></i> Admin</a></li>
    <li><a href="{{ route('sale.index') }}">Sale</a></li>
    <li><a href="{{ route('sale.product.index', $sale_id) }}">Sale</a></li>
    <li class="active">Index</li>
</ol>
@endsection

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="box box-primary">
            <div class="box-header with-border">
                <div class="box-title">List</div>
                <a href="{{ route('sale.product.create', $sale_id) }}" class="btn btn-primary pull-right"><i class="fa fa-plus"></i> Add New</a>
            </div>
            <div class="box-body">
                <div class="table-header">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="filter">
                                <label for="search">
                                    Search:
                                    <input id="search" type="search" class="form-control input-sm" name="search" value="{{ request()->search }}" data-url="{{ route('sale.product.index', $sale_id) }}">
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
                                <th>Product</th>
                                <th>Discount Type</th>
                                <th>Discount Value</th>
                                <th>Discount Minimum</th>
                                <th>Discount Maximum</th>
                                <th style="width: 175px">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($sale_products as $key => $sale_product)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    @if ($sale_product->target_type === TargetType::PRODUCT)
                                    <td><a href="{{ route('product.show', $sale_product->target_id) }}">{{ $sale_product->target->name }}</a></td>
                                    @else
                                    <td><a href="{{ route('product.show', $sale_product->target_id) }}">{{ $sale_product->target->name }}</a></td>
                                    @endif
                                    <td>{!! generate_label($sale_product->discount_type_show, new DiscountType) !!}</td>
                                    <td>{{ number_format($sale_product->discount_value_show) }}</td>
                                    <td>{{ $sale_product->discount_minimum_show }}</td>
                                    <td>{{ $sale_product->discount_maximum_show }}</td>
                                    <td style="text-align: right">
                                        <a class="btn btn-primary" href="{{ route('sale.product.edit', ['sale_id' => $sale_id, 'id' => $sale_product->id]) }}"><i class="fa fa-edit"></i> Edit</a>
                                        <button class="btn btn-danger btn-delete" data-toggle="modal" data-target="#modal-sale-product-delete" data-id="{{ $sale_product->id }}"><i class="fa fa-trash"></i> Delete</button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="table-footer mt-3">
                    <div class="row">
                        <div class="col-lg-12">
                            {{ $sale_products->appends($_GET)->links('themes.adminlte.paginate') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@include('sale::sale.layouts.modal', [
    'modal'             => [
        'id'            => 'modal-sale-product-delete',
        'title'         => 'Delete Sale',
        'message'       => 'Are you sure to delete this sale!',
        'form'          => [
            'url'       => route('sale.product.delete', ['sale_id' => $sale_id, 'id' => ':id']),
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

        let url_delete = $('#modal-sale-product-delete form').attr('action');
        $('.btn-delete').click(function() {
            let id = $(this).data('id');
            let url = url_delete.replace(':id', id)
            $('#modal-sale-product-delete form').attr('action', url);
        })
        $('#modal-sale-delete').on('hide.bs.modal', function() {
            $('#modal-sale-product-delete form').attr('action', url_delete);
        })
    })
</script>
@endpush
