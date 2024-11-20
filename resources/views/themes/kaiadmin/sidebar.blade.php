<div class="sidebar" data-background-color="dark">
    <div class="sidebar-logo">
        <!-- Logo Header -->
        <div class="logo-header" data-background-color="dark">
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
    <div class="sidebar-wrapper scrollbar scrollbar-inner">
        <div class="sidebar-content">
            <ul class="nav nav-secondary">
                <li class="nav-section">
                    <span class="sidebar-mini-icon">
                        <i class="fa fa-ellipsis-h"></i>
                    </span>
                    <h4 class="text-section">Modules</h4>
                </li>
                <li class="nav-item active">
                    <a data-bs-toggle="collapse" href="#product">
                        <i class="fas fa-laptop"></i>
                        <p>Product</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse" id="product">
                        <ul class="nav nav-collapse">
                            <li><a href="#"><span class="sub-item">Product</span></a></li>
                            <li><a href="#"><span class="sub-item">Attribute</span></a></li>
                            <li><a href="#"><span class="sub-item">Specification</span></a></li>
                            <li><a href="#"><span class="sub-item">Brand</span></a></li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a data-bs-toggle="collapse" href="#category">
                        <i class="fas fa-copy"></i>
                        <p>Category</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse" id="category">
                        <ul class="nav nav-collapse">
                            <li><a href="#"><span class="sub-item">Category</span></a></li>
                            <li><a href="#"><span class="sub-item">Tag</span></a></li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a data-bs-toggle="collapse" href="#invoice">
                        <i class="fas fa-shopping-cart"></i>
                        <p>Invoice</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse" id="invoice">
                        <ul class="nav nav-collapse">
                            <li><a href="#"><span class="sub-item">Cart</span></a></li>
                            <li><a href="#"><span class="sub-item">Order</span></a></li>
                            <li><a href="#"><span class="sub-item">Invoice</span></a></li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a data-bs-toggle="collapse" href="#promotion">
                        <i class="fas fa-bullhorn"></i>
                        <p>Promotion</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse" id="promotion">
                        <ul class="nav nav-collapse">
                            <li><a href="#"><span class="sub-item">Promotion</span></a></li>
                            <li><a href="#"><span class="sub-item">Sale Off</span></a></li>
                            <li><a href="#"><span class="sub-item">Voucher</span></a></li>
                            <li><a href="#"><span class="sub-item">Gift</span></a></li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a data-bs-toggle="collapse" href="#transport">
                        <i class="fas fa-truck"></i>
                        <p>Transport</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse" id="transport">
                        <ul class="nav nav-collapse">
                            <li><a href="#"><span class="sub-item">Transporter</span></a></li>
                            <li><a href="#"><span class="sub-item">Transport Fee</span></a></li>
                            <li><a href="#"><span class="sub-item">Area</span></a></li>
                            <li><a href="#"><span class="sub-item">City</span></a></li>
                        </ul>
                    </div>
                </li>
                <li class="nav-section">
                    <span class="sidebar-mini-icon">
                        <i class="fa fa-ellipsis-h"></i>
                    </span>
                    <h4 class="text-section">System</h4>
                </li>
                <li class="nav-item">
                    <a data-bs-toggle="collapse" href="#user">
                        <i class="fas fa-user"></i>
                        <p>User</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse" id="user">
                        <ul class="nav nav-collapse">
                            <li><a href="#"><span class="sub-item">User</span></a></li>
                            <li><a href="#"><span class="sub-item">Role</span></a></li>
                            <li><a href="#"><span class="sub-item">Permission</span></a></li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a href="#">
                        <i class="fas fa-cog"></i>
                        <p>Config</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#">
                        <i class="fas fa-paper-plane"></i>
                        <p>Theme</p>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>