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
      <p>Minh Cát</p>
      <!-- Status -->
      <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
    </div>
  </div>

  <!-- Sidebar Menu -->
  <ul class="sidebar-menu" data-widget="tree">
    <li class="header">CONTENT</li>
    <!-- Optionally, you can add icons to the links -->
    <li class="treeview {{ $menu['group'] == 'product' ? 'menu-open' : '' }}">
      <a href="#"><i class="fa fa-laptop"></i> <span>Product</span>
        <span class="pull-right-container">
          <i class="fa fa-angle-left pull-right"></i>
        </span>
      </a>
      <ul class="treeview-menu" {!! $menu['group'] == 'product' ? 'style="display: block"' : '' !!}>
        <li class="{{ $menu['active'] == 'product' ? 'active' : '' }}"><a href="{{ route('admin.product.index') }}">Product</a></li>
        <li class="{{ $menu['active'] == 'attribute' ? 'active' : '' }}"><a href="{{ route('admin.attribute.index') }}">Attribute</a></li>
        <li class="{{ $menu['active'] == 'specification' ? 'active' : '' }}"><a href="{{ route('admin.specification.index') }}">Specification</a></li>
        <li class="{{ $menu['active'] == 'brand' ? 'active' : '' }}"><a href="{{ route('admin.brand.index') }}">Brand</a></li>
      </ul>
    </li>
    <li class="treeview {{ $menu['group'] == 'category' ? 'menu-open' : '' }}">
      <a href="#"><i class="fa fa-copy"></i> <span>Category</span>
        <span class="pull-right-container">
          <i class="fa fa-angle-left pull-right"></i>
        </span>
      </a>
      <ul class="treeview-menu" {!! $menu['group'] == 'category' ? 'style="display: block"' : '' !!}>
        <li class="{{ $menu['active'] == 'category' ? 'active' : '' }}"><a href="{{ route('admin.category.index') }}">Category</a></li>
        <li class="{{ $menu['active'] == 'tag' ? 'active' : '' }}"><a href="{{ route('admin.tag.index') }}">Tag</a></li>
      </ul>
    </li>
    <li class="treeview {{ $menu['group'] == 'invoice' ? 'menu-open' : '' }}">
      <a href="#"><i class="fa fa-shopping-cart"></i> <span>Invoice</span>
        <span class="pull-right-container">
          <i class="fa fa-angle-left pull-right"></i>
        </span>
      </a>
      <ul class="treeview-menu" {!! $menu['group'] == 'invoice' ? 'style="display: block"' : '' !!}>
        <li class="{{ $menu['active'] == 'cart' ? 'active' : '' }}"><a href="{{ route('admin.cart.index') }}">Cart</a></li>
        <li class="{{ $menu['active'] == 'order' ? 'active' : '' }}"><a href="{{ route('admin.order.index') }}">Order</a></li>
        <li class="{{ $menu['active'] == 'invoice' ? 'active' : '' }}"><a href="{{ route('admin.invoice.index') }}">Invoice</a></li>
      </ul>
    </li>
    <li class="treeview {{ $menu['group'] == 'promotion' ? 'menu-open' : '' }}">
      <a href="#"><i class="fa fa-bullhorn"></i> <span>Promotion</span>
        <span class="pull-right-container">
          <i class="fa fa-angle-left pull-right"></i>
        </span>
      </a>
      <ul class="treeview-menu" {!! $menu['group'] == 'promotion' ? 'style="display: block"' : '' !!}>
        <li class="{{ $menu['active'] == 'promotion' ? 'active' : '' }}"><a href="{{ route('admin.promotion.index') }}">Promotion</a></li>
        <li class="{{ $menu['active'] == 'sale' ? 'active' : '' }}"><a href="{{ route('admin.sale.index') }}">Sale Off</a></li>
        <li class="{{ $menu['active'] == 'voucher' ? 'active' : '' }}"><a href="{{ route('admin.voucher.index') }}">Voucher</a></li>
        <li class="{{ $menu['active'] == 'gift' ? 'active' : '' }}"><a href="{{ route('admin.gift.index') }}">Gift</a></li>
      </ul>
    </li>
    <li class="treeview {{ $menu['group'] == 'transport' ? 'menu-open' : '' }}">
      <a href="#"><i class="fa fa-truck"></i> <span>Transport</span>
        <span class="pull-right-container">
          <i class="fa fa-angle-left pull-right"></i>
        </span>
      </a>
      <ul class="treeview-menu" {!! $menu['group'] == 'transport' ? 'style="display: block"' : '' !!}>
        <li class="{{ $menu['active'] == 'transporter' ? 'active' : '' }}"><a href="#">Transporter</a></li>
        <li class="{{ $menu['active'] == 'area' ? 'active' : '' }}"><a href="#">Area</a></li>
        <li class="{{ $menu['active'] == 'city' ? 'active' : '' }}"><a href="{{ route('admin.city.index') }}">City</a></li>
      </ul>
    </li>

    <li class="header">SYSTEM</li>
    <li class="treeview {{ $menu['group'] == 'user' ? 'menu-open' : '' }}">
      <a href="#"><i class="fa fa-user"></i> <span>User</span>
        <span class="pull-right-container">
          <i class="fa fa-angle-left pull-right"></i>
        </span>
      </a>
      <ul class="treeview-menu" {!! $menu['group'] == 'user' ? 'style="display: block"' : '' !!}>
        <li class="{{ $menu['active'] == 'user' ? 'active' : '' }}"><a href="{{ route('admin.user.index') }}">User</a></li>
        <li><a href="#">Role</a></li>
        <li><a href="#">Permission</a></li>
      </ul>
    </li>
    <li><a href="#"><i class="fa fa-gear"></i> <span>Config</span></a></li>
    <li><a href="#"><i class="fa fa-paper-plane"></i> <span>Theme</span></a></li>
  </ul>
  <!-- /.sidebar-menu -->
</section>
<!-- /.sidebar -->
</aside>