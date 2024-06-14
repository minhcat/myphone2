@extends('invoice::invoice.layouts.master')

@section('title-page', 'Invoice')

@section('small-info')
<small>List of invoices ({{ $invoices->total() }})</small>
@endsection

@section('breakcumb')
<ol class="breadcrumb">
    <li><a href="{{ route('admin') }}"><i class="fa fa-dashboard"></i> Admin</a></li>
    <li><a href="{{ route('invoice.index') }}">Invoice</a></li>
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
                                    <input id="search" type="search" class="form-control input-sm" name="search" value="{{ request()->search }}" data-url="{{ route('invoice.index') }}">
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
                                <th>Code</th>
                                <th>Author</th>
                                <th>Detail</th>
                                <th>Quantity</th>
                                <th>Subtotal</th>
                                <th>Transport Fee</th>
                                <th>Discount</th>
                                <th>Tax</th>
                                <th>Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($invoices as $invoice)
                                <tr>
                                    <td>{{ $invoice->id }}</td>
                                    <td><a href="{{ route('invoice.show', $invoice->id) }}">{{ $invoice->code }}</a></td>
                                    <td>@if (!is_null($invoice->user)) <a href="{{ route('user.show', $invoice->user->id) }}">{{ $invoice->user->fullname }}</a>@endif</td>
                                    <td><a href="{{ route('invoice.detail.index', $invoice->id) }}">Detail</a></td>
                                    <td>{{ $invoice->quantity }}</td>
                                    <td>{{ number_format($invoice->subtotal) }}</td>
                                    <td>{{ number_format($invoice->transport_fee) }}</td>
                                    <td>{{ number_format($invoice->discount) }}</td>
                                    <td>{{ number_format($invoice->tax) }}</td>
                                    <td>{{ number_format($invoice->total) }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="table-footer mt-3">
                    <div class="row">
                        <div class="col-lg-12">
                            {{ $invoices->appends($_GET)->links('themes.adminlte.paginate') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
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
    })
</script>
@endpush
