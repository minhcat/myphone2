@extends('product::product.layouts.master')

@section('title-page', 'Product')

@section('small-info')
<small>List of products ({{ $products->total() }})</small>
@endsection

@section('breakcumb')
<ol class="breadcrumb">
    <li><a href="{{ route('admin') }}"><i class="fa fa-dashboard"></i> Admin</a></li>
    <li><a href="{{ route('admin.product.index') }}">Product</a></li>
    <li class="active">Index</li>
</ol>
@endsection

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="box box-primary box-main">
            <div class="box-header with-border">
                <div class="box-title">List</div>
                @can ('product:add')
                <a href="{{ route('admin.product.create') }}" class="btn btn-primary pull-right"><i class="fa fa-plus"></i> Add New</a>
                @endcan
            </div>
            <div class="box-body">
                <div class="table-header">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="filter">
                                <label for="search">
                                    Search:
                                    <input id="search" type="search" class="form-control input-sm" name="search" value="{{ request()->search }}" data-url="{{ route('admin.product.index') }}">
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
                                <th>Name</th>
                                <th>Brand</th>
                                <th>Category</th>
                                <th>Tag</th>
                                @if (!is_kaiadmin($admin_active_theme))
                                <th>Price</th>
                                @endif
                                <th>Author</th>
                                @can('product_variation:browse')
                                <th>Variations</th>
                                @endcan
                                @can('product_detail:read')
                                <th>Detail</th>
                                @endcan
                                @canany(['product:edit', 'product:delete'])
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
                            @foreach ($products as $key => $product)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    @can('product:read')
                                    <td><a href="{{ route('admin.product.show', $product->id) }}">{{ $product->name }}</a></td>
                                    @else
                                    <td>{{ $product->name }}</td>
                                    @endcan
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
                                    <td>
                                        @foreach($product->tags as $tag)
                                            @if ($loop->first)
                                                {{ $tag->name }}
                                            @else
                                                , {{ $tag->name }}
                                            @endif
                                        @endforeach
                                    </td>
                                    @if (!is_kaiadmin($admin_active_theme))
                                    <td>{{ $product->price_format }} vnđ</td>
                                    @endif
                                    @if ($product->user)
                                    @can('user:read')
                                    <td><a href="{{ route('admin.user.show', $product->user->id) }}">{{ $product->user->account }}</a></td>
                                    @else
                                    <td>{{ $product->user->account }}</td>
                                    @endcan
                                    @else
                                    <td></td>
                                    @endif
                                    @can('product_variation:browse')
                                    <td><a href="{{ route('admin.product.variation.index', $product->id) }}">list</a></td>
                                    @endcan
                                    @can('product_detail:read')
                                    <td><a href="{{ route('admin.product.detail.index', $product->id) }}">view</a></td>
                                    @endcan
                                    @canany(['product:edit', 'product:delete'])
                                    <td class="nowrap">
                                        @can('product:edit')
                                        <a class="btn btn-primary" href="{{ route('admin.product.edit', $product->id) }}"><i class="fa fa-edit"></i> Edit</a>
                                        @endcan
                                        @can('product:delete')
                                        <button class="btn btn-danger btn-delete" data-toggle="modal" data-target="#modal-product-delete" data-id="{{ $product->id }}"><i class="fa fa-trash"></i> Delete</button>
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
                            {{ $products->appends($_GET)->links(get_admin_theme_extend($admin_active_theme, 'paginate')) }}
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
            'url'       => route('admin.product.delete', ':id'),
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

        $('.box-main table .tbody-loading').addClass('hidden')
        $('.box-main table .tbody-data').removeClass('hidden')
    })
</script>
@endpush
