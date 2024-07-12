@extends('city::ward.layouts.master')

@section('title-page', 'Wards')

@section('small-info')
<small>Edit Ward</small>
@endsection

@section('breakcumb')
<ol class="breadcrumb">
    <li><a href="{{ route('admin') }}"><i class="fa fa-dashboard"></i> Admin</a></li>
    <li><a href="{{ route('admin.city.index') }}">City</a></li>
    <li><a href="{{ route('admin.city.district.index', $city_id) }}">District</a></li>
    <li><a href="{{ route('admin.city.district.ward.index', ['city_id' => $city_id, 'district_id' => $district_id]) }}">Ward</a></li>
    <li class="active">Edit</li>
</ol>
@endsection

@section('content')
    @include('city::ward.layouts.form')
@endsection