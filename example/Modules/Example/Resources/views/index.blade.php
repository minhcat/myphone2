@extends('example::layouts.master')

@section('title-page', 'Examples')

@section('small-info')
<small>List of examples (100)</small>
@endsection

@section('breakcumb')
<ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Admin</a></li>
    <li><a href="#">Example</a></li>
    <li class="active">Index</li>
</ol>
@endsection

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="box box-primary">
            <div class="box-header with-border">
                <div class="box-title">List</div>
                <a href="#" class="btn btn-primary pull-right">New Example</a>
            </div>
            <div class="box-body">
                <div class="table-header">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="length">
                                <label for="length">
                                    Show 
                                    <select name="length" id="length" class="form-control input-sm">
                                        @foreach ([5, 10, 25, 50] as $value)
                                            <option value="{{ $value }}" {{ $take == $value ? 'selected' : '' }}>{{ $value }}</option>
                                        @endforeach
                                    </select> 
                                    entries
                                </label>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="filter">
                                <label for="search">
                                    Search:
                                    <input type="search" class="form-control input-sm" name="search" value="{{ request()->search }}" data-url="{{ route('product.index') }}">
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
                                <th>Number</th>
                                <th>Description</th>
                                <th>Status</th>
                                <th>Created At</th>
                                <th>Updated At</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td><a href="#">Example 1</a></td>
                                <td>100</td>
                                <td>example description 1</td>
                                <td><span class="badge text-bg-primary">active</span></td>
                                <td>25-04-2023</td>
                                <td>25-04-2023</td>
                                <td>
                                    <a class="btn btn-icon btn-primary" href="#"><i class="fa fa-edit"></i></a>
                                    <button class="btn btn-icon btn-danger btn-delete" data-toggle="modal" data-target="#modal-product-delete" data-id="1"><i class="fa fa-trash"></i></button>
                                </td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td><a href="#">Example 2</a></td>
                                <td>100</td>
                                <td>example description 2</td>
                                <td><span class="badge text-bg-primary">active</span></td>
                                <td>25-04-2023</td>
                                <td>25-04-2023</td>
                                <td>
                                    <a class="btn btn-icon btn-primary" href="#"><i class="fa fa-edit"></i></a>
                                    <button class="btn btn-icon btn-danger btn-delete" data-toggle="modal" data-target="#modal-product-delete" data-id="1"><i class="fa fa-trash"></i></button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="table-footer mt-3">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="table-info">Showing 1 to 10 of 100 entries</div>
                        </div>
                        <div class="col-lg-6">
                            <ul class="pagination pagination-sm mb-0 pull-right">
                                <li class="disabled"><span><<</span></li>
			                    <li class="disabled"><span><</span></li>
                                <li class="active"><span>1</span></li>
                                <li><a href="#">2</a></li>
                                <li><a href="#">3</a></li>
                                <li><a href="#">4</a></li>
                                <li><a href="#">5</a></li>
                                <li class="disabled"><span>></span></li>
			                    <li class="disabled"><span>>></span></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@include('product::layouts.modal', [
    'modal'             => [
        'id'            => 'modal-product-delete',
        'title'         => 'Delete Product',
        'message'       => 'Are you sure to delete this product!',
        'form'          => [
            'url'       => route('product.delete', ':id'),
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
        let url_delete = $('#modal-product-delete form').attr('action');
        $('.btn-delete').click(function() {
            let id = $(this).data('id');
            let url = url_delete.replace(':id', id)
            $('#modal-product-delete form').attr('action', url);
            console.log(url)
        })
        $('#modal-product-delete').on('hide.bs.modal', function() {
            $('#modal-product-delete form').attr('action', url_delete);
        })
    })
</script>
@endpush
