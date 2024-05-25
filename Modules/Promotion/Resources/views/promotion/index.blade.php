@extends('promotion::promotion.layouts.master')

@section('title-page', 'Promotion')

@section('small-info')
<small>List of promotions ({{ $promotions->total() }})</small>
@endsection

@section('breakcumb')
<ol class="breadcrumb">
    <li><a href="{{ route('admin') }}"><i class="fa fa-dashboard"></i> Admin</a></li>
    <li><a href="{{ route('promotion.index') }}">Promotion</a></li>
    <li class="active">Index</li>
</ol>
@endsection

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="box box-primary">
            <div class="box-header with-border">
                <div class="box-title">List</div>
                <a href="{{ route('promotion.create') }}" class="btn btn-primary pull-right"><i class="fa fa-plus"></i> Add New</a>
            </div>
            <div class="box-body">
                <div class="table-header">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="filter">
                                <label for="search">
                                    Search:
                                    <input id="search" type="search" class="form-control input-sm" name="search" value="{{ request()->search }}" data-url="{{ route('promotion.index') }}">
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
                                <th>Condition</th>
                                <th>Discount Form</th>
                                <th>Start Date</th>
                                <th>End Date</th>
                                <th>Status</th>
                                <th>Author</th>
                                <th style="width: 256px">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($promotions as $promotion)
                                <tr>
                                    <td>{{ $promotion->id }}</td>
                                    <td><a href="{{ route('promotion.show', $promotion->id) }}">{{ $promotion->name }}</a></td>
                                    <td><a href="">Invoice Total</a></td>
                                    <td><a href="">Discount Invoice Amount</a></td>
                                    <td>{{ $promotion->start_date->format('H:i:s d/m/Y') }}</td>
                                    <td>{{ $promotion->end_date->format('H:i:s d/m/Y') }}</td>
                                    <td>{!! generate_label($promotion->status, new App\Enums\PromotionStatus) !!}</td>
                                    @if ($promotion->user)
                                    <td><a href="{{ route('user.show', $promotion->user->id) }}">{{ $promotion->user->fullname }}</a></td>
                                    @else
                                    <td></td>
                                    @endif
                                    <td>
                                        <button class="btn btn-success"><i class="fa fa-thumbs-up"></i> Approve</button>
                                        <a class="btn btn-primary" href="{{ route('promotion.edit', $promotion->id) }}"><i class="fa fa-edit"></i> Edit</a>
                                        <button class="btn btn-danger btn-delete" data-toggle="modal" data-target="#modal-promotion-delete" data-id="{{ $promotion->id }}"><i class="fa fa-trash"></i> Delete</button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="table-footer mt-3">
                    <div class="row">
                        <div class="col-lg-12">
                            {{ $promotions->appends($_GET)->links('themes.adminlte.paginate') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@include('promotion::promotion.layouts.modal', [
    'modal'             => [
        'id'            => 'modal-promotion-delete',
        'title'         => 'Delete Promotion',
        'message'       => 'Are you sure to delete this promotion!',
        'form'          => [
            'url'       => route('promotion.delete', ':id'),
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
        let url_delete = $('#modal-promotion-delete form').attr('action');
        $('.btn-delete').click(function() {
            let id = $(this).data('id');
            let url = url_delete.replace(':id', id)
            $('#modal-promotion-delete form').attr('action', url);
        })
        $('#modal-promotion-delete').on('hide.bs.modal', function() {
            $('#modal-promotion-delete form').attr('action', url_delete);
        })
    })
</script>
@endpush
