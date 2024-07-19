@extends('transporter::transporter.layouts.master')

@section('title-page', 'Transporters')

@section('small-info')
<small>Add Transporter</small>
@endsection

@section('breakcumb')
<ol class="breadcrumb">
    <li><a href="{{ route('admin') }}"><i class="fa fa-dashboard"></i> Admin</a></li>
    <li><a href="{{ route('admin.transporter.index') }}">Transporter</a></li>
    <li class="active">Create</li>
</ol>
@endsection

@section('content')
    @include('transporter::transporter.layouts.form')
@endsection