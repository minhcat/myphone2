@extends('theme::layouts.master')

@section('title-page', 'Theme')

@section('small-info')
<small>Theme Setting</small>
@endsection

@section('breakcumb')
<ol class="breadcrumb">
    <li><a href="{{ route('admin') }}"><i class="fa fa-dashboard"></i> Admin</a></li>
    <li><a href="{{ route('admin.theme.index') }}">Theme</a></li>
    <li class="active">Setting</li>
</ol>
@endsection

@section('content')
<div class="box box-primary">
    <div class="box-header with-border">
        <div class="box-title">{{ $setting->theme->name }} Setting</div>
    </div>
    <form action="{{ route('admin.theme.setting.update', $theme_id) }}" method="POST">
        @method('put')
        @csrf
        <div class="box-body">
            <div class="row">
                <div class="col-lg-6">
                    <h5>Sidebar Collapse</h5>
                </div>
                <div class="col-lg-6 text-right">
                    <label class="switch" for="sidebar_collapse">
                        <input type="checkbox" id="sidebar_collapse" name="sidebar_collapse" {{ $setting->sidebar_collapse ? 'checked' : '' }}>
                        <span class="slider round"></span>
                    </label>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-lg-6">
                    <h5>Admin Menu Skin</h5>
                </div>
                <div class="col-lg-6 text-right">
                    <div class="flex justify-flex-end">
                        <div class="flex-item ml-2 ms-2">
                            <label class="mycolorinput">
                                <input type="radio" class="mycolorinput-input mycolorinput-input-menu" name="menu_skin" value="blue" {{ $setting->menu_skin == 'blue' ? 'checked' : '' }} data-kaiadmin-color="blue" data-adminlte-color="skin-blue">
                                <span class="mycolorinput-color bg-blue"></span>
                            </label>
                        </div>
                        <div class="flex-item ml-2 ms-2">
                            <label class="mycolorinput">
                                <input type="radio" class="mycolorinput-input mycolorinput-input-menu" name="menu_skin" value="purple" {{ $setting->menu_skin == 'purple' ? 'checked' : '' }} data-kaiadmin-color="purple" data-adminlte-color="skin-purple">
                                <span class="mycolorinput-color bg-purple"></span>
                            </label>
                        </div>
                        <div class="flex-item ml-2 ms-2">
                            <label class="mycolorinput">
                                <input type="radio" class="mycolorinput-input mycolorinput-input-menu" name="menu_skin" value="red" {{ $setting->menu_skin == 'red' ? 'checked' : '' }} data-kaiadmin-color="red" data-adminlte-color="skin-red">
                                <span class="mycolorinput-color bg-red"></span>
                            </label>
                        </div>
                        <div class="flex-item ml-2 ms-2">
                            <label class="mycolorinput">
                                <input type="radio" class="mycolorinput-input mycolorinput-input-menu" name="menu_skin" value="yellow" {{ $setting->menu_skin == 'yellow' ? 'checked' : '' }} data-kaiadmin-color="orange" data-adminlte-color="skin-yellow">
                                <span class="mycolorinput-color bg-yellow"></span>
                            </label>
                        </div>
                        <div class="flex-item ml-2 ms-2">
                            <label class="mycolorinput">
                                <input type="radio" class="mycolorinput-input mycolorinput-input-menu" name="menu_skin" value="white" {{ $setting->menu_skin == 'white' ? 'checked' : '' }} data-kaiadmin-color="white" data-adminlte-color="skin-black">
                                <span class="mycolorinput-color bg-white"></span>
                            </label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-lg-6">
                    <h5>Admin Sidebar Skin</h5>
                </div>
                <div class="col-lg-6 text-right">
                    <div class="flex justify-flex-end">
                        <div class="flex-item ml-2 ms-2">
                            <label class="mycolorinput">
                                <input type="radio" class="mycolorinput-input mycolorinput-input-sidebar" name="sidebar_skin" {{ $setting->sidebar_skin == 'black' ? 'checked' : '' }} value="black" data-kaiadmin-color="dark" data-adminlte-color="dark">
                                <span class="mycolorinput-color bg-black"></span>
                            </label>
                        </div>
                        <div class="flex-item ml-2 ms-2">
                            <label class="mycolorinput">
                                <input type="radio" class="mycolorinput-input mycolorinput-input-sidebar" name="sidebar_skin" {{ $setting->sidebar_skin == 'white' ? 'checked' : '' }} value="white" data-kaiadmin-color="white" data-adminlte-color="light">
                                <span class="mycolorinput-color bg-white"></span>
                            </label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="box-footer">
            <a href="{{ route('admin.theme.index') }}" class="btn btn-default">Back</a>
            <button class="btn btn-primary" type="submit">Save</button>
        </div>
    </form>
</div>
@endsection

@push('script')
<script>
    $(function() {
        $('input#sidebar_collapse').change(function() {
            let theme = $('body').data('theme')
            if (theme == 'AdminLTE') {
                if ($(this).is(':checked')) {
                    $('body').addClass('sidebar-collapse')
                } else {
                    $('body').removeClass('sidebar-collapse')
                }
            } else if (theme == 'KaiAdmin') {
                if ($(this).is(':checked')) {
                    $('.wrapper').addClass('sidebar_minimize')
                } else {
                    $('.wrapper').removeClass('sidebar_minimize')
                }
            }
        })
        $('input.mycolorinput-input-menu').change(function() {
            let theme = $('body').data('theme')
            if (theme == 'AdminLTE') {
                let menu_color = $(this).data('adminlte-color')
                let sidebar_color = $('body').data('sidebar-color')
                $('body').data('menu-color', menu_color)
                $('body').removeClass('skin-blue skin-purple skin-red skin-yellow skin-black skin-blue-light skin-purple-light skin-red-light skin-yellow-light skin-black-light')
                if (sidebar_color == 'dark') {
                    $('body').addClass(menu_color)
                } else {
                    $('body').addClass(menu_color + '-light')
                }
            } else if (theme == 'KaiAdmin') {
                let color = $(this).data('kaiadmin-color')
                $('.navbar-header').removeAttr('data-background-color')
                $('.navbar-header').attr('data-background-color', color)
            }
        })
        $('input.mycolorinput-input-sidebar').change(function() {
            let theme = $('body').data('theme')
            if (theme == 'AdminLTE') {
                let sidebar_color = $(this).data('adminlte-color')
                let menu_color = $('body').data('menu-color')
                $('body').data('sidebar-color', sidebar_color)
                $('body').removeClass('skin-blue skin-purple skin-red skin-yellow skin-black skin-blue-light skin-purple-light skin-red-light skin-yellow-light skin-black-light')
                if (sidebar_color == 'dark') {
                    $('body').addClass(menu_color)
                } else {
                    $('body').addClass(menu_color + '-light')
                }
            } else if (theme == 'KaiAdmin') {
                let color = $(this).data('kaiadmin-color')
                $('.sidebar').removeAttr('data-background-color')
                $('.sidebar').attr('data-background-color', color)
                $('.sidebar .logo-header').removeAttr('data-background-color')
                $('.sidebar .logo-header').attr('data-background-color', color)

                let icon = $('.sidebar .logo-header a img.navbar-brand').data((color == 'white' ? 'dark' : 'light')+'-src')
                $('.sidebar .logo-header a img.navbar-brand').attr('src', icon)
            }
        })
    })
</script>
@endpush