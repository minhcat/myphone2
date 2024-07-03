@extends('gift::gift.layouts.master')

@section('title-page', 'Gifts')

@section('small-info')
<small>Add Gift</small>
@endsection

@section('breakcumb')
<ol class="breadcrumb">
    <li><a href="{{ route('admin') }}"><i class="fa fa-dashboard"></i> Admin</a></li>
    <li><a href="{{ route('admin.gift.index') }}">Gift</a></li>
    <li class="active">Create</li>
</ol>
@endsection

@section('content')
    @include('gift::gift.layouts.form')
@endsection