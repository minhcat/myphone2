@extends('specification::specification.layouts.master')

@section('title-page', 'Specifications')

@section('small-info')
<small>Add Specification</small>
@endsection

@section('breakcumb')
<ol class="breadcrumb">
    <li><a href="{{ route('admin') }}"><i class="fa fa-dashboard"></i> Admin</a></li>
    <li><a href="{{ route('admin.specification.index') }}">Specification</a></li>
    <li class="active">Create</li>
</ol>
@endsection

@section('content')
    @include('specification::specification.layouts.form')
@endsection