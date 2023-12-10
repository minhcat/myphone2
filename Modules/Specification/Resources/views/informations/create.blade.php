@extends('specification::informations.layouts.master')

@section('title-page', 'Informations')

@section('small-info')
<small>Add Information</small>
@endsection

@section('breakcumb')
<ol class="breadcrumb">
    <li><a href="{{ route('admin') }}"><i class="fa fa-dashboard"></i> Admin</a></li>
    <li><a href="{{ route('specification.index') }}">Specification</a></li>
    <li><a href="{{ route('specification.information.index', $specification_id) }}">Information</a></li>
    <li class="active">Create</li>
</ol>
@endsection

@section('content')
    @include('specification::informations.layouts.form')
@endsection