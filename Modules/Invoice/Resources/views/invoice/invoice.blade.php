@extends('invoice::invoice.layouts.master')

@section('title-page', 'Invoices')

@section('small-info')
<small>Invoice Detail (Invoice Type)</small>
@endsection

@section('breakcumb')
<ol class="breadcrumb">
    <li><a href="{{ route('admin') }}"><i class="fa fa-dashboard"></i> Admin</a></li>
    <li><a href="{{ route('admin.invoice.index') }}">Invoice</a></li>
    <li class="active">Detail</li>
</ol>
@endsection

@section('content')
<div class="row order-invoice">
    <div class="col-lg-12">
        <div class="box box-primary">
            <div class="box-header with-border">
                <div class="box-title">Detail</div>
            </div>
            <div class="box-body">
                <div class="row text-4">
                    <div class="col-lg-3">
                        <p class="px-2"><strong>Invoice {{ $invoice->code }}</strong></p>
                        <p class="px-2"><strong>Date Create:</strong> {{ $invoice->created_at->format('d/m/Y') }}</p>
                        <p class="px-2"><strong>Date Completed:</strong> {{ $invoice->created_at->format('d/m/Y') }}</p>
                        <p class="px-2"><strong>Note:</strong> {{ $invoice->note }}</p>
                    </div>
                    <div class="col-lg-3">
                        <p class="px-2"><strong>User:</strong> {{ $invoice->user->fullname }}</p>
                        <p class="px-2"><strong>Gender:</strong> {{ Gender::getName($invoice->user->gender) }}</p>
                        <p class="px-2"><strong>Phone:</strong> 0978.654.321</p>
                        <p class="px-2"><strong>Email:</strong> {{ $invoice->user->email }}</p>
                    </div>
                    <div class="col-lg-3">
                        <p class="px-2"><strong>Address:</strong> 125 Phạm Văn Đồng</p>
                        <p class="px-2"><strong>Ward:</strong> Hiệp Bình Chánh</p>
                        <p class="px-2"><strong>District:</strong> Thủ Đức</p>
                        <p class="px-2"><strong>City:</strong> Hồ Chí Minh</p>
                    </div>
                    <div class="col-lg-3">
                        <p class="px-2"><strong>Transporter:</strong> {{ $invoice->case->transporter->name }}</p>
                        <p class="px-2"><strong>Quality:</strong> Best - todo</p>
                        <p class="px-2"><strong>Shipping Option:</strong> {{ $invoice->case->name }}</p>
                        <p class="px-2"><strong>Payment Method:</strong> Cash on Delivery - todo</p>
                    </div>
                </div>
                <table class="table table-bordered table-striped mt-4">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Product Name</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Subtotal</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($invoice->details as $key => $detail)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $detail->target->name }}</td>
                            <td>{{ number_format($detail->price) }} vnđ</td>
                            <td>{{ $detail->quantity }}</td>
                            <td>{{ number_format($detail->quantity * $detail->price) }} vnđ</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="row mt-4 text-4 order-invoice-footer">
                    <div class="col-lg-4 col-lg-offset-8">
                        <table class="table">
                            <tr class="">
                                <td><strong>Subtotal:</strong></td>
                                <td>{{ number_format($invoice->subtotal) }}</td>
                            </tr>
                            <tr class="with-border-top">
                                <td><strong>Transport Fee:</strong></td>
                                <td>{{ number_format($invoice->transport_fee) }}</td>
                            </tr>
                            <tr class="with-border-top">
                                <td><strong>Discount:</strong></td>
                                <td>{{ number_format($invoice->discount) }}</td>
                            </tr>
                            <tr class="with-border-top">
                                <td><strong>Tax (10%):</strong></td>
                                <td>{{ number_format($invoice->tax) }}</td>
                            </tr>
                            <tr class="with-border-top">
                                <td><strong>Total:</strong></td>
                                <td>{{ number_format($invoice->total) }} (vnđ)</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
            <div class="box-footer">
                <a href="{{ route('admin.invoice.show', $invoice->id) }}" class="btn btn-default">Back</a>
            </div>
        </div>
    </div>
</div>
@endsection