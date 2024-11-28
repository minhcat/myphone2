<div class="main-header">
    <div class="main-header-logo">
        <!-- Logo Header -->
        <div class="logo-header" data-background-color="{{ get_kaiadmin_logo_header_background($admin_active_theme) }}">
            <a href="index.html" class="logo">
                <img
                src="{{ asset('themes/kaiadmin/assets/img/kaiadmin/logo_light.svg') }}"
                alt="navbar brand"
                class="navbar-brand"
                height="20"
                />
            </a>
            <div class="nav-toggle">
                <button class="btn btn-toggle toggle-sidebar">
                    <i class="gg-menu-right"></i>
                </button>
                <button class="btn btn-toggle sidenav-toggler">
                    <i class="gg-menu-left"></i>
                </button>
            </div>
            <button class="topbar-toggler more">
                <i class="gg-more-vertical-alt"></i>
            </button>
        </div>
        <!-- End Logo Header -->
    </div>
    <!-- Navbar Header -->
    <nav class="navbar navbar-header navbar-header-transparent navbar-expand-lg border-bottom" data-background-color="{{ get_kaiadmin_navbar_header_background($admin_active_theme) }}">
        <div class="container-fluid">
            <nav class="navbar navbar-header-left navbar-header-title navbar-expand-lg navbar-form nav-search p-0 d-none d-lg-flex">
                <h5>Myphone Admin</h5>
            </nav>

            <ul class="navbar-nav topbar-nav ms-md-auto align-items-center">
                <li class="nav-item dropdown hidden-caret">
                    <a class="nav-link" href="#" aria-expanded="false">
                        Website
                    </a>
                </li>

                <li class="nav-item topbar-user dropdown hidden-caret">
                    <a class="dropdown-toggle profile-pic"
                    data-bs-toggle="dropdown"
                    href="#"
                    aria-expanded="false">
                        <div class="avatar-sm">
                            <img
                            src="{{ asset('themes/kaiadmin/assets/img/profile.jpg') }}"
                            alt="..."
                            class="avatar-img rounded-circle"
                            />
                        </div>
                        <span class="profile-username">
                            <span class="fw-bold">Tạ Minh Cát</span>
                        </span>
                    </a>
                    <ul class="dropdown-menu dropdown-user animated fadeIn">
                        <div class="dropdown-user-scroll scrollbar-outer">
                            <li>
                                <div class="user-box">
                                    <div class="avatar-lg">
                                        <img
                                        src="{{ asset('themes/kaiadmin/assets/img/profile.jpg') }}"
                                        alt="image profile"
                                        class="avatar-img rounded"/>
                                    </div>
                                    <div class="u-text">
                                        <h4>Tạ Minh Cát</h4>
                                        <p class="text-muted">minhcat@myphone.com</p>
                                        <p class="text-muted">role: super admin</p>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#">My Profile</a>
                                <a class="dropdown-item" href="{{ route('admin.login.set_role') }}">Role Setting</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="{{ route('admin.login.logout') }}">Logout</a>
                            </li>
                        </div>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
    <!-- End Navbar -->
</div>