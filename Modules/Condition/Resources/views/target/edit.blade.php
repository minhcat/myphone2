@extends('condition::target.layouts.master')

@section('title-page', 'Condition Targets')

@section('small-info')
<small>Edit Condition Target</small>
@endsection

@section('breakcumb')
<ol class="breadcrumb">
    <li><a href="{{ route('admin') }}"><i class="fa fa-dashboard"></i> Admin</a></li>
    <li><a href="{{ route('condition.index') }}">Condition</a></li>
    <li><a href="{{ route('condition.target.index', $condition_id) }}">Target</a></li>
    <li class="active">Edit</li>
</ol>
@endsection

@section('content')
    @include('condition::target.layouts.form')
@endsection