@extends('config::layouts.master')

@section('title-page', 'Config')

@section('small-info')
<small>List of configs ({{ $configs->total() }})</small>
@endsection

@section('breakcumb')
<ol class="breadcrumb">
    <li><a href="{{ route('admin') }}"><i class="fa fa-dashboard"></i> Admin</a></li>
    <li><a href="{{ route('admin.config.index') }}">Config</a></li>
    <li class="active">Index</li>
</ol>
@endsection

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="box box-primary box-main">
            <div class="box-header with-border">
                <div class="box-title">List</div>
                @can('config:add')
                <a href="{{ route('admin.config.create') }}" class="btn btn-primary pull-right"><i class="fa fa-plus"></i> Add New</a>
                @endcan
            </div>
            <div class="box-body">
                <div class="table-header">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="filter" style="text-align: left">
                                <label for="search">
                                    Search:
                                    <input id="search" type="search" class="form-control input-sm" name="search" value="{{ request()->search }}" data-url="{{ route('admin.config.index') }}">
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
                                <th>Name</th>
                                <th>Type</th>
                                <th>Value</th>
                                <th>Default</th>
                                <th>Group</th>
                                <th>Author</th>
                                <th>Create At</th>
                                <th>Updated At</th>
                                @canany(['config:edit', 'config:delete'])
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
                            @foreach($configs as $key => $config)                                
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    @can('config:read')
                                    <td><a href="{{ route('admin.config.show', $config->id) }}">{{ $config->name }}</a></td>
                                    @else
                                    <td>{{ $config->name }}</td>
                                    @endcan
                                    <td>{{ $config->type }}</td>
                                    <td>{{ $config->value }}</td>
                                    <td>{{ $config->default }}</td>
                                    <td>{{ $config->group }}</td>
                                    @if ($config->user)
                                    @can('user:read')
                                    <td><a href="{{ route('admin.user.show', $config->user->id) }}">{{ $config->user->account }}</a></td>
                                    @else
                                    <td>{{ $config->user->account }}</td>
                                    @endcan
                                    @else
                                    <td></td>
                                    @endif
                                    <td>{{ $config->created_at->format('H:i:s d/m/Y') }}</td>
                                    <td>{{ $config->updated_at->format('H:i:s d/m/Y') }}</td>
                                    @canany(['config:edit', 'config:delete'])
                                    <td class="nowrap">
                                        @can('config:edit')
                                        <form action="{{ route('admin.config.reset', $config->id) }}" method="POST" class="hidden">
                                            @method('put')
                                            @csrf
                                        </form>
                                        <button class="btn btn-success btn-reset"><i class="fa fa-rotate-left"></i> Reset</button>
                                        <a class="btn btn-primary" href="{{ route('admin.config.edit', $config->id) }}"><i class="fa fa-edit"></i> Edit</a>
                                        @endcan
                                        @can('config:delete')
                                        <button class="btn btn-danger btn-delete" data-toggle="modal" data-target="#modal-config-delete" data-id="{{ $config->id }}"><i class="fa fa-trash"></i> Delete</button>
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
                            {{ $configs->appends($_GET)->links(get_admin_theme_extend($admin_active_theme, 'paginate')) }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@include('config::layouts.modal', [
    'modal'             => [
        'id'            => 'modal-config-delete',
        'title'         => 'Delete Config',
        'message'       => 'Are you sure to delete this config!',
        'form'          => [
            'url'       => route('admin.config.delete', ':id'),
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

        let url_delete = $('#modal-config-delete form').attr('action');
        $('.btn-delete').click(function() {
            let id = $(this).data('id');
            let url = url_delete.replace(':id', id)
            $('#modal-config-delete form').attr('action', url);
        })
        $('#modal-config-delete').on('hide.bs.modal', function() {
            $('#modal-config-delete form').attr('action', url_delete);
        })
        $('.btn-reset').on('click', function() {
            $(this).parent().find('form').submit()
        })

        $('.box-main table .tbody-loading').addClass('hidden')
        $('.box-main table .tbody-data').removeClass('hidden')
    })
</script>
@endpush
