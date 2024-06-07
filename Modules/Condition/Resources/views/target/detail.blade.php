@extends('condition::target.layouts.master')

@section('title-page', 'Condition Targets')

@section('small-info')
<small>Condition Target Detail</small>
@endsection

@section('breakcumb')
<ol class="breadcrumb">
    <li><a href="{{ route('admin') }}"><i class="fa fa-dashboard"></i> Admin</a></li>
    <li><a href="{{ route('condition.index') }}">Condition</a></li>
    <li><a href="{{ route('condition.target.index', $condition_id) }}">Target</a></li>
    <li class="active">Detail</li>
</ol>
@endsection

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="box box-primary">
            <div class="box-header with-border">
                <div class="box-title">Detail</div>
            </div>
            <div class="box-body text-4">
                <div class="field-group">
                    <div class="row">
                        <div class="col-lg-2">
                            <p><strong>Code</strong></p>
                        </div>
                        <div class="col-lg-10">
                            <p>{{ $target->code }}</p>
                        </div>
                    </div>
                </div>
                <div class="field-group">
                    <div class="row">
                        <div class="col-lg-2">
                            <p><strong>Condition</strong></p>
                        </div>
                        <div class="col-lg-10">
                            <p>{{ $target->condition->name }}</p>
                        </div>
                    </div>
                </div>
                <div class="field-group">
                    <div class="row">
                        <div class="col-lg-2">
                            <p><strong>Parent</strong></p>
                        </div>
                        <div class="col-lg-10">
                            <p>{{ $target->parent?->code }}</p>
                        </div>
                    </div>
                </div>
                <div class="field-group">
                    <div class="row">
                        <div class="col-lg-2">
                            <p><strong>Type</strong></p>
                        </div>
                        <div class="col-lg-10">
                            <p>{!! generate_label($target->target_type, new App\Enums\ConditionTargetType) !!}</p>
                        </div>
                    </div>
                </div>
                <div class="field-group">
                    <div class="row">
                        <div class="col-lg-2">
                            <p><strong>Target</strong></p>
                        </div>
                        <div class="col-lg-10">
                            <p>{{ $target->target?->name }}</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="box-footer">
                <a href="{{ route('condition.target.index', $condition_id) }}" class="btn btn-default">Back</a>
                <a href="{{ route('condition.target.edit', ['condition_id' => $condition_id, 'id' => $target->id]) }}" class="btn btn-primary">Edit</a>
            </div>
        </div>
    </div>
</div>
@endsection