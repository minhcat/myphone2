@extends('theme::layouts.master')

@section('title-page', 'Themes')

@section('small-info')
<small>List of Themes ({{ $themes->count() }})</small>
@endsection

@section('breakcumb')
<ol class="breadcrumb">
    <li><a href="{{ route('admin') }}"><i class="fa fa-dashboard"></i> Admin</a></li>
    <li><a href="{{ route('admin.theme.index') }}">Theme</a></li>
    <li class="active">Index</li>
</ol>
@endsection

@section('style')
<link rel="stylesheet" href="{{ asset('modules/theme/app.css') }}">
<style>
    #button-theme .flex-item {
        width: 49%;
    }
    #button-theme.active .flex-item {
        width: 49%;
    }
</style>
@endsection

@section('content')
    <div class="row">
        @foreach($themes as $theme)
        <div class="col-lg-3">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <div class="box-title">{{ $theme->name }} {{ ThemeStatus::checkActive($theme->is_active) ? '- Active' : '' }}</div>
                </div>
                <div class="box-body">
                    <div>
                        <img src="{{ asset('themes/'.$theme->path.'/img/'.$theme->primary_image) }}" alt="" style="width: 100%" data-toggle="modal" data-target="#modal-theme-info-{{ $theme->id }}">
                    </div>
                </div>
                <div class="box-footer">
                    <div class="flex justify-space-between {{ ThemeStatus::checkActive($theme->is_active) ? 'active' : '' }}" id="button-theme">
                        @if (!ThemeStatus::checkActive($theme->is_active))
                        <div class="flex-item">
                            <button class="btn btn-block btn-primary btn-active" data-toggle="modal" data-target="#modal-theme-active" data-id="{{ $theme->id }}">Active</button>
                        </div>
                        @endif
                        <div class="flex-item">
                            <button class="btn btn-block btn-info" data-toggle="modal" data-target="#modal-theme-info-{{ $theme->id }}">Info</button>
                        </div>
                        @if (ThemeStatus::checkActive($theme->is_active))
                        <div class="flex-item">
                            <a href="{{ route('admin.theme.setting', $theme->id) }}" class="btn btn-block btn-default">Setting</a>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
@endsection

@include('theme::layouts.modal', [
    'modal'                 => [
        'id'                => 'modal-theme-active',
        'title'             => 'Active This Theme',
        'message'           => 'Are you sure to active this theme!',
        'form'              => [
            'url'           => route('admin.theme.update', ':id'),
            'method'        => 'PUT',
            'inputs'        => [
                [
                    'name'  => 'is_active',
                    'value' => ThemeStatus::ACTIVE, 
                ]
            ]
        ],
        'buttons'           => [
            'primary'       => [
                'text'      => 'Active'
            ]
        ],
    ]
])

@foreach($themes as $theme)
<div class="modal modal-theme-info" id="modal-theme-info-{{ $theme->id }}">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button class="close" type="button" data-dismiss="modal">
                    <span aria-hidden="true">x</span>
                </button>
                <h4 class="modal-title">{{ $theme->name }} Theme Info</h4>
            </div>
            <div class="modal-body">
                <div class="description">
                    {!! $theme->description !!}
                </div>
                <div class="flex flex-wrap full-width justify-space-between align-space-between">
                    @foreach($theme->info_images as $key => $image)
                    <div class="flex-item">
                        <img class="theme-image" src="{{ asset('/themes/'.$theme->path.'/img/'.$image) }}" alt="" data-dismiss="modal" data-image="{{ $key }}" data-id="{{ $theme->id }}">
                    </div>
                    @endforeach
                </div>
            </div>
            <div class="modal-footer text-center">
                <button class="btn btn-primary w75" type="submit">OK</button>
            </div>
        </div>
    </div>
</div>
@endforeach

@foreach($themes as $theme)
    @foreach($theme->info_images as $key => $image)
    <div class="modal modal-theme-info-image" id="modal-theme-info-image-{{ $theme->id }}-{{ $key }}">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button class="close" type="button" data-dismiss="modal">
                        <span aria-hidden="true">x</span>
                    </button>
                    <h4 class="modal-title">{{ $theme->name }} Theme Info</h4>
                </div>
                <div class="modal-body">
                    <div class="flex flex-wrap full-width justify-space-between align-space-between">
                        <div class="flex-item">
                            <img src="{{ asset('/themes/'.$theme->path.'/img/'.$image) }}" alt="">
                        </div>
                    </div>
                </div>
                <div class="modal-footer text-center">
                    @if (!$loop->first)
                    <button class="btn btn-default btn-previous w75" type="button" data-id="{{ $theme->id }}" data-image="{{ $key - 1 }}">Previous</button>
                    @endif
                    <button class="btn btn-primary btn-close-modal w75" type="button" data-dismiss="modal">Close</button>
                    @if (!$loop->last)
                    <button class="btn btn-default btn-next w75" type="button" data-id="{{ $theme->id }}" data-image="{{ $key + 1 }}">Next</button>
                    @endif
                </div>
            </div>
        </div>
    </div>
    @endforeach
@endforeach

@push('script')
<script>
    $(function() {
        let url_active = $('#modal-theme-active form').attr('action');
        $('.btn-active').click(function() {
            let id = $(this).data('id');
            let url = url_active.replace(':id', id)
            $('#modal-theme-active form').attr('action', url);
        })
        $('#modal-theme-active').on('hide.bs.modal', function() {
            $('#modal-theme-active form').attr('action', url_active);
        })

        let next_button_click = false
        $('.theme-image').click(function() {
            let id = $(this).data('id')
            let img = $(this).data('image')
            $('#modal-theme-info-image-' + id + '-' + img).modal('show')
        })
        $('.modal-theme-info-image').on('hidden.bs.modal', function() {
            if (!next_button_click) {
                $('#modal-theme-info').modal('show')
            }
            next_button_click = false
        })
        $('.btn-previous,.btn-next').click(function(event) {
            next_button_click = true
            event.preventDefault()
            let id = $(this).data('id')
            let img = $(this).data('image')
            $('.modal-theme-info-image').modal('hide')
            $('#modal-theme-info-image-' + id + '-' + img).modal('show')
        })
        $('.modal-theme-info-image [data-dismiss="modal"]').click(function() {
            $('.modal-theme-info-image').modal('hide')
        })
    })
</script>
@endpush