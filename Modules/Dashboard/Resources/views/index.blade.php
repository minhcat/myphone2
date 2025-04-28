@extends('dashboard::layouts.master')

@section('title-page', 'Dashboard')

@section('small-info')
<small>Dashboard</small>
@endsection

@section('style')
<link rel="stylesheet" href="{{ asset('modules\dashboard\style.css')}}">
@endsection

@section('breakcumb')
<ol class="breadcrumb">
    <li><a href="{{ route('admin') }}"><i class="fa fa-dashboard"></i> Admin</a></li>
    <li><a href="{{ route('admin.dashboard.index') }}">Dashboard</a></li>
    <li class="active">Index</li>
</ol>
@endsection

@section('content')
<div class="row">
    <div class="col-lg-3">
        <!-- small box -->
        <div class="small-box bg-aqua">
            <div class="inner">
                <h3>150</h3>
                <p>Products Total</p>
            </div>
            <div class="icon">
                <i class="ion ion-android-laptop"></i>
            </div>
            <a href="#" class="small-box-footer"></a>
        </div>
    </div>
    <div class="col-lg-3">
        <!-- small box -->
        <div class="small-box bg-green">
            <div class="inner">
                <h3>300</h3>
                <p>Users Total</p>
            </div>
            <div class="icon">
                <i class="ion ion-android-person"></i>
            </div>
            <a href="#" class="small-box-footer"></a>
        </div>
    </div>
    <div class="col-lg-3">
        <!-- small box -->
        <div class="small-box bg-yellow">
            <div class="inner">
                <h3>600</h3>
                <p>Invoices Total</p>
            </div>
            <div class="icon">
                <i class="ion ion-android-cart"></i>
            </div>
            <a href="#" class="small-box-footer"></a>
        </div>
    </div>
    <div class="col-lg-3">
        <!-- small box -->
        <div class="small-box bg-red">
            <div class="inner">
                <h3>900</h3>
                <p>Visitors Total</p>
            </div>
            <div class="icon">
                <i class="ion ion-eye"></i>
            </div>
            <a href="#" class="small-box-footer"></a>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-6">
        <div class="box box-primary">
            <div class="box-header with-border">
                <div class="box-title">View Chart</div>
                <div class="btn-group pull-right" data-active="btn-primary">
                    <button class="btn btn-primary" data-chart="#viewYearlyChart">Yearly</button>
                    <button class="btn btn-default" data-chart="#viewMonthlyChart">Monthly</button>
                    <button class="btn btn-default" data-chart="#viewWeeklyChart">Weekly</button>
                </div>
            </div>
            <div class="box-body">
                <div class="chart">
                    <div id="viewYearlyChart" class="chart-block">
                        <canvas style="height:250px"></canvas>
                    </div>
                    <div id="viewMonthlyChart" class="chart-block">
                        <canvas style="height:250px"></canvas>
                    </div>
                    <div id="viewWeeklyChart" class="chart-block">
                        <canvas style="height:250px"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-6">
        <div class="box box-primary">
            <div class="box-header with-border">
                <div class="box-title">Sell Chart</div>
                <div class="btn-group pull-right" data-active="btn-success">
                    <button class="btn btn-default" data-chart="#sellYearlyChart">Yearly</button>
                    <button class="btn btn-success" data-chart="#sellMonthlyChart">Monthly</button>
                    <button class="btn btn-default" data-chart="#sellWeeklyChart">Weekly</button>
                </div>
            </div>
            <div class="box-body">
                <div class="chart">
                    <div id="sellYearlyChart" class="chart-block">
                        <canvas style="height:250px"></canvas>
                    </div>
                    <div id="sellMonthlyChart" class="chart-block">
                        <canvas style="height:250px"></canvas>
                    </div>
                    <div id="sellWeeklyChart" class="chart-block">
                        <canvas style="height:250px"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-6">
        <div class="box box-primary">
            <div class="box-header with-border">
                <div class="box-title">Transition History</div>
            </div>
            <div class="box-body">
                <div class="table-body">
                    <table class="table table-bordered table-striped table-fix mt-3">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Item</th>
                                <th>Day</th>
                                <th>Week</th>
                                <th>Month</th>
                                <th>Year</th>
                            </tr>
                        </thead>
                        <tbody class="tbody-loading">
                            <tr>
                                <td>1</td>
                                <td>Products</td>
                                <td>+2</td>
                                <td>+5</td>
                                <td>+15</td>
                                <td>+50</td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>Users</td>
                                <td>+0</td>
                                <td>+1</td>
                                <td>+5</td>
                                <td>+20</td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td>Invoices</td>
                                <td>+5</td>
                                <td>+15</td>
                                <td>+45</td>
                                <td>+150</td>
                            </tr>
                            <tr>
                                <td>4</td>
                                <td>Promotions</td>
                                <td>+1</td>
                                <td>+4</td>
                                <td>+16</td>
                                <td>+50</td>
                            </tr>
                            <tr>
                                <td>5</td>
                                <td>Visitors</td>
                                <td>+20</td>
                                <td>+50</td>
                                <td>+150</td>
                                <td>+500</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="table-footer mt-3">
                    <div class="row">
                        <div class="col-lg-12">
                            <ul class="pagination pagination-sm mb-0 pull-right">
					            <li class="disabled"><span>&lt;&lt;</span></li>
			                    <li class="disabled"><span>&lt;</span></li>
							    <li class="active"><span>1</span></li>
							    <li><a href="#">2</a></li>
							    <li><a href="#">3</a></li>
							    <li class="disabled"><span><i class="fa fa-ellipsis-h"></i></span></li>
							    <li><a href="#">22</a></li>
					            <li><a href="#">&gt;</a></li>
                                <li><a href="#" rel="next">&gt;&gt;</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3">
        <div class="box box-primary">
            <div class="box-header with-border">
                <div class="box-title">Best Customers</div>
            </div>
            <div class="box-body">
                <div class="table-body">
                    <table class="table table-bordered table-striped table-fix mt-3">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>User</th>
                                <th>Area</th>
                                <th>Orders</th>
                                <th>Total</th>
                            </tr>
                        </thead>
                        <tbody class="tbody-loading">
                            <tr>
                                <td>1</td>
                                <td>Nguyễn Văn Bình</td>
                                <td>HCM</td>
                                <td>50</td>
                                <td>150,000,000</td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>Trần Ngọc Anh</td>
                                <td>HN</td>
                                <td>45</td>
                                <td>145,000,000</td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td>Phạm Thúy Hằng</td>
                                <td>HN</td>
                                <td>40</td>
                                <td>125,000,000</td>
                            </tr>
                            <tr>
                                <td>4</td>
                                <td>Võ Văn Đô</td>
                                <td>ĐN</td>
                                <td>35</td>
                                <td>105,000,000</td>
                            </tr>
                            <tr>
                                <td>5</td>
                                <td>Hoàng Tuấn</td>
                                <td>BG</td>
                                <td>32</td>
                                <td>95,000,000</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="table-footer mt-3">
                    <div class="row">
                        <div class="col-lg-12">
                            <ul class="pagination pagination-sm mb-0 pull-right">
					            <li class="disabled"><span>&lt;&lt;</span></li>
			                    <li class="disabled"><span>&lt;</span></li>
							    <li class="active"><span>1</span></li>
							    <li><a href="#">2</a></li>
							    <li><a href="#">3</a></li>
							    <li class="disabled"><span><i class="fa fa-ellipsis-h"></i></span></li>
							    <li><a href="#">22</a></li>
					            <li><a href="#">&gt;</a></li>
                                <li><a href="#" rel="next">&gt;&gt;</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3">
        <div class="box box-primary">
            <div class="box-header with-border">
                <div class="box-title">Best Selling Products</div>
            </div>
            <div class="box-body">
                <div class="table-body">
                    <table class="table table-bordered table-striped table-fix mt-3">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Product</th>
                                <th>Brand</th>
                                <th>Orders</th>
                                <th>Total</th>
                            </tr>
                        </thead>
                        <tbody class="tbody-loading">
                            <tr>
                                <td>1</td>
                                <td>Iphone 15 Promax</td>
                                <td>Apple</td>
                                <td>150</td>
                                <td>250,000,000</td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>Samsung Galaxy S4</td>
                                <td>Samsung</td>
                                <td>135</td>
                                <td>245,000,000</td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td>Xiaomi Redmi 3</td>
                                <td>Xiaomi</td>
                                <td>110</td>
                                <td>225,000,000</td>
                            </tr>
                            <tr>
                                <td>4</td>
                                <td>Lenovo Ideapad 5</td>
                                <td>Lenovo</td>
                                <td>85</td>
                                <td>205,000,000</td>
                            </tr>
                            <tr>
                                <td>5</td>
                                <td>Ipad 5</td>
                                <td>Apple</td>
                                <td>72</td>
                                <td>195,000,000</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="table-footer mt-3">
                    <div class="row">
                        <div class="col-lg-12">
                            <ul class="pagination pagination-sm mb-0 pull-right">
					            <li class="disabled"><span>&lt;&lt;</span></li>
			                    <li class="disabled"><span>&lt;</span></li>
							    <li class="active"><span>1</span></li>
							    <li><a href="#">2</a></li>
							    <li><a href="#">3</a></li>
							    <li class="disabled"><span><i class="fa fa-ellipsis-h"></i></span></li>
							    <li><a href="#">22</a></li>
					            <li><a href="#">&gt;</a></li>
                                <li><a href="#" rel="next">&gt;&gt;</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="box box-primary">
            <div class="box-header with-border">
                <div class="box-title">Earning Reports</div>
            </div>
            <div class="box-body p3">
                <div class="d-flex gap-2 justify-between">
                    <div class="box-item box-profit bg-primary text-center">
                        <div class="box-content">
                            <h4>Total Earnings</h4>
                            <p>1,500,000,000 vnđ</p>
                        </div>
                    </div>
                    <div class="box-item box-profit bg-green text-center">
                        <div class="box-content">
                            <h4>Total Profit</h4>
                            <p>1,500,000,000 vnđ</p>
                        </div>
                    </div>
                    <div class="box-item box-profit bg-red text-center">
                        <div class="box-content">
                            <h4>Total Expense</h4>
                            <p>1,500,000,000 vnđ</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="box box-primary">
            <div class="box-header with-border">
                <div class="box-title">Orders Reports</div>
            </div>
            <div class="box-body p3">
                <div class="d-flex gap-2 justify-between">
                    <div class="box-item box-profit bg-aqua text-center">
                        <div class="box-content">
                            <h4>Order Completed</h4>
                            <p>1,500</p>
                        </div>
                    </div>
                    <div class="box-item box-profit bg-purple text-center">
                        <div class="box-content">
                            <h4>Order Cancelled</h4>
                            <p>500</p>
                        </div>
                    </div>
                    <div class="box-item box-profit bg-yellow text-center">
                        <div class="box-content">
                            <h4>Order Pending</h4>
                            <p>200</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="box box-primary">
            <div class="box-header with-border">
                <div class="box-title">Transport Reports</div>
            </div>
            <div class="box-body p3">
                <div class="d-flex gap-2 justify-between">
                    <div class="box-item box-profit bg-teal text-center">
                        <div class="box-content">
                            <h4>Inner City</h4>
                            <p>2,500</p>
                        </div>
                    </div>
                    <div class="box-item box-profit bg-navy text-center">
                        <div class="box-content">
                            <h4>Outer City</h4>
                            <p>1500</p>
                        </div>
                    </div>
                    <div class="box-item box-profit bg-maroon text-center">
                        <div class="box-content">
                            <h4>Other Province</h4>
                            <p>500</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@push('script')
<!-- ChartJS -->
<script src="{{ asset('themes/adminlte/vendor/chart.js/Chart.js') }}"></script>
<!-- Dashboard Script -->
<script src="{{ asset('modules/dashboard/script.js') }}"></script>
@endpush
