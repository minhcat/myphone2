@extends('city::district.layouts.master')

@section('title-page', 'Districts')

@section('small-info')
<small>Add District</small>
@endsection

@section('breakcumb')
<ol class="breadcrumb">
    <li><a href="{{ route('admin') }}"><i class="fa fa-dashboard"></i> Admin</a></li>
    <li><a href="{{ route('admin.city.index') }}">City</a></li>
    <li><a href="{{ route('admin.city.district.index', $city_id) }}">District</a></li>
    <li class="active">Create</li>
</ol>
@endsection

@section('content')
    @include('city::district.layouts.form')
@endsection