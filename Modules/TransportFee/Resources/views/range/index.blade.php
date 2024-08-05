@extends('transportfee::range.layouts.master')

@section('title-page', 'Transport Fee Area Case Range')

@section('small-info')
<small>List of transport fee cases ({{ $transport_fee_area_case_ranges->total() }})</small>
@endsection

@section('breakcumb')
<ol class="breadcrumb">
    <li><a href="{{ route('admin') }}"><i class="fa fa-dashboard"></i> Admin</a></li>
    <li><a href="{{ route('admin.transport_fee.index') }}">Transport Fee</a></li>
    <li><a href="{{ route('admin.transport_fee.area.index', $transport_fee_id) }}">Area</a></li>
    <li><a href="{{ route('admin.transport_fee.area.case.index', ['transport_fee_id' => $transport_fee_id, 'transport_fee_area_id' => $transport_fee_area_id]) }}">Case</a></li>
    <li><a href="{{ route('admin.transport_fee.area.case.range.index', ['transport_fee_id' => $transport_fee_id, 'transport_fee_area_id' => $transport_fee_area_id, 'transport_fee_area_case_id' => $transport_fee_area_case_id]) }}">Range</a></li>
    <li class="active">Index</li>
</ol>
@endsection

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="box box-primary">
            <div class="box-header with-border">
                <div class="box-title">List</div>
                <a href="{{ route('admin.transport_fee.area.case.range.create', ['transport_fee_id' => $transport_fee_id, 'transport_fee_area_id' => $transport_fee_area_id, 'transport_fee_area_case_id' => $transport_fee_area_case_id]) }}" class="btn btn-primary pull-right"><i class="fa fa-plus"></i> Add New</a>
            </div>
            <div class="box-body">
                <div class="table-header hidden">
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
                                <th>Range</th>
                                <th>Author</th>
                                <th>Created At</th>
                                <th>Updated At</th>
                                <th style="width: 175px">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($transport_fee_area_case_ranges as $key => $transport_fee_area_case_range)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $transport_fee_area_case_range->total_range }}</td>
                                    @if ($transport_fee_area_case_range->user)
                                    <td><a href="{{ route('admin.user.show', $transport_fee_area_case_range->user->id) }}">{{ $transport_fee_area_case_range->user->fullname }}</a></td>
                                    @else
                                    <td></td>
                                    @endif
                                    <td>{{ $transport_fee_area_case_range->created_at->format('H:i:s d/m/Y') }}</td>
                                    <td>{{ $transport_fee_area_case_range->updated_at->format('H:i:s d/m/Y') }}</td>
                                    <td>
                                        <a class="btn btn-primary" href="{{ route('admin.transport_fee.area.case.edit', ['transport_fee_id' => $transport_fee_id, 'transport_fee_area_id' => $transport_fee_area_id, 'id' => $transport_fee_area_case_range->id]) }}"><i class="fa fa-edit"></i> Edit</a>
                                        <button class="btn btn-danger btn-delete" data-toggle="modal" data-target="#modal-transport-fee-area-case-delete" data-id="{{ $transport_fee_area_case_range->id }}"><i class="fa fa-trash"></i> Delete</button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="table-footer mt-3">
                    <div class="row">
                        <div class="col-lg-12">
                            {{ $transport_fee_area_case_ranges->appends($_GET)->links('themes.adminlte.paginate') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@include('transportfee::range.layouts.modal', [
    'modal'             => [
        'id'            => 'modal-transport-fee-area-case-range-delete',
        'title'         => 'Delete Transport Fee Area Case Range',
        'message'       => 'Are you sure to delete this transport fee area case range!',
        'form'          => [
            'url'       => route('admin.transport_fee.area.case.range.delete', ['transport_fee_id' => $transport_fee_id, 'transport_fee_area_id' => $transport_fee_area_id, 'transport_fee_area_case_id' => $transport_fee_area_case_id, 'id' => ':id']),
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

        let url_delete = $('#modal-transport-fee-area-case-delete form').attr('action');
        $('.btn-delete').click(function() {
            let id = $(this).data('id');
            let url = url_delete.replace(':id', id)
            $('#modal-transport-fee-area-case-delete form').attr('action', url);
        })
        $('#modal-transport-fee-case-delete').on('hide.bs.modal', function() {
            $('#modal-transport-fee-area-case-delete form').attr('action', url_delete);
        })
    })
</script>
@endpush
