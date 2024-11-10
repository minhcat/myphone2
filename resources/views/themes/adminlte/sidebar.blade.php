@php
  $menu = isset($menu) ? $menu : ['group' => '', 'active' => ''];
@endphp

<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">

<!-- sidebar: style can be found in sidebar.less -->
<section class="sidebar">

  <!-- Sidebar user panel (optional) -->
  <div class="user-panel">
    <div class="pull-left image">
      <img src="{{ asset('themes/adminlte/dist/img/avatar5.png') }}" class="img-circle" alt="User Image">
    </div>
    <div class="pull-left info">
      <p>{{ Auth::user()->fullname }}</p>
      <!-- Status -->
      <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
    </div>
  </div>

  <!-- Sidebar Menu -->
  <ul class="sidebar-menu" data-widget="tree">
    @canany([
      'product:browse', 'attribute:browse', 'specification:browse', 'brand:browse',
      'category:browse', 'tag:browse',
      'cart:browse', 'order:browse', 'invoice:browse',
      'promotion:browse', 'sale:browse', 'voucher:browse', 'gift:browse',
      'transporter:browse', 'transport_fee:browse', 'area:browse', 'city:browse'
    ])
    <li class="header">CONTENT</li>
    @endcanany

    <!-- Optionally, you can add icons to the links -->
    @canany(['product:browse', 'attribute:browse', 'specification:browse', 'brand:browse'])
    <li class="treeview {{ $menu['group'] == 'product' ? 'menu-open' : '' }}">
      <a href="#"><i class="fa fa-laptop"></i> <span>Product</span>
        <span class="pull-right-container">
          <i class="fa fa-angle-left pull-right"></i>
        </span>
      </a>
      <ul class="treeview-menu" {!! $menu['group'] == 'product' ? 'style="display: block"' : '' !!}>
        @can('product:browse')
        <li class="{{ $menu['active'] == 'product' ? 'active' : '' }}"><a href="{{ route('admin.product.index') }}">Product</a></li>
        @endcan
        @can('attribute:browse')
        <li class="{{ $menu['active'] == 'attribute' ? 'active' : '' }}"><a href="{{ route('admin.attribute.index') }}">Attribute</a></li>
        @endcan
        @can('specification:browse')
        <li class="{{ $menu['active'] == 'specification' ? 'active' : '' }}"><a href="{{ route('admin.specification.index') }}">Specification</a></li>
        @endcan
        @can('brand:browse')
        <li class="{{ $menu['active'] == 'brand' ? 'active' : '' }}"><a href="{{ route('admin.brand.index') }}">Brand</a></li>
        @endcan
      </ul>
    </li>
    @endcanany

    @canany(['category:browse', 'tag:browse'])
    <li class="treeview {{ $menu['group'] == 'category' ? 'menu-open' : '' }}">
      <a href="#"><i class="fa fa-copy"></i> <span>Category</span>
        <span class="pull-right-container">
          <i class="fa fa-angle-left pull-right"></i>
        </span>
      </a>
      <ul class="treeview-menu" {!! $menu['group'] == 'category' ? 'style="display: block"' : '' !!}>
        @can('category:browse')
        <li class="{{ $menu['active'] == 'category' ? 'active' : '' }}"><a href="{{ route('admin.category.index') }}">Category</a></li>
        @endcan
        @can('tag:browse')
        <li class="{{ $menu['active'] == 'tag' ? 'active' : '' }}"><a href="{{ route('admin.tag.index') }}">Tag</a></li>
        @endcan
      </ul>
    </li>
    @endcanany

    @canany(['cart:browse', 'order:browse', 'invoice:browse'])
    <li class="treeview {{ $menu['group'] == 'invoice' ? 'menu-open' : '' }}">
      <a href="#"><i class="fa fa-shopping-cart"></i> <span>Invoice</span>
        <span class="pull-right-container">
          <i class="fa fa-angle-left pull-right"></i>
        </span>
      </a>
      <ul class="treeview-menu" {!! $menu['group'] == 'invoice' ? 'style="display: block"' : '' !!}>
        @can('cart:browse')
        <li class="{{ $menu['active'] == 'cart' ? 'active' : '' }}"><a href="{{ route('admin.cart.index') }}">Cart</a></li>
        @endcan
        @can('order:browse')
        <li class="{{ $menu['active'] == 'order' ? 'active' : '' }}"><a href="{{ route('admin.order.index') }}">Order</a></li>
        @endcan
        @can('invoice:browse')
        <li class="{{ $menu['active'] == 'invoice' ? 'active' : '' }}"><a href="{{ route('admin.invoice.index') }}">Invoice</a></li>
        @endcan
      </ul>
    </li>
    @endcanany

    @canany(['promotion:browse', 'sale:browse', 'voucher:browse', 'gift:browse'])
    <li class="treeview {{ $menu['group'] == 'promotion' ? 'menu-open' : '' }}">
      <a href="#"><i class="fa fa-bullhorn"></i> <span>Promotion</span>
        <span class="pull-right-container">
          <i class="fa fa-angle-left pull-right"></i>
        </span>
      </a>
      <ul class="treeview-menu" {!! $menu['group'] == 'promotion' ? 'style="display: block"' : '' !!}>
        @can('promotion:browse')
        <li class="{{ $menu['active'] == 'promotion' ? 'active' : '' }}"><a href="{{ route('admin.promotion.index') }}">Promotion</a></li>
        @endcan
        @can('sale:browse')
        <li class="{{ $menu['active'] == 'sale' ? 'active' : '' }}"><a href="{{ route('admin.sale.index') }}">Sale Off</a></li>
        @endcan
        @can('voucher:browse')
        <li class="{{ $menu['active'] == 'voucher' ? 'active' : '' }}"><a href="{{ route('admin.voucher.index') }}">Voucher</a></li>
        @endcan
        @can('gift:browse')
        <li class="{{ $menu['active'] == 'gift' ? 'active' : '' }}"><a href="{{ route('admin.gift.index') }}">Gift</a></li>
        @endcan
      </ul>
    </li>
    @endcanany

    @canany(['transporter:browse', 'transport_fee:browse', 'area:browse', 'city:browse'])
    <li class="treeview {{ $menu['group'] == 'transport' ? 'menu-open' : '' }}">
      <a href="#"><i class="fa fa-truck"></i> <span>Transport</span>
        <span class="pull-right-container">
          <i class="fa fa-angle-left pull-right"></i>
        </span>
      </a>
      <ul class="treeview-menu" {!! $menu['group'] == 'transport' ? 'style="display: block"' : '' !!}>
        @can('transporter:browse')
        <li class="{{ $menu['active'] == 'transporter' ? 'active' : '' }}"><a href="{{ route('admin.transporter.index') }}">Transporter</a></li>
        @endcan
        @can('transport_fee:browse')
        <li class="{{ $menu['active'] == 'transport_fee' ? 'active' : '' }}"><a href="{{ route('admin.transport_fee.index') }}">Transport Fee</a></li>
        @endcan
        @can('area:browse')
        <li class="{{ $menu['active'] == 'area' ? 'active' : '' }}"><a href="{{ route('admin.area.index') }}">Area</a></li>
        @endcan
        @can('city:browse')
        <li class="{{ $menu['active'] == 'city' ? 'active' : '' }}"><a href="{{ route('admin.city.index') }}">City</a></li>
        @endcan
      </ul>
    </li>
    @endcanany

    @canany(['user:browse', 'role:browse', 'permission:browse', 'config:browse', 'theme:browse'])
    <li class="header">SYSTEM</li>
    @endcanany

    @canany(['user:browse', 'role:browse', 'permission:browse'])
    <li class="treeview {{ $menu['group'] == 'user' ? 'menu-open' : '' }}">
      <a href="#"><i class="fa fa-user"></i> <span>User</span>
        <span class="pull-right-container">
          <i class="fa fa-angle-left pull-right"></i>
        </span>
      </a>
      <ul class="treeview-menu" {!! $menu['group'] == 'user' ? 'style="display: block"' : '' !!}>
        @can('user:browse')
        <li class="{{ $menu['active'] == 'user' ? 'active' : '' }}"><a href="{{ route('admin.user.index') }}">User</a></li>
        @endcan
        @can('role:browse')
        <li class="{{ $menu['active'] == 'role' ? 'active' : '' }}"><a href="{{ route('admin.role.index') }}">Role</a></li>
        @endcan
        @can('permission:browse')
        <li class="{{ $menu['active'] == 'permission' ? 'active' : '' }}"><a href="{{ route('admin.permission.index') }}">Permission</a></li>
        @endcan
      </ul>
    </li>
    @endcanany

    <li><a href="#"><i class="fa fa-gear"></i> <span>Config</span></a></li>
    <li><a href="#"><i class="fa fa-paper-plane"></i> <span>Theme</span></a></li>
  </ul>
  <!-- /.sidebar-menu -->
</section>
<!-- /.sidebar -->
</aside>