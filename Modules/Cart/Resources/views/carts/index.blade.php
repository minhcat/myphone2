@extends('cart::carts.layouts.master')

@section('title-page', 'Carts')

@section('small-info')
<small>List of carts ({{ $carts->total() }})</small>
@endsection

@section('breakcumb')
<ol class="breadcrumb">
    <li><a href="{{ route('admin') }}"><i class="fa fa-dashboard"></i> Admin</a></li>
    <li><a href="{{ route('cart.index') }}">Cart</a></li>
    <li class="active">Index</li>
</ol>
@endsection

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="box box-primary">
            <div class="box-header with-border">
                <div class="box-title">List</div>
                <a href="{{ route('cart.create') }}" class="btn btn-primary pull-right">New Cart</a>
            </div>
            <div class="box-body">
                <div class="table-header">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="filter">
                                <label for="search">
                                    Search:
                                    <input id="search" type="search" class="form-control input-sm" name="search" value="{{ request()->search }}" data-url="{{ route('cart.index') }}">
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
                            @foreach ($carts as $cart)
                                <tr>
                                    <td>{{ $cart->id }}</td>
                                    <td><a href="{{ route('cart.show', $cart->id) }}">{{ $cart->code }}</a></td>
                                    @if ($cart->user)
                                    <td><a href="{{ route('user.show', $cart->user->id) }}">{{ $cart->user->fullname }}</a></td>
                                    @else
                                    <td></td>
                                    @endif
                                    <td>{{ $cart->created_at->format('H:i:s d/m/Y') }}</td>
                                    <td>{{ $cart->updated_at->format('H:i:s d/m/Y') }}</td>
                                    <td><a href="">detail</a></td>
                                    <td>3</td>
                                    <td>1000</td>
                                    <td>
                                        <a class="btn btn-icon btn-primary" href="{{ route('cart.edit', $cart->id) }}"><i class="fa fa-edit"></i></a>
                                        <button class="btn btn-icon btn-danger btn-delete" data-toggle="modal" data-target="#modal-cart-delete" data-id="{{ $cart->id }}"><i class="fa fa-trash"></i></button>
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

@include('cart::carts.layouts.modal', [
    'modal'             => [
        'id'            => 'modal-cart-delete',
        'title'         => 'Delete Cart',
        'message'       => 'Are you sure to delete this cart!',
        'form'          => [
            'url'       => route('cart.delete', ':id'),
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
        let url_delete = $('#modal-cart-delete form').attr('action');
        $('.btn-delete').click(function() {
            let id = $(this).data('id');
            let url = url_delete.replace(':id', id)
            $('#modal-cart-delete form').attr('action', url);
            console.log(url)    // todo: remove
        })
        $('#modal-cart-delete').on('hide.bs.modal', function() {
            $('#modal-cart-delete form').attr('action', url_delete);
        })
    })
</script>
@endpush
