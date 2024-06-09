@extends('discountform::layouts.master')

@section('title-page', 'Discount Form')

@section('small-info')
<small>List of discount forms ({{ $discount_forms->total() }})</small>
@endsection

@section('breakcumb')
<ol class="breadcrumb">
    <li><a href="{{ route('admin') }}"><i class="fa fa-dashboard"></i> Admin</a></li>
    <li><a href="{{ route('discount_form.index') }}">Discount Form</a></li>
    <li class="active">Index</li>
</ol>
@endsection

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="box box-primary">
            <div class="box-header with-border">
                <div class="box-title">List</div>
                <a href="{{ route('discount_form.create') }}" class="btn btn-primary pull-right"><i class="fa fa-plus"></i> Add New</a>
            </div>
            <div class="box-body">
                <div class="table-header">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="filter">
                                <label for="search">
                                    Search:
                                    <input id="search" type="search" class="form-control input-sm" name="search" value="{{ request()->search }}" data-url="{{ route('discount_form.index') }}">
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
                                <th>Target Type</th>
                                <th>Discount Type</td>
                                <th>Discount Value</td>
                                <th>Discount Minimum</td>
                                <th>Discount Maximum</td>
                                <th style="width: 175px">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($discount_forms as $discount_form)
                                <tr>
                                    <td>{{ $discount_form->id }}</td>
                                    <td><a href="{{ route('condition.show', $discount_form->id) }}">{{ $discount_form->name }}</a></td>
                                    <td>@if (!is_null($discount_form->user)) <a href="{{ route('user.show', $discount_form->user->id) }}">{{ $discount_form->user->fullname }}</a>@endif</td>
                                    <td>{!! generate_label($discount_form->target_type, new App\Enums\DiscountTarget) !!}</td>
                                    <td>{!! generate_label($discount_form->discount_type, new App\Enums\DiscountType) !!}</td>
                                    <td>{{ $discount_form->discount_value }}</td>
                                    <td>{{ $discount_form->discount_minimum }}</td>
                                    <td>{{ $discount_form->discount_maximum }}</td>
                                    <td>
                                        <a class="btn btn-primary" href="{{ route('condition.edit', $discount_form->id) }}"><i class="fa fa-edit"></i> Edit</a>
                                        <button class="btn btn-danger btn-delete" data-toggle="modal" data-target="#modal-condition-delete" data-id="{{ $discount_form->id }}"><i class="fa fa-trash"></i> Delete</button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="table-footer mt-3">
                    <div class="row">
                        <div class="col-lg-12">
                            {{ $discount_forms->appends($_GET)->links('themes.adminlte.paginate') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@include('discountform::layouts.modal', [
    'modal'             => [
        'id'            => 'modal-discountform-delete',
        'title'         => 'Delete Discount Form',
        'message'       => 'Are you sure to delete this discount form!',
        'form'          => [
            'url'       => route('discount_form.delete', ':id'),
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
        let url_delete = $('#modal-discount-form-delete form').attr('action');
        $('.btn-delete').click(function() {
            let id = $(this).data('id');
            let url = url_delete.replace(':id', id)
            $('#modal-discount-form-delete form').attr('action', url);
        })
        $('#modal-discount-form-delete').on('hide.bs.modal', function() {
            $('#modal-discount-form-delete form').attr('action', url_delete);
        })
    })
</script>
@endpush

