<link rel="icon" href="{{ asset('themes/kaiadmin/assets/img/kaiadmin/favicon.ico') }}" type="image/x-icon"/>

<!-- Fonts and icons -->
<script src="{{ asset('themes/kaiadmin/assets/js/plugin/webfont/webfont.min.js') }}"></script>
<script>
    WebFont.load({
        google: { families: ["Public Sans:300,400,500,600,700"] },
        custom: {
            families: [
                "Font Awesome 5 Solid",
                "Font Awesome 5 Regular",
                "Font Awesome 5 Brands",
                "simple-line-icons",
            ],
            urls: ['{{ asset("themes/kaiadmin/assets/css/fonts.min.css") }}'],
        },
        active: function () {
            sessionStorage.fonts = true;
        },
    });
</script>

<!-- CSS Files -->
<link rel="stylesheet" href="{{ asset('css/grid.css') }}" />
<link rel="stylesheet" href="{{ asset('themes/kaiadmin/assets/css/bootstrap.min.css') }}" />
<link rel="stylesheet" href="{{ asset('themes/kaiadmin/assets/css/bootstrap.modals.css') }}" />
<link rel="stylesheet" href="{{ asset('themes/kaiadmin/assets/css/plugins.min.css') }}" />
<link rel="stylesheet" href="{{ asset('themes/kaiadmin/assets/css/kaiadmin.min.css') }}" />
<link rel="stylesheet" href="{{ asset('themes/kaiadmin/assets/css/kaiadmin-add.css') }}" />