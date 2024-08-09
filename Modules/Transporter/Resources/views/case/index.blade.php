@extends('transporter::case.layouts.master')

@section('title-page', 'Transporter Case')

@section('small-info')
<small>List of transporter_cases ({{ $transporter_cases->total() }})</small>
@endsection

@section('breakcumb')
<ol class="breadcrumb">
    <li><a href="{{ route('admin') }}"><i class="fa fa-dashboard"></i> Admin</a></li>
    <li><a href="{{ route('admin.transporter.index') }}">Transporter</a></li>
    <li><a href="{{ route('admin.transporter.case.index', $transporter_id) }}">Case</a></li>
    <li class="active">Index</li>
</ol>
@endsection

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="box box-primary">
            <div class="box-header with-border">
                <div class="box-title">List</div>
                <a href="{{ route('admin.transporter.case.create', $transporter_id) }}" class="btn btn-primary pull-right"><i class="fa fa-plus"></i> Add New</a>
                <a href="{{ route('admin.transporter.index') }}" class="btn btn-default pull-right mr-1"><i class="fa fa-arrow-left"></i> Back</a>
            </div>
            <div class="box-body">
                <div class="table-header">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="filter">
                                <label for="search">
                                    Search:
                                    <input id="search" type="search" class="form-control input-sm" name="search" value="{{ request()->search }}" data-url="{{ route('admin.transporter.case.index', $transporter_id) }}">
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
                                <th>Estimate Time</th>
                                <th>Created At</th>
                                <th>Updated At</th>
                                <th style="width: 175px">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($transporter_cases as $key => $transporter_case)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td><a href="{{ route('admin.transporter.case.show', ['transporter_id' => $transporter_id, 'id' => $transporter_case->id]) }}">{{ $transporter_case->name }}</a></td>
                                    @if ($transporter_case->user)
                                    <td><a href="{{ route('admin.user.show', $transporter_case->user->id) }}">{{ $transporter_case->user->fullname }}</a></td>
                                    @else
                                    <td></td>
                                    @endif
                                    <td>{{ $transporter_case->estimate_time_text }}</td>
                                    <td>{{ $transporter_case->created_at->format('H:i:s d/m/Y') }}</td>
                                    <td>{{ $transporter_case->updated_at->format('H:i:s d/m/Y') }}</td>
                                    <td>
                                        <a class="btn btn-primary" href="{{ route('admin.transporter.case.edit', ['transporter_id' => $transporter_id, 'id' => $transporter_case->id]) }}"><i class="fa fa-edit"></i> Edit</a>
                                        <button class="btn btn-danger btn-delete" data-toggle="modal" data-target="#modal-transporter-case-delete" data-id="{{ $transporter_case->id }}"><i class="fa fa-trash"></i> Delete</button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="table-footer mt-3">
                    <div class="row">
                        <div class="col-lg-12">
                            {{ $transporter_cases->appends($_GET)->links('themes.adminlte.paginate') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@include('transporter::case.layouts.modal', [
    'modal'             => [
        'id'            => 'modal-transporter-case-delete',
        'title'         => 'Delete Transporter Case',
        'message'       => 'Are you sure to delete this transporter case!',
        'form'          => [
            'url'       => route('admin.transporter.case.delete', ['transporter_id' => $transporter_id, 'id' => ':id']),
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

        let url_delete = $('#modal-transporter-case-delete form').attr('action');
        $('.btn-delete').click(function() {
            let id = $(this).data('id');
            let url = url_delete.replace(':id', id)
            $('#modal-transporter-case-delete form').attr('action', url);
        })
        $('#modal-transporter-case-delete').on('hide.bs.modal', function() {
            $('#modal-transporter-case-delete form').attr('action', url_delete);
        })
    })
</script>
@endpush
