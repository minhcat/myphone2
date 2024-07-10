@extends('city::city.layouts.master')

@section('title-page', 'Cities')

@section('small-info')
<small>Add City</small>
@endsection

@section('breakcumb')
<ol class="breadcrumb">
    <li><a href="{{ route('admin') }}"><i class="fa fa-dashboard"></i> Admin</a></li>
    <li><a href="{{ route('admin.city.index') }}">City</a></li>
    <li class="active">Create</li>
</ol>
@endsection

@section('content')
    @include('city::city.layouts.form')
@endsection