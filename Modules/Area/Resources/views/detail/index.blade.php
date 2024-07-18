@extends('area::detail.layouts.master')

@section('title-page', 'Area Detail')

@section('small-info')
<small>List of area details ({{ $area_details->total() }})</small>
@endsection

@section('breakcumb')
<ol class="breadcrumb">
    <li><a href="{{ route('admin') }}"><i class="fa fa-dashboard"></i> Admin</a></li>
    <li><a href="{{ route('admin.area.index') }}">Area</a></li>
    <li class="active">Index</li>
</ol>
@endsection

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="box box-primary">
            <div class="box-header with-border">
                <div class="box-title">List</div>
                <a href="{{ route('admin.area.detail.create', $area_id) }}" class="btn btn-primary pull-right"><i class="fa fa-plus"></i> Add New</a>
            </div>
            <div class="box-body">
                <div class="table-header">
                    <div class="row hidden">
                        <div class="col-lg-12">
                            <div class="filter">
                                <label for="search">
                                    Search:
                                    <input id="search" type="search" class="form-control input-sm" name="search" value="{{ request()->search }}" data-url="{{ route('admin.area.index') }}">
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
                                <th>Updated At</th>
                                <th style="width: 175px">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($area_details as $key => $detail)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    @if ($detail->territory_type === TerritoryType::CITY)
                                    <td><a href="{{ route('admin.city.show', $detail->territory_id) }}">{{ $detail->territory->name }}</a></td>
                                    @elseif ($detail->territory_type === TerritoryType::DISTRICT)
                                    <td><a href="{{ route('admin.city.district.show', ['city_id' => $detail->territory->city->id, 'id' => $detail->territory_id]) }}">{{ $detail->territory->name }}</a></td>
                                    @else
                                    <td><a href="{{ route('admin.city.district.ward.show', ['city_id' => $detail->territory->district->city->id, 'district_id' => $detail->territory->district->id, 'id' => $detail->territory_id]) }}">{{ $detail->territory->name }}</a></td>
                                    @endif
                                    @if ($detail->user)
                                    <td><a href="{{ route('admin.user.show', $detail->user->id) }}">{{ $detail->user->fullname }}</a></td>
                                    @else
                                    <td></td>
                                    @endif
                                    <td>{{ $detail->created_at->format('H:i:s d/m/Y') }}</td>
                                    <td>{{ $detail->updated_at->format('H:i:s d/m/Y') }}</td>
                                    <td>
                                        <a class="btn btn-primary" href="{{ route('admin.area.detail.edit', ['area_id' => $area_id, 'id' => $detail->id]) }}"><i class="fa fa-edit"></i> Edit</a>
                                        <button class="btn btn-danger btn-delete" data-toggle="modal" data-target="#modal-area-detail-delete" data-id="{{ $detail->id }}"><i class="fa fa-trash"></i> Delete</button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="table-footer mt-3">
                    <div class="row">
                        <div class="col-lg-12">
                            {{ $area_details->appends($_GET)->links('themes.adminlte.paginate') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@include('area::detail.layouts.modal', [
    'modal'             => [
        'id'            => 'modal-area-detail-delete',
        'title'         => 'Delete Area',
        'message'       => 'Are you sure to delete this area detail!',
        'form'          => [
            'url'       => route('admin.area.detail.delete', ['area_id' => $area_id, 'id' => ':id']),
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

        let url_delete = $('#modal-area-detail-delete form').attr('action');
        $('.btn-delete').click(function() {
            let id = $(this).data('id');
            let url = url_delete.replace(':id', id)
            $('#modal-area-detail-delete form').attr('action', url);
        })
        $('#modal-area-detail-delete').on('hide.bs.modal', function() {
            $('#modal-area-detail-delete form').attr('action', url_delete);
        })
    })
</script>
@endpush
