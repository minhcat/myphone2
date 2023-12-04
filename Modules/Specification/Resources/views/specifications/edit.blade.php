@extends('specification::specifications.layouts.master')

@section('title-page', 'Specifications')

@section('small-info')
<small>Edit Specification</small>
@endsection

@section('breakcumb')
<ol class="breadcrumb">
    <li><a href="{{ route('admin') }}"><i class="fa fa-dashboard"></i> Admin</a></li>
    <li><a href="{{ route('specification.index') }}">Specification</a></li>
    <li class="active">Edit</li>
</ol>
@endsection

@section('content')
    @include('specification::specifications.layouts.form')
@endsection