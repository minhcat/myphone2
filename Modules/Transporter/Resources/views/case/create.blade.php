@extends('transporter::case.layouts.master')

@section('title-page', 'Transporter Cases')

@section('small-info')
<small>Add Transporter Case</small>
@endsection

@section('breakcumb')
<ol class="breadcrumb">
    <li><a href="{{ route('admin') }}"><i class="fa fa-dashboard"></i> Admin</a></li>
    <li><a href="{{ route('admin.transporter.index') }}">Transporter</a></li>
    <li><a href="{{ route('admin.transporter.case.index', $transporter_id) }}">Case</a></li>
    <li class="active">Create</li>
</ol>
@endsection

@section('content')
    @include('transporter::case.layouts.form')
@endsection