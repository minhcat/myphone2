@extends('product::product.layouts.master')

@section('title-page', 'Products')

@section('small-info')
<small>List of products ({{ $products->total() }})</small>
@endsection

@section('breakcumb')
<ol class="breadcrumb">
    <li><a href="{{ route('admin') }}"><i class="fa fa-dashboard"></i> Admin</a></li>
    <li><a href="{{ route('product.index') }}">Product</a></li>
    <li class="active">Index</li>
</ol>
@endsection

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="box box-primary">
            <div class="box-header with-border">
                <div class="box-title">List</div>
                <a href="{{ route('product.create') }}" class="btn btn-primary pull-right"><i class="fa fa-plus"></i> Add New</a>
            </div>
            <div class="box-body">
                <div class="table-header">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="filter">
                                <label for="search">
                                    Search:
                                    <input id="search" type="search" class="form-control input-sm" name="search" value="{{ request()->search }}" data-url="{{ route('product.index') }}">
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
                                <th>Brand</th>
                                <th>Category</th>
                                <th>Price</th>
                                <th>Author</th>
                                <th>Variation</th>
                                <th>Detail</th>
                                <th style="width: 175px">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($products as $key => $product)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td><a href="{{ route('product.show', $product->id) }}">{{ $product->name }}</a></td>
                                    <td>{{ optional($product->brand)->name }}</td>
                                    <td>
                                        @foreach($product->categories as $category)
                                            @if ($loop->first)
                                                {{ $category->name }}
                                            @else
                                                , {{ $category->name }}
                                            @endif
                                        @endforeach
                                    </td>
                                    <td>{{ $product->price_format }} vnđ</td>
                                    @if ($product->user)
                                    <td><a href="{{ route('user.show', $product->user->id) }}">{{ $product->user->fullname }}</a></td>
                                    @else
                                    <td></td>
                                    @endif
                                    <td><a href="{{ route('product.variation.index', $product->id) }}">list</a></td>
                                    <td><a href="{{ route('product.detail.index', $product->id) }}">view</a></td>
                                    <td>
                                        <a class="btn btn-primary" href="{{ route('product.edit', $product->id) }}"><i class="fa fa-edit"></i> Edit</a>
                                        <button class="btn btn-danger btn-delete" data-toggle="modal" data-target="#modal-product-delete" data-id="{{ $product->id }}"><i class="fa fa-trash"></i> Delete</button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="table-footer mt-3">
                    <div class="row">
                        <div class="col-lg-12">
                            {{ $products->appends($_GET)->links('themes.adminlte.paginate') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@include('product::product.layouts.modal', [
    'modal'             => [
        'id'            => 'modal-product-delete',
        'title'         => 'Delete Product',
        'message'       => 'Are you sure to delete this product!',
        'form'          => [
            'url'       => route('product.delete', ':id'),
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

        let url_delete = $('#modal-product-delete form').attr('action');
        $('.btn-delete').click(function() {
            let id = $(this).data('id');
            let url = url_delete.replace(':id', id)
            $('#modal-product-delete form').attr('action', url);
        })
        $('#modal-product-delete').on('hide.bs.modal', function() {
            $('#modal-product-delete form').attr('action', url_delete);
        })
    })
</script>
@endpush
