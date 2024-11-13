@extends('city::district.layouts.master')

@section('title-page', 'District')

@section('small-info')
<small>List of districts ({{ $districts->total() }})</small>
@endsection

@section('breakcumb')
<ol class="breadcrumb">
    <li><a href="{{ route('admin') }}"><i class="fa fa-dashboard"></i> Admin</a></li>
    <li><a href="{{ route('admin.city.index') }}">City</a></li>
    <li><a href="{{ route('admin.city.district.index', $city_id) }}">District</a></li>
    <li class="active">Index</li>
</ol>
@endsection

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="box box-primary">
            <div class="box-header with-border">
                <div class="box-title">List</div>
                @can('district:add')
                <a href="{{ route('admin.city.district.create', $city_id) }}" class="btn btn-primary pull-right"><i class="fa fa-plus"></i> Add New</a>
                @endcan
                <a href="{{ route('admin.city.index') }}" class="btn btn-default pull-right mr-1"><i class="fa fa-arrow-left"></i> Back</a>
            </div>
            <div class="box-body">
                <div class="table-header">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="filter">
                                <label for="search">
                                    Search:
                                    <input id="search" type="search" class="form-control input-sm" name="search" value="{{ request()->search }}" data-url="{{ route('admin.city.district.index', $city_id) }}">
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
                                <th>Author</th>
                                @can('ward:browse')
                                <th>Wards</th>
                                @endcan
                                <th>Created At</th>
                                <th>Updated At</th>
                                @canany(['district:edit', 'district:delete'])
                                <th style="width: 1px">Action</th>
                                @endcanany
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($districts as $key => $district)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    @can('district:read')
                                    <td><a href="{{ route('admin.city.district.show', ['city_id' => $city_id, 'id' => $district->id]) }}">{{ $district->name }}</a></td>
                                    @else
                                    <td>{{ $district->name }}</td>
                                    @endcan
                                    @if ($district->user)
                                    @can('user:read')
                                    <td><a href="{{ route('admin.user.show', $district->user->id) }}">{{ $district->user->account }}</a></td>
                                    @else
                                    <td>{{ $district->user->account }}</td>
                                    @endcan
                                    @else
                                    <td></td>
                                    @endif
                                    @can('ward:browse')
                                    <td><a href="{{ route('admin.city.district.ward.index', ['city_id' => $city_id, 'district_id' => $district->id]) }}">list</a></td>
                                    @endcan
                                    <td>{{ $district->created_at->format('H:i:s d/m/Y') }}</td>
                                    <td>{{ $district->updated_at->format('H:i:s d/m/Y') }}</td>
                                    @canany(['district:edit', 'district:delete'])
                                    <td class="nowrap">
                                        @can('district:edit')
                                        <a class="btn btn-primary" href="{{ route('admin.city.district.edit', ['city_id' => $city_id, 'id' => $district->id]) }}"><i class="fa fa-edit"></i> Edit</a>
                                        @endcan
                                        @can('district:delete')
                                        <button class="btn btn-danger btn-delete" data-toggle="modal" data-target="#modal-district-delete" data-id="{{ $district->id }}"><i class="fa fa-trash"></i> Delete</button>
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
                            {{ $districts->appends($_GET)->links('themes.adminlte.paginate') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@include('city::district.layouts.modal', [
    'modal'             => [
        'id'            => 'modal-district-delete',
        'title'         => 'Delete District',
        'message'       => 'Are you sure to delete this district!',
        'form'          => [
            'url'       => route('admin.city.district.delete', ['city_id' => $city_id, 'id' => ':id']),
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

        let url_delete = $('#modal-district-delete form').attr('action');
        $('.btn-delete').click(function() {
            let id = $(this).data('id');
            let url = url_delete.replace(':id', id)
            $('#modal-district-delete form').attr('action', url);
        })
        $('#modal-district-delete').on('hide.bs.modal', function() {
            $('#modal-district-delete form').attr('action', url_delete);
        })
    })
</script>
@endpush
