@extends('transporter::transporter.layouts.master')

@section('title-page', 'Transporter')

@section('small-info')
<small>List of transporters ({{ $transporters->total() }})</small>
@endsection

@section('breakcumb')
<ol class="breadcrumb">
    <li><a href="{{ route('admin') }}"><i class="fa fa-dashboard"></i> Admin</a></li>
    <li><a href="{{ route('admin.transporter.index') }}">Transporter</a></li>
    <li class="active">Index</li>
</ol>
@endsection

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="box box-primary">
            <div class="box-header with-border">
                <div class="box-title">List</div>
                <a href="{{ route('admin.transporter.create') }}" class="btn btn-primary pull-right"><i class="fa fa-plus"></i> Add New</a>
            </div>
            <div class="box-body">
                <div class="table-header">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="filter">
                                <label for="search">
                                    Search:
                                    <input id="search" type="search" class="form-control input-sm" name="search" value="{{ request()->search }}" data-url="{{ route('admin.transporter.index') }}">
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
                                <th>Cases</th>
                                <th>Created At</th>
                                <th>Updated At</th>
                                <th style="width: 175px">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($transporters as $key => $transporter)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td><a href="{{ route('admin.transporter.show', $transporter->id) }}">{{ $transporter->name }}</a></td>
                                    @if ($transporter->user)
                                    <td><a href="{{ route('admin.user.show', $transporter->user->id) }}">{{ $transporter->user->fullname }}</a></td>
                                    @else
                                    <td></td>
                                    @endif
                                    <td><a href="">list</a></td>
                                    <td>{{ $transporter->created_at->format('H:i:s d/m/Y') }}</td>
                                    <td>{{ $transporter->updated_at->format('H:i:s d/m/Y') }}</td>
                                    <td>
                                        <a class="btn btn-primary" href="{{ route('admin.transporter.edit', $transporter->id) }}"><i class="fa fa-edit"></i> Edit</a>
                                        <button class="btn btn-danger btn-delete" data-toggle="modal" data-target="#modal-transporter-delete" data-id="{{ $transporter->id }}"><i class="fa fa-trash"></i> Delete</button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="table-footer mt-3">
                    <div class="row">
                        <div class="col-lg-12">
                            {{ $transporters->appends($_GET)->links('themes.adminlte.paginate') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@include('transporter::transporter.layouts.modal', [
    'modal'             => [
        'id'            => 'modal-transporter-delete',
        'title'         => 'Delete Transporter',
        'message'       => 'Are you sure to delete this transporter!',
        'form'          => [
            'url'       => route('admin.transporter.delete', ':id'),
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

        let url_delete = $('#modal-transporter-delete form').attr('action');
        $('.btn-delete').click(function() {
            let id = $(this).data('id');
            let url = url_delete.replace(':id', id)
            $('#modal-transporter-delete form').attr('action', url);
        })
        $('#modal-transporter-delete').on('hide.bs.modal', function() {
            $('#modal-transporter-delete form').attr('action', url_delete);
        })
    })
</script>
@endpush
