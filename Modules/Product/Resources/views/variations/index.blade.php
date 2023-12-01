@extends('product::variations.layouts.master')

@section('title-page', 'Variation')

@section('small-info')
<small>List of variations ({{ $variations->total() }})</small>
@endsection

@section('breakcumb')
<ol class="breadcrumb">
    <li><a href="{{ route('admin') }}"><i class="fa fa-dashboard"></i> Admin</a></li>
    <li><a href="{{ route('product.index') }}">Product</a></li>
    <li><a href="{{ route('product.variation.index', $product_id) }}">Variation</a></li>
    <li class="active">Index</li>
</ol>
@endsection

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="box box-primary">
            <div class="box-header with-border">
                <div class="box-title">{{ $product_name }}</div>
                <a href="{{ route('product.variation.create', $product_id) }}" class="btn btn-primary pull-right">New Variation</a>
                <a href="{{ route('product.index') }}" class="btn btn-default pull-right mr-1">Back</a>
            </div>
            <div class="box-body">
                <div class="table-body">
                    <table class="table table-bordered table-striped mt-3">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Code</th>
                                <th>Price</th>
                                @foreach($attributes as $attribute)
                                    <th>{{ $attribute->name }}</th>
                                @endforeach
                                <th style="width: 100px">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($variations as $variation)
                                <tr>
                                    <td>{{ $variation->id }}</td>
                                    <td><a href="{{ route('product.variation.show', ['product_id' => $product_id, 'id' => $variation->id]) }}">{{ $variation->code }}</a></td>
                                    <td>{{ $variation->price }}</td>
                                    @foreach($attributes as $attribute)
                                        <td>
                                            @foreach($variation->options as $option)
                                                @if ($option->attribute_id == $attribute->id)
                                                    {{ $option->value }}
                                                @endif
                                            @endforeach
                                        </td>
                                    @endforeach
                                    <td>
                                        <a class="btn btn-icon btn-primary" href="{{ route('product.variation.edit', ['product_id' => $product_id, 'id' => $variation->id]) }}"><i class="fa fa-edit"></i></a>
                                        <button class="btn btn-icon btn-danger btn-delete" data-toggle="modal" data-target="#modal-variation-delete" data-id="{{ $variation->id }}"><i class="fa fa-trash"></i></button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="table-footer mt-3">
                    <div class="row">
                        <div class="col-lg-12">
                            {{ $variations->appends($_GET)->links('themes.adminlte.paginate') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@include('product::variations.layouts.modal', [
    'modal'             => [
        'id'            => 'modal-variation-delete',
        'title'         => 'Delete Variation',
        'message'       => 'Are you sure to delete this variation!',
        'form'          => [
            'url'       => route('product.variation.delete', ['product_id' => $product_id, 'id' => ':id']),
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
        let url_delete = $('#modal-variation-delete form').attr('action');
        $('.btn-delete').click(function() {
            let id = $(this).data('id');
            let url = url_delete.replace(':id', id)
            $('#modal-variation-delete form').attr('action', url);
        })
        $('#modal-variation-delete').on('hide.bs.modal', function() {
            $('#modal-variation-delete form').attr('action', url_delete);
        })
    })
</script>
@endpush

