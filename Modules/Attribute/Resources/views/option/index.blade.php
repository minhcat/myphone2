@extends('attribute::option.layouts.master')

@section('title-page', 'Option')

@section('small-info')
<small>List of options ({{ $options->total() }})</small>
@endsection

@section('breakcumb')
<ol class="breadcrumb">
    <li><a href="{{ route('admin') }}"><i class="fa fa-dashboard"></i> Admin</a></li>
    <li><a href="{{ route('admin.attribute.index') }}">Attribute</a></li>
    <li><a href="{{ route('admin.attribute.option.index', $attribute_id) }}">Option</a></li>
    <li class="active">Index</li>
</ol>
@endsection

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="box box-primary box-main">
            <div class="box-header with-border">
                <div class="box-title">List</div>
                @can('attribute_option:add')
                <a href="{{ route('admin.attribute.option.create', $attribute_id) }}" class="btn btn-primary pull-right"><i class="fa fa-plus"></i> Add New</a>
                @endcan
                <a href="{{ route('admin.attribute.index') }}" class="btn btn-default pull-right mr-1"><i class="fa fa-arrow-left"></i> Back</a>
            </div>
            <div class="box-body">
                <div class="table-header">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="filter">
                                <label for="search">
                                    Search:
                                    <input id="search" type="search" class="form-control input-sm" name="search" value="{{ request()->search }}" data-url="{{ route('admin.attribute.option.index', $attribute_id) }}">
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
                                <th>Value</th>
                                <th>Author</th>
                                <th>Created At</th>
                                <th>Updated At</th>
                                @canany(['attribute_option:edit', 'attribute_option:delete'])
                                <th style="width: 1px">Action</th>
                                @endcanany
                            </tr>
                        </thead>
                        <tbody class="tbody-loading">
                            <tr>
                                <td colspan="10"><i class="fa fa-spin fa-spinner fa-lg"></i></td>
                            </tr>
                        </tbody>
                        <tbody class="tbody-data hidden">
                            @foreach ($options as $key => $option)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    @can('attribute_option:read')
                                    <td><a href="{{ route('admin.attribute.option.show', ['attribute_id' => $attribute_id, 'id' => $option->id]) }}">{{ $option->value }}</a></td>
                                    @else
                                    <td>{{ $option->value }}</td>
                                    @endcan
                                    @if ($option->user)
                                    @can('user:read')
                                    <td><a href="{{ route('admin.user.show', $option->user->id) }}">{{ $option->user->account }}</a></td>
                                    @else
                                    <td>{{ $option->user->account }}</td>
                                    @endcan
                                    @else
                                    <td></td>
                                    @endif
                                    <td>{{ $option->created_at->format('H:i:s d/m/Y') }}</td>
                                    <td>{{ $option->updated_at->format('H:i:s d/m/Y') }}</td>
                                    @canany(['attribute_option:edit', 'attribute_option:delete'])
                                    <td class="nowrap">
                                        @can('attribute_option:edit')
                                        <a class="btn btn-primary" href="{{ route('admin.attribute.option.edit', ['attribute_id' => $attribute_id, 'id' => $option->id]) }}"><i class="fa fa-edit"></i> Edit</a>
                                        @endcan
                                        @can('attribute_option:delete')
                                        <button class="btn btn-danger btn-delete" data-toggle="modal" data-target="#modal-option-delete" data-id="{{ $option->id }}"><i class="fa fa-trash"></i> Delete</button>
                                        @endcan
                                    </td>
                                    @endcanany
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="table-footer mt-3">
                    <div class="row">
                        <div class="col-lg-12">
                            {{ $options->appends($_GET)->links(get_admin_theme_extend($admin_active_theme, 'paginate')) }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@include('attribute::option.layouts.modal', [
    'modal'             => [
        'id'            => 'modal-option-delete',
        'title'         => 'Delete Option',
        'message'       => 'Are you sure to delete this option!',
        'form'          => [
            'url'       => route('admin.attribute.option.delete', ['attribute_id' => $attribute_id, 'id' => ':id']),
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

        let url_delete = $('#modal-option-delete form').attr('action');
        $('.btn-delete').click(function() {
            let id = $(this).data('id');
            let url = url_delete.replace(':id', id)
            $('#modal-option-delete form').attr('action', url);
        })
        $('#modal-option-delete').on('hide.bs.modal', function() {
            $('#modal-option-delete form').attr('action', url_delete);
        })

        $('.box-main table .tbody-loading').addClass('hidden')
        $('.box-main table .tbody-data').removeClass('hidden')
    })
</script>
@endpush

