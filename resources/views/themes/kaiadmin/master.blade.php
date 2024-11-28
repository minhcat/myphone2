<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>MyPhone - Admin</title>
    <meta content="width=device-width, initial-scale=1.0, shrink-to-fit=no" name="viewport"/>

    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('modules/common/app.css') }}">

    @include('themes.kaiadmin.style')
    @yield('style')
</head>
<body data-theme="{{ $admin_active_theme->name }}">
    <div class="wrapper {{ $admin_active_theme->setting->sidebar_collapse ? 'sidebar_minimize' : '' }}">
        <!-- Sidebar -->
        @include('themes.kaiadmin.sidebar')
        <!-- End Sidebar -->

        <div class="main-panel">
            @include('themes.kaiadmin.header')

            <div class="container">
                <div class="page-inner">
                    <div class="page-header">
                        <h1>
                            @yield('title-page')
                            @yield('small-info')
                        </h1>
                        @yield('breakcumb')
                    </div>

                    <!-- Main Content -->
                    @yield('content')
                    <!-- End Main Content -->
                </div>
            </div>

            @include('themes.kaiadmin.footer')
        </div>
    </div>

    @include('themes.kaiadmin.script')
    @stack('script')

    <script>
        $(function() {
            @if (session('success') || session('danger') || session('warning'))
                @if (session('success'))
                    let notify_title = 'Success'
                    let notify_type = 'success'
                    let notify_message = "{{ session('success') }}"
                @elseif (session('danger'))
                    let notify_title = 'Danger'
                    let notify_type = 'danger'
                    let notify_message = "{{ session('danger') }}"
                @elseif (session('warning'))
                    let notify_title = 'Warning'
                    let notify_type = 'warning'
                    let notify_message = "{{ session('warning') }}"
                @endif
                // notify
                $.notify({
                    icon: 'icon-bell',
                    title: notify_title,
                    message: notify_message
                }, {
                    type: notify_type,
                    placement: {
                        from: 'bottom',
                        align: 'right'
                    },
                    timer: 10000,
                })
            @endif
        })
    </script>
</body>
</html>
