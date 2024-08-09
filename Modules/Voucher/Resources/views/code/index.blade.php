@extends('voucher::code.layouts.master')

@section('title-page', 'Voucher Codes')

@section('small-info')
<small>List of voucher code ({{ $voucher_codes->total() }})</small>
@endsection

@section('breakcumb')
<ol class="breadcrumb">
    <li><a href="{{ route('admin') }}"><i class="fa fa-dashboard"></i> Admin</a></li>
    <li><a href="{{ route('admin.voucher.index') }}">Voucher</a></li>
    <li><a href="{{ route('admin.voucher.code.index', $voucher_id) }}">Code</a></li>
    <li class="active">Index</li>
</ol>
@endsection

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="box box-primary">
            <div class="box-header with-border">
                <div class="box-title">List</div>
                <a href="{{ route('admin.voucher.code.create', $voucher_id) }}" class="btn btn-primary pull-right"><i class="fa fa-plus"></i> Add New</a>
                <a href="{{ route('admin.voucher.index') }}" class="btn btn-default pull-right mr-1"><i class="fa fa-arrow-left"></i> Back</a>
            </div>
            <div class="box-body">
                <div class="table-body">
                    <table class="table table-bordered table-striped mt-3">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Code</th>
                                <th>Discount Type</th>
                                <th>Discount Value</th>
                                <th>Discount Minimum</th>
                                <th>Discount Maximum</th>
                                <th style="width: 175px">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($voucher_codes as $key => $voucher_code)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td><a href="{{ route('admin.voucher.code.show', ['voucher_id' => $voucher_id, 'id' => $voucher_code->id]) }}">{{ $voucher_code->code }}</a></td>
                                    <td>{!! generate_label($voucher_code->discount_type_show, new DiscountType) !!}</td>
                                    <td>{{ number_format($voucher_code->discount_value_show) }}</td>
                                    <td>{{ $voucher_code->discount_minimum_show }}</td>
                                    <td>{{ $voucher_code->discount_maximum_show }}</td>
                                    <td style="text-align: right">
                                        <a class="btn btn-primary" href="{{ route('admin.voucher.code.edit', ['voucher_id' => $voucher_id, 'id' => $voucher_code->id]) }}"><i class="fa fa-edit"></i> Edit</a>
                                        <button class="btn btn-danger btn-delete" data-toggle="modal" data-target="#modal-voucher-code-delete" data-id="{{ $voucher_code->id }}"><i class="fa fa-trash"></i> Delete</button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="table-footer mt-3">
                    <div class="row">
                        <div class="col-lg-12">
                            {{ $voucher_codes->appends($_GET)->links('themes.adminlte.paginate') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@include('voucher::voucher.layouts.modal', [
    'modal'             => [
        'id'            => 'modal-voucher-code-delete',
        'title'         => 'Delete Voucher Code',
        'message'       => 'Are you sure to delete this voucher code!',
        'form'          => [
            'url'       => route('admin.voucher.code.delete', ['voucher_id' => $voucher_id, 'id' => ':id']),
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

        let url_delete = $('#modal-voucher-code-delete form').attr('action');
        $('.btn-delete').click(function() {
            let id = $(this).data('id');
            let url = url_delete.replace(':id', id)
            $('#modal-voucher-code-delete form').attr('action', url);
        })
        $('#modal-voucher-delete').on('hide.bs.modal', function() {
            $('#modal-voucher-code-delete form').attr('action', url_delete);
        })
    })
</script>
@endpush
