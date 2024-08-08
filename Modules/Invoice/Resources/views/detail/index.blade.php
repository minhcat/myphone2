@extends('invoice::invoice.layouts.master')

@section('title-page', 'Invoice Detail')

@section('small-info')
<small>List of invoice details ({{ $details->total() }})</small>
@endsection

@section('breakcumb')
<ol class="breadcrumb">
    <li><a href="{{ route('admin') }}"><i class="fa fa-dashboard"></i> Admin</a></li>
    <li><a href="{{ route('admin.invoice.index') }}">Invoice</a></li>
    <li><a href="{{ route('admin.invoice.detail.index', $invoice_id) }}">Detail</a></li>
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
                <div class="table-body">
                    <table class="table table-bordered table-striped table-fix mt-3">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Product</th>
                                <th>Quantity</th>
                                <th>Price</th>
                                <th>Total</th>
                                <th>Author</th>
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
                                    @if ($detail->user)
                                    <td><a href="{{ route('admin.user.show', $detail->user->id) }}">{{ $detail->user->fullname }}</a></td>
                                    @else
                                    <td></td>
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
@endsection
