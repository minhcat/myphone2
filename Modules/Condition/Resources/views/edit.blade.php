@extends('condition::layouts.master')

@section('title-page', 'Conditions')

@section('small-info')
<small>Edit Condition</small>
@endsection

@section('breakcumb')
<ol class="breadcrumb">
    <li><a href="{{ route('admin') }}"><i class="fa fa-dashboard"></i> Admin</a></li>
    <li><a href="{{ route('condition.index') }}">Condition</a></li>
    <li class="active">Edit</li>
</ol>
@endsection

@section('content')
    @include('condition::layouts.form')
@endsection