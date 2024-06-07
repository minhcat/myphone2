@extends('condition::target.layouts.master')

@section('title-page', 'Condition Target')

@section('small-info')
<small>List of condition targets ({{ $targets->total() }})</small>
@endsection

@section('breakcumb')
<ol class="breadcrumb">
    <li><a href="{{ route('admin') }}"><i class="fa fa-dashboard"></i> Admin</a></li>
    <li><a href="{{ route('condition.index') }}">Condition</a></li>
    <li><a href="{{ route('condition.target.index', $condition_id) }}">Target</a></li>
    <li class="active">Index</li>
</ol>
@endsection

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="box box-primary">
            <div class="box-header with-border">
                <div class="box-title">List</div>
                <a href="{{ route('condition.target.create', $condition_id) }}" class="btn btn-primary pull-right"><i class="fa fa-plus"></i> Add New</a>
            </div>
            <div class="box-body">
                <div class="table-header">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="filter">
                                <label for="search">
                                    Search:
                                    <input id="search" type="search" class="form-control input-sm" name="search" value="{{ request()->search }}" data-url="{{ route('condition.target.index', $condition_id) }}">
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
                                <th>Type</th>
                                <th>Parent</th>
                                <th>Target</th>
                                <th style="width: 175px">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($targets as $target)
                                <tr>
                                    <td>{{ $target->id }}</td>
                                    <td><a href="{{ route('condition.target.show', ['condition_id' => $condition_id, 'id' => $target->id]) }}">{{ $target->code }}</a></td>
                                    <td>{!! generate_label($target->target_type, new App\Enums\ConditionTargetType) !!}</td>
                                    @if ($target->parent_id !== null)
                                        <td><a href="{{ route('condition.target.show', ['condition_id' => $condition_id, 'id' => $target->parent_id]) }}">{{ optional($target->parent)->code }}</a></td>
                                    @else
                                        <td></td>
                                    @endif
                                    <td><a href="#">{{ optional($target->target)->name }}</a></td>
                                    <td>
                                        <a class="btn btn-primary" href="{{ route('condition.target.edit', ['condition_id' => $condition_id, 'id' => $target->id]) }}"><i class="fa fa-edit"></i> Edit</a>
                                        <button class="btn btn-danger btn-delete" data-toggle="modal" data-target="#modal-condition-target-delete" data-id="{{ $target->id }}"><i class="fa fa-trash"></i> Delete</button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="table-footer mt-3">
                    <div class="row">
                        <div class="col-lg-12">
                            {{ $targets->appends($_GET)->links('themes.adminlte.paginate') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@include('condition::target.layouts.modal', [
    'modal'             => [
        'id'            => 'modal-condition-target-delete',
        'title'         => 'Delete Condition Target',
        'message'       => 'Are you sure to delete this condition target!',
        'form'          => [
            'url'       => route('condition.target.delete', ['condition_id' => $condition_id, 'id' => ':id']),
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
        let url_delete = $('#modal-condition-target-delete form').attr('action');
        $('.btn-delete').click(function() {
            debugger
            let id = $(this).data('id');
            let url = url_delete.replace(':id', id)
            $('#modal-condition-target-delete form').attr('action', url);
        })
        $('#modal-condition-target-delete').on('hide.bs.modal', function() {
            $('#modal-condition-target-delete form').attr('action', url_delete);
        })
    })
</script>
@endpush

