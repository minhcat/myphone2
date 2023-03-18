@extends('Adminlte.master')

@section('title-page', 'Admin Page')

@section('content')
<div class="row">
  <div class="col-lg-3 col-xs-6">
    <!-- small box -->
    <div class="small-box bg-blue">
      <div class="inner">
        <h3>150</h3>

        <p>Products</p>
      </div>
      <div class="icon">
        <i class="ion ion-laptop"></i>
      </div>
      <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
    </div>
  </div>
  <!-- ./col -->
  <div class="col-lg-3 col-xs-6">
    <!-- small box -->
    <div class="small-box bg-yellow">
      <div class="inner">
        <h3>53</h3>

        <p>Users</p>
      </div>
      <div class="icon">
        <i class="ion ion-person"></i>
      </div>
      <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
    </div>
  </div>
  <!-- ./col -->
  <div class="col-lg-3 col-xs-6">
    <!-- small box -->
    <div class="small-box bg-maroon">
      <div class="inner">
        <h3>44</h3>

        <p>Invoices</p>
      </div>
      <div class="icon">
        <i class="ion ion-bag"></i>
      </div>
      <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
    </div>
  </div>
  <!-- ./col -->
  <div class="col-lg-3 col-xs-6">
    <!-- small box -->
    <div class="small-box bg-green">
      <div class="inner">
        <h3>65</h3>

        <p>Staff</p>
      </div>
      <div class="icon">
        <i class="ion ion-wrench"></i>
      </div>
      <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
    </div>
  </div>
  <!-- ./col -->
</div>
<div class="row">
  <section class="col-lg-9">
    <div class="box box-primary">
      <div class="box-header">
        <h3 class="box-title">My Profile</h3>
      </div>
      <div class="box-body">
        <p>Fullname: Tạ Minh Cát</p>
        <p>Gender: male</p>
        <p>Age: 24</p>
        <p>Role: admin</p>
        <p>Address: 123 Phạm Văn Đồng, Thủ Đức District, Hồ Chí Minh City</p>
        <p>Description: Lorem ipsum, dolor sit amet consectetur adipisicing elit. Dicta vero quibusdam dolore sapiente recusandae quos ex eligendi doloremque commodi alias, nemo molestiae nam, tempore amet facilis incidunt quia consequatur laborum! Phasellus efficitur mi non odio efficitur, quis imperdiet quam placerat. Pellentesque sed arcu eget neque pretium finibus. Nullam nisi metus, vehicula vel metus a, fringilla posuere ante. Sed eu nibh vel odio hendrerit ultrices. Cras vitae nunc ac sem mollis feugiat. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
      </div>
      <div class="box-footer">
        <button class="btn btn-default">Edit profile</button>
        <button class="btn btn-default">Reset password</button>
      </div>
    </div>
  </section>
  <section class="col-lg-3">
    <div class="box box-solid bg-green-gradient">
      <div class="box-header">
        <i class="fa fa-calendar"></i>
        <h3 class="box-title">Calendar</h3>
      </div>
      <div class="box-body">
        <!--The calendar -->
        <div id="calendar" style="width: 100%"></div>
      </div>
    </div>
  </section>
</div>
@endsection
