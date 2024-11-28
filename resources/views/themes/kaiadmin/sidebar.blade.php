@php
  $menu = isset($menu) ? $menu : ['group' => '', 'active' => ''];
@endphp

<div class="sidebar" data-background-color="{{ get_kaiadmin_sidebar_background($admin_active_theme) }}">
    <div class="sidebar-logo">
        <!-- Logo Header -->
        <div class="logo-header" data-background-color="{{ get_kaiadmin_logo_header_background($admin_active_theme) }}">
            <a href="index.html" class="logo">
                <img
                src="{{ asset('themes/kaiadmin/assets/img/kaiadmin/'.get_kaiadmin_logo($admin_active_theme)) }}"
                alt="navbar brand"
                class="navbar-brand"
                height="20"
                data-light-src="{{ asset('themes/kaiadmin/assets/img/kaiadmin/logo_light.svg') }}"
                data-dark-src="{{ asset('themes/kaiadmin/assets/img/kaiadmin/logo_dark.svg') }}"
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
                @canany([
                    'product:browse', 'attribute:browse', 'specification:browse', 'brand:browse',
                    'category:browse', 'tag:browse',
                    'cart:browse', 'order:browse', 'invoice:browse',
                    'promotion:browse', 'sale:browse', 'voucher:browse', 'gift:browse',
                    'transporter:browse', 'transport_fee:browse', 'area:browse', 'city:browse'
                ])
                <li class="nav-section">
                    <span class="sidebar-mini-icon">
                        <i class="fa fa-ellipsis-h"></i>
                    </span>
                    <h4 class="text-section">Modules</h4>
                </li>
                @endcanany

                @canany(['product:browse', 'attribute:browse', 'specification:browse', 'brand:browse'])
                <li class="nav-item {{ $menu['group'] == 'product' ? 'active submenu' : '' }}">
                    <a data-bs-toggle="collapse" href="#product">
                        <i class="fas fa-laptop"></i>
                        <p>Product</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse {{ $menu['group'] == 'product' ? 'show' : '' }}" id="product">
                        <ul class="nav nav-collapse">
                            @can('product:browse')
                            <li class="{{ $menu['active'] == 'product' ? 'active' : '' }}"><a href="{{ route('admin.product.index') }}"><span class="sub-item">Product</span></a></li>
                            @endcan
                            @can('attribute:browse')
                            <li class="{{ $menu['active'] == 'attribute' ? 'active' : '' }}"><a href="{{ route('admin.attribute.index') }}"><span class="sub-item">Attribute</span></a></li>
                            @endcan
                            @can('specification:browse')
                            <li class="{{ $menu['active'] == 'specification' ? 'active' : '' }}"><a href="{{ route('admin.specification.index') }}"><span class="sub-item">Specification</span></a></li>
                            @endcan
                            @can('brand:browse')
                            <li class="{{ $menu['active'] == 'brand' ? 'active' : '' }}"><a href="{{ route('admin.brand.index') }}"><span class="sub-item">Brand</span></a></li>
                            @endcan
                        </ul>
                    </div>
                </li>
                @endcanany

                @canany(['category:browse', 'tag:browse'])
                <li class="nav-item {{ $menu['group'] == 'category' ? 'active submenu' : '' }}">
                    <a data-bs-toggle="collapse" href="#category">
                        <i class="fas fa-copy"></i>
                        <p>Category</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse {{ $menu['group'] == 'category' ? 'show' : '' }}" id="category">
                        <ul class="nav nav-collapse">
                            @can('category:browse')
                            <li class="{{ $menu['active'] == 'category' ? 'active' : '' }}"><a href="{{ route('admin.category.index') }}"><span class="sub-item">Category</span></a></li>
                            @endcan
                            @can('tag:browse')
                            <li class="{{ $menu['active'] == 'tag' ? 'active' : '' }}"><a href="{{ route('admin.tag.index') }}"><span class="sub-item">Tag</span></a></li>
                            @endcan
                        </ul>
                    </div>
                </li>
                @endcanany

                @canany(['cart:browse', 'order:browse', 'invoice:browse'])
                <li class="nav-item {{ $menu['group'] == 'invoice' ? 'active submenu' : '' }}">
                    <a data-bs-toggle="collapse" href="#invoice">
                        <i class="fas fa-shopping-cart"></i>
                        <p>Invoice</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse {{ $menu['group'] == 'invoice' ? 'show' : '' }}" id="invoice">
                        <ul class="nav nav-collapse">
                            @can('cart:browse')
                            <li class="{{ $menu['active'] == 'cart' ? 'active' : '' }}"><a href="{{ route('admin.cart.index') }}"><span class="sub-item">Cart</span></a></li>
                            @endcan
                            @can('order:browse')
                            <li class="{{ $menu['active'] == 'order' ? 'active' : '' }}"><a href="{{ route('admin.order.index') }}"><span class="sub-item">Order</span></a></li>
                            @endcan
                            @can('invoice:browse')
                            <li class="{{ $menu['active'] == 'invoice' ? 'active' : '' }}"><a href="{{ route('admin.invoice.index') }}"><span class="sub-item">Invoice</span></a></li>
                            @endcan
                        </ul>
                    </div>
                </li>
                @endcan

                @canany(['promotion:browse', 'sale:browse', 'voucher:browse', 'gift:browse'])
                <li class="nav-item {{ $menu['group'] == 'promotion' ? 'active submenu' : '' }}">
                    <a data-bs-toggle="collapse" href="#promotion">
                        <i class="fas fa-bullhorn"></i>
                        <p>Promotion</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse {{ $menu['group'] == 'promotion' ? 'show' : '' }}" id="promotion">
                        <ul class="nav nav-collapse">
                            @can('promotion:browse')
                            <li class="{{ $menu['active'] == 'promotion' ? 'active' : '' }}"><a href="{{ route('admin.promotion.index') }}"><span class="sub-item">Promotion</span></a></li>
                            @endcan
                            @can('sale:browse')
                            <li class="{{ $menu['active'] == 'sale' ? 'active' : '' }}"><a href="{{ route('admin.sale.index') }}"><span class="sub-item">Sale Off</span></a></li>
                            @endcan
                            @can('voucher:browse')
                            <li class="{{ $menu['active'] == 'voucher' ? 'active' : '' }}"><a href="{{ route('admin.voucher.index') }}"><span class="sub-item">Voucher</span></a></li>
                            @endcan
                            @can('gift:browse')
                            <li class="{{ $menu['active'] == 'gift' ? 'active' : '' }}"><a href="{{ route('admin.gift.index') }}"><span class="sub-item">Gift</span></a></li>
                            @endcan
                        </ul>
                    </div>
                </li>
                @endcanany

                @canany(['transporter:browse', 'transport_fee:browse', 'area:browse', 'city:browse'])
                <li class="nav-item {{ $menu['group'] == 'transport' ? 'active submenu' : '' }}">
                    <a data-bs-toggle="collapse" href="#transport">
                        <i class="fas fa-truck"></i>
                        <p>Transport</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse {{ $menu['group'] == 'transport' ? 'show' : '' }}" id="transport">
                        <ul class="nav nav-collapse">
                            @can('transporter:browse')
                            <li class="{{ $menu['active'] == 'transporter' ? 'active' : '' }}"><a href="{{ route('admin.transporter.index') }}"><span class="sub-item">Transporter</span></a></li>
                            @endcan
                            @can('transport_fee:browse')
                            <li class="{{ $menu['active'] == 'transport_fee' ? 'active' : '' }}"><a href="{{ route('admin.transport_fee.index') }}"><span class="sub-item">Transport Fee</span></a></li>
                            @endcan
                            @can('area:browse')
                            <li class="{{ $menu['active'] == 'area' ? 'active' : '' }}"><a href="{{ route('admin.area.index') }}"><span class="sub-item">Area</span></a></li>
                            @endcan
                            @can('city:browse')
                            <li class="{{ $menu['active'] == 'city' ? 'active' : '' }}"><a href="{{ route('admin.city.index') }}"><span class="sub-item">City</span></a></li>
                            @endcan
                        </ul>
                    </div>
                </li>
                @endcanany

                @canany(['user:browse', 'role:browse', 'permission:browse', 'config:browse', 'theme:browse'])
                <li class="nav-section">
                    <span class="sidebar-mini-icon">
                        <i class="fa fa-ellipsis-h"></i>
                    </span>
                    <h4 class="text-section">System</h4>
                </li>
                @endcanany

                @canany(['user:browse', 'role:browse', 'permission:browse'])
                <li class="nav-item {{ $menu['group'] == 'user' ? 'active submenu' : '' }}">
                    <a data-bs-toggle="collapse" href="#user">
                        <i class="fas fa-user"></i>
                        <p>User</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse {{ $menu['group'] == 'user' ? 'show' : '' }}" id="user">
                        <ul class="nav nav-collapse">
                            @can('user:browse')
                            <li class="{{ $menu['active'] == 'user' ? 'active' : '' }}"><a href="{{ route('admin.user.index') }}"><span class="sub-item">User</span></a></li>
                            @endcan
                            @can('role:browse')
                            <li class="{{ $menu['active'] == 'role' ? 'active' : '' }}"><a href="{{ route('admin.role.index') }}"><span class="sub-item">Role</span></a></li>
                            @endcan
                            @can('permission:role')
                            <li class="{{ $menu['active'] == 'permission' ? 'active' : '' }}"><a href="{{ route('admin.permission.index') }}"><span class="sub-item">Permission</span></a></li>
                            @endcan
                        </ul>
                    </div>
                </li>
                @endcanany

                <li class="nav-item">
                    <a href="#">
                        <i class="fas fa-cog"></i>
                        <p>Config</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.theme.index') }}">
                        <i class="fas fa-paper-plane"></i>
                        <p>Theme</p>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>