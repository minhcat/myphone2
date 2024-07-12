@extends('city::ward.layouts.master')

@section('title-page', 'Ward')

@section('small-info')
<small>List of wards ({{ $wards->total() }})</small>
@endsection

@section('breakcumb')
<ol class="breadcrumb">
    <li><a href="{{ route('admin') }}"><i class="fa fa-dashboard"></i> Admin</a></li>
    <li><a href="{{ route('admin.city.index') }}">City</a></li>
    <li><a href="{{ route('admin.city.district.index', $city_id) }}">District</a></li>
    <li><a href="{{ route('admin.city.district.ward.index', ['city_id' => $city_id, 'district_id' => $district_id]) }}">Ward</a></li>
    <li class="active">Index</li>
</ol>
@endsection

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="box box-primary">
            <div class="box-header with-border">
                <div class="box-title">List</div>
                <a href="{{ route('admin.city.district.ward.create', ['city_id' => $city_id, 'district_id' => $district_id]) }}" class="btn btn-primary pull-right"><i class="fa fa-plus"></i> Add New</a>
            </div>
            <div class="box-body">
                <div class="table-header">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="filter">
                                <label for="search">
                                    Search:
                                    <input id="search" type="search" class="form-control input-sm" name="search" value="{{ request()->search }}" data-url="{{ route('admin.city.district.ward.index', ['city_id' => $city_id, 'district_id' => $district_id]) }}">
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
                                <th>List</th>
                                <th>Created At</th>
                                <th>Updated At</th>
                                <th style="width: 175px">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($wards as $key => $ward)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td><a href="{{ route('admin.city.district.ward.show', ['city_id' => $city_id, 'district_id' => $district_id, 'id' => $ward->id]) }}">{{ $ward->name }}</a></td>
                                    @if ($ward->user)
                                    <td><a href="{{ route('admin.user.show', $ward->user->id) }}">{{ $ward->user->fullname }}</a></td>
                                    @else
                                    <td></td>
                                    @endif
                                    <td><a href="">list</a></td>
                                    <td>{{ $ward->created_at->format('H:i:s d/m/Y') }}</td>
                                    <td>{{ $ward->updated_at->format('H:i:s d/m/Y') }}</td>
                                    <td>
                                        <a class="btn btn-primary" href="{{ route('admin.city.district.ward.edit', ['city_id' => $city_id, 'district_id' => $district_id, 'id' => $ward->id]) }}"><i class="fa fa-edit"></i> Edit</a>
                                        <button class="btn btn-danger btn-delete" data-toggle="modal" data-target="#modal-ward-delete" data-id="{{ $ward->id }}"><i class="fa fa-trash"></i> Delete</button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="table-footer mt-3">
                    <div class="row">
                        <div class="col-lg-12">
                            {{ $wards->appends($_GET)->links('themes.adminlte.paginate') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@include('city::ward.layouts.modal', [
    'modal'             => [
        'id'            => 'modal-ward-delete',
        'title'         => 'Delete Ward',
        'message'       => 'Are you sure to delete this ward!',
        'form'          => [
            'url'       => route('admin.city.district.ward.delete', ['city_id' => $city_id, 'district_id' => $district_id, 'id' => ':id']),
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

        let url_delete = $('#modal-ward-delete form').attr('action');
        $('.btn-delete').click(function() {
            let id = $(this).data('id');
            let url = url_delete.replace(':id', id)
            $('#modal-ward-delete form').attr('action', url);
        })
        $('#modal-ward-delete').on('hide.bs.modal', function() {
            $('#modal-ward-delete form').attr('action', url_delete);
        })
    })
</script>
@endpush
