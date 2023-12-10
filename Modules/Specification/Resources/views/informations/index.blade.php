@extends('specification::informations.layouts.master')

@section('title-page', 'Informations')

@section('small-info')
<small>List of Informations ({{ $informations->total() }})</small>
@endsection

@section('breakcumb')
<ol class="breadcrumb">
    <li><a href="{{ route('admin') }}"><i class="fa fa-dashboard"></i> Admin</a></li>
    <li><a href="{{ route('specification.index') }}">Specification</a></li>
    <li><a href="{{ route('specification.information.index', $specification_id) }}">Information</a></li>
    <li class="active">Index</li>
</ol>
@endsection

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="box box-primary">
            <div class="box-header with-border">
                <div class="box-title">List</div>
                <a href="{{ route('specification.information.create', $specification_id) }}" class="btn btn-primary pull-right">New Information</a>
            </div>
            <div class="box-body">
                <div class="table-header">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="filter">
                                <label for="search">
                                    Search:
                                    <input id="search" type="search" class="form-control input-sm" name="search" value="{{ request()->search }}" data-url="{{ route('specification.information.index', $specification_id) }}">
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
                                <th>Created At</th>
                                <th style="width: 100px">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($informations as $information)
                                <tr>
                                    <td>{{ $information->id }}</td>
                                    <td><a href="{{ route('specification.information.show', ['specification_id' => $specification_id, 'id' => $information->id]) }}">{{ $information->value }}</a></td>
                                    @if ($information->user)
                                    <td><a href="{{ route('user.show', $information->user->id) }}">{{ $information->user->fullname }}</a></td>
                                    @else
                                    <td></td>
                                    @endif
                                    <td>{{ $information->created_at->format('H:i:s d/m/Y') }}</td>
                                    <td>
                                        <a class="btn btn-icon btn-primary" href="{{ route('specification.information.edit', ['specification_id' => $specification_id, 'id' => $information->id]) }}"><i class="fa fa-edit"></i></a>
                                        <button class="btn btn-icon btn-danger btn-delete" data-toggle="modal" data-target="#modal-information-delete" data-id="{{ $information->id }}"><i class="fa fa-trash"></i></button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="table-footer mt-3">
                    <div class="row">
                        <div class="col-lg-12">
                            {{ $informations->appends($_GET)->links('themes.adminlte.paginate') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@include('specification::informations.layouts.modal', [
    'modal'             => [
        'id'            => 'modal-information-delete',
        'title'         => 'Delete Specification',
        'message'       => 'Are you sure to delete this information!',
        'form'          => [
            'url'       => route('specification.information.delete', [
                'specification_id'  => $specification_id,
                'id'                => ':id'
            ]),
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
        let url_delete = $('#modal-information-delete form').attr('action');
        $('.btn-delete').click(function() {
            let id = $(this).data('id');
            let url = url_delete.replace(':id', id)
            $('#modal-information-delete form').attr('action', url);
            console.log(url)    // todo: remove
        })
        $('#modal-information-delete').on('hide.bs.modal', function() {
            $('#modal-information-delete form').attr('action', url_delete);
        })
    })
</script>
@endpush

