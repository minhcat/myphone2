@extends('transportfee::layouts.master')

@section('title-page', 'Transporter')

@section('small-info')
<small>List of transport fees ({{ $transport_fees->total() }})</small>
@endsection

@section('breakcumb')
<ol class="breadcrumb">
    <li><a href="{{ route('admin') }}"><i class="fa fa-dashboard"></i> Admin</a></li>
    <li><a href="{{ route('admin.transport_fee.index') }}">Transporter</a></li>
    <li class="active">Index</li>
</ol>
@endsection

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="box box-primary">
            <div class="box-header with-border">
                <div class="box-title">List</div>
                <a href="{{ route('admin.transport_fee.create') }}" class="btn btn-primary pull-right"><i class="fa fa-plus"></i> Add New</a>
            </div>
            <div class="box-body">
                <div class="table-header">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="filter">
                                <label for="search">
                                    Search:
                                    <input id="search" type="search" class="form-control input-sm" name="search" value="{{ request()->search }}" data-url="{{ route('admin.transport_fee.index') }}">
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
                                <th>Author</th>
                                <th>Area</th>
                                <th>Case</th>
                                <th>Total Range</th>
                                <th>Cost</th>
                                <th style="width: 175px">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($transport_fees as $key => $transport_fee)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td><a href="{{ route('admin.transport_fee.show', $transport_fee->id) }}">{{ $transport_fee->name }}</a></td>
                                    @if ($transport_fee->user)
                                    <td><a href="{{ route('admin.user.show', $transport_fee->user->id) }}">{{ $transport_fee->user->fullname }}</a></td>
                                    @else
                                    <td></td>
                                    @endif
                                    <td><a href="{{ route('admin.area.show', $transport_fee->area_id) }}">{{ $transport_fee->area->name }}</a></td>
                                    <td><a href="{{ route('admin.transporter.case.show', ['transporter_id' => $transport_fee->case->transporter_id, 'id' => $transport_fee->case->id]) }}">{{ $transport_fee->case->name }}</a></td>
                                    <td>{{ $transport_fee->total_range }}</td>
                                    <td>{{ number_format($transport_fee->cost) }}</td>
                                    <td>
                                        <a class="btn btn-primary" href="{{ route('admin.transport_fee.edit', $transport_fee->id) }}"><i class="fa fa-edit"></i> Edit</a>
                                        <button class="btn btn-danger btn-delete" data-toggle="modal" data-target="#modal-transport_fee-delete" data-id="{{ $transport_fee->id }}"><i class="fa fa-trash"></i> Delete</button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="table-footer mt-3">
                    <div class="row">
                        <div class="col-lg-12">
                            {{ $transport_fees->appends($_GET)->links('themes.adminlte.paginate') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@include('transportfee::layouts.modal', [
    'modal'             => [
        'id'            => 'modal-transport_fee-delete',
        'title'         => 'Delete Transporter',
        'message'       => 'Are you sure to delete this transport fee!',
        'form'          => [
            'url'       => route('admin.transport_fee.delete', ':id'),
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

        let url_delete = $('#modal-transport_fee-delete form').attr('action');
        $('.btn-delete').click(function() {
            let id = $(this).data('id');
            let url = url_delete.replace(':id', id)
            $('#modal-transport_fee-delete form').attr('action', url);
        })
        $('#modal-transport_fee-delete').on('hide.bs.modal', function() {
            $('#modal-transport_fee-delete form').attr('action', url_delete);
        })
    })
</script>
@endpush
