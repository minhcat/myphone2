@extends('tag::layouts.master')

@section('title-page', 'Tags')

@section('small-info')
<small>Add Tag</small>
@endsection

@section('breakcumb')
<ol class="breadcrumb">
    <li><a href="{{ route('admin') }}"><i class="fa fa-dashboard"></i> Admin</a></li>
    <li><a href="{{ route('tag.index') }}">Tag</a></li>
    <li class="active">Create</li>
</ol>
@endsection

@section('content')
    @include('tag::layouts.form')
@endsection