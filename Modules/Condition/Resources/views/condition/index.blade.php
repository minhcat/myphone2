@extends('condition::condition.layouts.master')

@section('title-page', 'Condition')

@section('small-info')
<small>List of conditions ({{ $conditions->total() }})</small>
@endsection

@section('breakcumb')
<ol class="breadcrumb">
    <li><a href="{{ route('admin') }}"><i class="fa fa-dashboard"></i> Admin</a></li>
    <li><a href="{{ route('condition.index') }}">Condition</a></li>
    <li class="active">Index</li>
</ol>
@endsection

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="box box-primary">
            <div class="box-header with-border">
                <div class="box-title">List</div>
                <a href="{{ route('condition.create') }}" class="btn btn-primary pull-right"><i class="fa fa-plus"></i> Add New</a>
            </div>
            <div class="box-body">
                <div class="table-header">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="filter">
                                <label for="search">
                                    Search:
                                    <input id="search" type="search" class="form-control input-sm" name="search" value="{{ request()->search }}" data-url="{{ route('condition.index') }}">
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
                                <th>Type</th>
                                <th>Value</th>
                                <th>Sale List</th>
                                <th>Created At</th>
                                <th>Updated At</th>
                                <th style="width: 175px">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($conditions as $condition)
                                <tr>
                                    <td>{{ $condition->id }}</td>
                                    <td><a href="{{ route('condition.show', $condition->id) }}">{{ $condition->name }}</a></td>
                                    <td>@if (!is_null($condition->user)) <a href="{{ route('user.show', $condition->user->id) }}">{{ $condition->user->fullname }}</a>@endif</td>
                                    <td>{!! generate_label($condition->type, new App\Enums\ConditionType) !!}</td>
                                    <td>{{ is_null($condition->value) ? 'null' : $condition->value }}</td>
                                    <td>
                                        @if ($condition->type == App\Enums\ConditionType::PRODUCT 
                                        || $condition->type == App\Enums\ConditionType::PRODUCT_GROUP
                                        || $condition->type == App\Enums\ConditionType::CATEGORY
                                        || $condition->type == App\Enums\ConditionType::TAG) 
                                        <a href="{{ route('condition.target.index', $condition->id) }}">list</a> 
                                        @endif
                                    </td>
                                    <td>{{ $condition->created_at->format('H:i:s d/m/Y') }}</td>
                                    <td>{{ $condition->updated_at->format('H:i:s d/m/Y') }}</td>
                                    <td>
                                        <a class="btn btn-primary" href="{{ route('condition.edit', $condition->id) }}"><i class="fa fa-edit"></i> Edit</a>
                                        <button class="btn btn-danger btn-delete" data-toggle="modal" data-target="#modal-condition-delete" data-id="{{ $condition->id }}"><i class="fa fa-trash"></i> Delete</button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="table-footer mt-3">
                    <div class="row">
                        <div class="col-lg-12">
                            {{ $conditions->appends($_GET)->links('themes.adminlte.paginate') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@include('condition::condition.layouts.modal', [
    'modal'             => [
        'id'            => 'modal-condition-delete',
        'title'         => 'Delete Condition',
        'message'       => 'Are you sure to delete this condition!',
        'form'          => [
            'url'       => route('condition.delete', ':id'),
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
        let url_delete = $('#modal-condition-delete form').attr('action');
        $('.btn-delete').click(function() {
            let id = $(this).data('id');
            let url = url_delete.replace(':id', id)
            $('#modal-condition-delete form').attr('action', url);
        })
        $('#modal-condition-delete').on('hide.bs.modal', function() {
            $('#modal-condition-delete form').attr('action', url_delete);
        })
    })
</script>
@endpush

