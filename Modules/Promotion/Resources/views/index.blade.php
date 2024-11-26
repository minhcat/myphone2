@extends('promotion::layouts.master')

@section('title-page', 'Promotion')

@section('small-info')
<small>List of promotions ({{ $promotions->total() }})</small>
@endsection

@section('breakcumb')
<ol class="breadcrumb">
    <li><a href="{{ route('admin') }}"><i class="fa fa-dashboard"></i> Admin</a></li>
    <li><a href="{{ route('admin.promotion.index') }}">Promotion</a></li>
    <li class="active">Index</li>
</ol>
@endsection

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="box box-primary">
            <div class="box-header with-border">
                <div class="box-title">List</div>
                @can('promotion:add')
                <a href="{{ route('admin.promotion.create') }}" class="btn btn-primary pull-right"><i class="fa fa-plus"></i> Add New</a>
                @endcan
            </div>
            <div class="box-body">
                <div class="table-header">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="filter">
                                <label for="search">
                                    Search:
                                    <input id="search" type="search" class="form-control input-sm" name="search" value="{{ request()->search }}" data-url="{{ route('admin.promotion.index') }}">
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
                                <th>Condition Type</th>
                                <th>Discount Target</th>
                                <th>Discount Type</th>
                                <th>Status</th>
                                <th>Author</th>
                                @canany(['promotion:edit', 'promotion:delete'])
                                <th style="width: 1px">Action</th>
                                @endcanany
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($promotions as $key => $promotion)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    @can('promotion:read')
                                    <td><a href="{{ route('admin.promotion.show', $promotion->id) }}">{{ $promotion->name }}</a></td>
                                    @else
                                    <td>{{ $promotion->name }}</td>
                                    @endcan
                                    <td>{!! generate_label($promotion->condition_type, new ConditionType) !!}</td>
                                    <td>{!! generate_label($promotion->discount_target, new DiscountTarget) !!}</td>
                                    <td>{!! generate_label($promotion->discount_type, new DiscountType) !!}</td>
                                    <td>{!! generate_label($promotion->status, new PromotionStatus) !!}</td>
                                    @if ($promotion->user)
                                    @can('user:read')
                                    <td><a href="{{ route('admin.user.show', $promotion->user->id) }}">{{ $promotion->user->account }}</a></td>
                                    @else
                                    <td>{{ $promotion->user->account }}</td>
                                    @endcan
                                    @else
                                    <td></td>
                                    @endif
                                    @canany(['promotion:edit', 'promotion:delete'])
                                    <td style="text-align: right" class="nowrap">
                                        @can('promotion:approve')
                                        {!! generate_button_update_status($promotion->status, new PromotionStatus, ['toggle' => 'modal', 'target' => '#modal-promotion-update', 'id' => $promotion->id, 'status' => PromotionStatus::getNextStatus($promotion->status)]) !!}
                                        @endcan
                                        @can('promotion:edit')
                                        <a class="btn btn-primary" href="{{ route('admin.promotion.edit', $promotion->id) }}"><i class="fa fa-edit"></i> Edit</a>
                                        @endcan
                                        @can('promotion:delete')
                                        <button class="btn btn-danger btn-delete" data-toggle="modal" data-target="#modal-promotion-delete" data-id="{{ $promotion->id }}"><i class="fa fa-trash"></i> Delete</button>
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
                            {{ $promotions->appends($_GET)->links(get_admin_theme_extend($admin_active_theme, 'paginate')) }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@include('promotion::layouts.modal', [
    'modal'             => [
        'id'            => 'modal-promotion-delete',
        'title'         => 'Delete Promotion',
        'message'       => 'Are you sure to delete this promotion!',
        'form'          => [
            'url'       => route('admin.promotion.delete', ':id'),
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

@include('promotion::layouts.modal', [
    'modal'                 => [
        'id'                => 'modal-promotion-update',
        'title'             => 'Update Status Promotion',
        'message'           => 'Are you sure to update status this promotion!',
        'form'              => [
            'url'           => route('admin.promotion.update', ':id'),
            'method'        => 'PUT',
            'inputs'        => [
                [
                    'name'  => 'status',
                    'value' => ':status'
                ]
            ]
        ],
        'buttons'           => [
            'primary'       => [
                'text'      => 'Update'
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

        let url_update = $('#modal-promotion-update form').attr('action');
        $('.btn-update').click(function() {
            let id = $(this).data('id');
            let url = url_update.replace(':id', id)
            let status = $(this).data('status');
            $('#modal-promotion-update form').attr('action', url);
            $('#modal-promotion-update form input[name="status"]').val(status);
        })
        $('#modal-promotion-update').on('hide.bs.modal', function() {
            $('#modalpromotionr-update form').attr('action', url_update);
        })
    })
</script>
@endpush
