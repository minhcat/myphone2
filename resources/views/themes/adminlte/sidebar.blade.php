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
      <ul class="treeview-menu" {!! isset($menu['group']) && $menu['group'] == 'product' ? 'style="display: block"' : '' !!}>
        <li class="{{ isset($menu['active']) && $menu['active'] == 'product' ? 'active' : '' }}"><a href="{{ route('product.index') }}">Product</a></li>
        <li class="{{ isset($menu['active']) && $menu['active'] == 'attribute' ? 'active' : '' }}"><a href="{{ route('attribute.index') }}">Attribute</a></li>
        <li class="{{ isset($menu['active']) && $menu['active'] == 'specification' ? 'active' : '' }}"><a href="{{ route('specification.index') }}">Specification</a></li>
        <li class="{{ isset($menu['active']) && $menu['active'] == 'brand' ? 'active' : '' }}"><a href="{{ route('brand.index') }}">Brand</a></li>
      </ul>
    </li>
    <li class="treeview">
      <a href="#"><i class="fa fa-copy"></i> <span>Category</span>
        <span class="pull-right-container">
          <i class="fa fa-angle-left pull-right"></i>
        </span>
      </a>
      <ul class="treeview-menu" {!! isset($menu['group']) && $menu['group'] == 'category' ? 'style="display: block"' : '' !!}>
        <li class="{{ isset($menu['active']) && $menu['active'] == 'category' ? 'active' : '' }}"><a href="{{ route('category.index') }}">Category</a></li>
        <li class="{{ isset($menu['active']) && $menu['active'] == 'tag' ? 'active' : '' }}"><a href="{{ route('tag.index') }}">Tag</a></li>
      </ul>
    </li>
    <li class="treeview">
      <a href="#"><i class="fa fa-shopping-cart"></i> <span>Invoice</span>
        <span class="pull-right-container">
          <i class="fa fa-angle-left pull-right"></i>
        </span>
      </a>
      <ul class="treeview-menu" {!! isset($menu['group']) && $menu['group'] == 'invoice' ? 'style="display: block"' : '' !!}>
        <li class="{{ isset($menu['active']) && $menu['active'] == 'cart' ? 'active' : '' }}"><a href="{{ route('cart.index') }}">Cart</a></li>
        <li class="{{ isset($menu['active']) && $menu['active'] == 'order' ? 'active' : '' }}"><a href="{{ route('order.index') }}">Order</a></li>
        <li class="{{ isset($menu['active']) && $menu['active'] == 'invoice' ? 'active' : '' }}"><a href="{{ route('invoice.index') }}">Invoice</a></li>
      </ul>
    </li>
    <li class="treeview">
      <a href="#"><i class="fa fa-bullhorn"></i> <span>Promotion</span>
        <span class="pull-right-container">
          <i class="fa fa-angle-left pull-right"></i>
        </span>
      </a>
      <ul class="treeview-menu">
        <li><a href="#">Promotion</a></li>
        <li><a href="#">Rebation</a></li>
        <li><a href="#">Voucher</a></li>
      </ul>
    </li>
    <li class="treeview">
      <a href="#"><i class="fa fa-truck"></i> <span>Transport</span>
        <span class="pull-right-container">
          <i class="fa fa-angle-left pull-right"></i>
        </span>
      </a>
      <ul class="treeview-menu">
        <li><a href="#">Transporter</a></li>
        <li><a href="#">Area</a></li>
        <li><a href="#">City</a></li>
        <li><a href="#">County</a></li>
        <li><a href="#">Ward</a></li>
      </ul>
    </li>

    <li class="header">SYSTEM</li>
    <li class="treeview {{ isset($menu['group']) && $menu['group'] == 'user' ? 'menu-open' : '' }}">
      <a href="#"><i class="fa fa-user"></i> <span>User</span>
        <span class="pull-right-container">
          <i class="fa fa-angle-left pull-right"></i>
        </span>
      </a>
      <ul class="treeview-menu" {!! isset($menu['group']) && $menu['group'] == 'user' ? 'style="display: block"' : '' !!}>
        <li class="{{ isset($menu['active']) && $menu['active'] == 'user' ? 'active' : '' }}"><a href="{{ route('user.index') }}">User</a></li>
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