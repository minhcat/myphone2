@extends('theme::layouts.master')

@section('title-page', 'Themes')

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
                                <input type="radio" class="mycolorinput-input" name="menu_skin" value="blue" {{ $setting->menu_skin == 'blue' ? 'checked' : '' }}>
                                <span class="mycolorinput-color bg-blue"></span>
                            </label>
                        </div>
                        <div class="flex-item ml-2 ms-2">
                            <label class="mycolorinput">
                                <input type="radio" class="mycolorinput-input" name="menu_skin" value="purple" {{ $setting->menu_skin == 'purple' ? 'checked' : '' }}>
                                <span class="mycolorinput-color bg-purple"></span>
                            </label>
                        </div>
                        <div class="flex-item ml-2 ms-2">
                            <label class="mycolorinput">
                                <input type="radio" class="mycolorinput-input" name="menu_skin" value="red" {{ $setting->menu_skin == 'red' ? 'checked' : '' }}>
                                <span class="mycolorinput-color bg-red"></span>
                            </label>
                        </div>
                        <div class="flex-item ml-2 ms-2">
                            <label class="mycolorinput">
                                <input type="radio" class="mycolorinput-input" name="menu_skin" value="yellow" {{ $setting->menu_skin == 'yellow' ? 'checked' : '' }}>
                                <span class="mycolorinput-color bg-yellow"></span>
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
                                <input type="radio" class="mycolorinput-input" name="sidebar_skin" {{ $setting->sidebar_skin == 'black' ? 'checked' : '' }} value="black">
                                <span class="mycolorinput-color bg-black"></span>
                            </label>
                        </div>
                        <div class="flex-item ml-2 ms-2">
                            <label class="mycolorinput">
                                <input type="radio" class="mycolorinput-input" name="sidebar_skin" {{ $setting->sidebar_skin == 'white' ? 'checked' : '' }} value="white">
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