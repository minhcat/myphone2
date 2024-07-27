@extends('cart::cart.layouts.master')

@section('title-page', 'Carts')

@section('small-info')
<small>List of carts ({{ $carts->total() }})</small>
@endsection

@section('breakcumb')
<ol class="breadcrumb">
    <li><a href="{{ route('admin') }}"><i class="fa fa-dashboard"></i> Admin</a></li>
    <li><a href="{{ route('admin.cart.index') }}">Cart</a></li>
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
                                    <input id="search" type="search" class="form-control input-sm" name="search" value="{{ request()->search }}" data-url="{{ route('admin.cart.index') }}">
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
                                <th style="width: 100px">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($carts as $key => $cart)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td><a href="{{ route('admin.cart.show', $cart->id) }}">{{ $cart->code }}</a></td>
                                    @if ($cart->user)
                                    <td><a href="{{ route('admin.user.show', $cart->user->id) }}">{{ $cart->user->fullname }}</a></td>
                                    @else
                                    <td></td>
                                    @endif
                                    <td>{{ $cart->created_at->format('H:i:s d/m/Y') }}</td>
                                    <td>{{ $cart->updated_at->format('H:i:s d/m/Y') }}</td>
                                    <td><a href="{{ route('admin.cart.detail.index', $cart->id) }}">detail</a></td>
                                    <td>{{ $cart->quantity }}</td>
                                    <td>{{ number_format($cart->total) }}</td>
                                    <td>
                                        <button class="btn btn-success" data-toggle="modal" data-target="#modal-add-order-{{ $cart->id }}"><i class="fa fa-shopping-cart"></i> Order</button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="table-footer mt-3">
                    <div class="row">
                        <div class="col-lg-12">
                            {{ $carts->appends($_GET)->links('themes.adminlte.paginate') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@foreach($carts as $cart)
    @include('cart::cart.layouts.modal', $cart)
@endforeach

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

        $('.modal-add-order').on('click', '.products-minus .btn-add', function() {
            let id = $(this).data('id');
            let $modal = $('#modal-add-order-' + id);
            let product_html = $(this).parent().parent();
            $modal.find('.products-add').append(product_html);

            let product_price = parseInt($(this).data('price'));
            let product_quantity = parseInt($(this).parents('.input-group').find('input').val());
            let total_quantity = parseInt($modal.find('span.quantity').data('quantity') ?? 0);
            let total_price = parseInt($modal.find('span.total').data('total') ?? 0);

            total_quantity += product_quantity
            total_price += (product_price * product_quantity)

            $modal.find('span.quantity').text(total_quantity)
            $modal.find('span.quantity').data('quantity', total_quantity)
            $modal.find('span.total').text(number_format(total_price))
            $modal.find('span.total').data('total', total_price)
        });

        $('.modal-add-order').on('click', '.products-add .btn-add', function() {
            let id = $(this).data('id');
            let $modal = $('#modal-add-order-' + id);
            let product_html = $(this).parent().parent();
            $modal.find('.products-minus').append(product_html);

            let product_price = parseInt($(this).data('price'));
            let product_quantity = parseInt($(this).parents('.input-group').find('input').val());
            let total_quantity = parseInt($modal.find('span.quantity').data('quantity') ?? 0);
            let total_price = parseInt($modal.find('span.total').data('total') ?? 0);

            total_quantity -= product_quantity
            total_price -= (product_price * product_quantity)

            $modal.find('span.quantity').text(total_quantity)
            $modal.find('span.quantity').data('quantity', total_quantity)
            $modal.find('span.total').text(number_format(total_price))
            $modal.find('span.total').data('total', total_price)
        });

        $('.modal-add-order').on('change', '.products-add input.quantity', function() {
            let id = $(this).parent().find('.btn-add').data('id');
            let $modal = $('#modal-add-order-' + id);

            let total = 0
            let count = 0
            $('#modal-add-order-' + id + ' .products-add input.quantity').each(function() {
                let $btn = $(this).parent().find('.btn-add');
                let price = parseInt($btn.data('price'));
                let quantity = parseInt($btn.parents('.input-group').find('input').val());
                count += quantity
                total += (price * quantity)
            })

            $modal.find('span.quantity').text(count)
            $modal.find('span.quantity').data('quantity', count)
            $modal.find('span.total').text(number_format(total))
            $modal.find('span.total').data('total', total)
        })

        $('.modal-add-order .modal-footer .btn-primary').click(function() {
            let id = $(this).data('id');
            $('#modal-add-order-' + id + ' .modal-body form').submit()
        });
    })
</script>
@endpush
