						@extends('layouts.master')
						@section('page-header')
						<!--Page header-->
						<div class="page-header">
							<div class="page-leftheader">
								{{-- <h4 class="page-title mb-0">Hi! Welcome Back</h4> --}}
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="#"><i class="fe fe-home mr-2 fs-14"></i>Home</a></li>
									<li class="breadcrumb-item active" aria-current="page"><a href="{{url('/admin/dashboard' )}}">Sales Dashboard</a></li>
								</ol>
							</div>
							<div class="page-rightheader">
								<div class="btn btn-list d-flex">
									 

										<form method="post"  action="{{url('/admin/dashboard')}}" class="d-hide" >
										@csrf
											From : <input id="datepicker" class="form-control" type="date"    name="from" style=" height: 40px;width:35%;display:inline-block ;"  />
											To : <input id="datepicker" class="form-control" type="date"    name="to"   style=" height: 40px;width: 35%;display:inline-block ;"   />
											<button type="submit" class="btn btn-success mb-3" ><i class="fa fa-search" aria-hidden="true"></i> </button>
											 </form>
			
									<a href="{{url('/' )}}" class="btn btn-info"><i class="fe fe-download mr-1"></i>  Download all sales </a>
									<a href="{{url('/' )}}" class="btn btn-warning"><i class="fe fe-download mr-1"></i>  Download Last Week sales </a> 
								</div>
							</div>
						</div>
						<!--End Page header-->
						@endsection
						@section('content')						
						<!-- Row-1 -->
						@php 
						$sales_of_month =0;
						$sum_sales =0;
						$total_orders =count($orders);
						$orders_of_month =0;
						$total_canceled =0;
						$total_pending =0;
						$total_confirm =0;
						$total_products_sold =0;
						 
							foreach($orders as $order){
								if ( \Carbon\Carbon::now()->month  == date_format(date_create($order->order_created), 'm')) {
										//confirmed  order of this month
											$orders_of_month += 1;

										}
									 if($order->status == 1 ){
										// Order Confirmed
									//	$total_confirm += 1;
										$sum_sales += ($order->price * $order->quantity);
										$total_products_sold += $order->quantity;
										if (\Carbon\Carbon::now()->month  == date_format(date_create($order->order_created), 'm')) {
										 // order of this month
										 $total_confirm += 1;
										$sales_of_month += ($order->price * $order->quantity);
										
									}


									}
									if($order->status == 2 && \Carbon\Carbon::now()->month  == date_format(date_create($order->order_created), 'm')){
										//order pending
										$total_pending +=1;
									}
									if($order->status == 3 && \Carbon\Carbon::now()->month  == date_format(date_create($order->order_created), 'm')){
									//order canceled
									$total_canceled +=1;
									}
									
									

									 

							}

						@endphp
						<div class="row">
							<div class="col-xl-3 col-lg-6 col-md-6 col-xm-12">
								<div class="card overflow-hidden dash1-card border-0">
									<div class="card-body">
										<p class=" mb-1 ">Total Sales</p>
										<h2 class="mb-1 number-font">{{ number_format($sum_sales,0)}}</h2>
										<small class="fs-12 text-muted">From the Begging</small>
										<span class="ratio bg-light text-warning">ALL</span>
										{{-- <span class="ratio-text text-muted">Goals Reached</span> --}}
									</div>
									{{-- <div id="spark1"></div> --}}
								</div>
							</div>
							<div class="col-xl-3 col-lg-6 col-md-6 col-xm-12">
								<div class="card overflow-hidden dash1-card border-0">
									<div class="card-body">
										<p class=" mb-1 ">Sales of Month</p>
										<h2 class="mb-1 number-font">{{ number_format($sales_of_month,0)}}</h2>
										<small class="fs-12 text-muted">Sale of {{ date("M Y") }}</small>
										<span class="ratio bg-info">{{ date("M Y") }}</span>
										
									</div>
									{{-- <div id="spark2"></div> --}}
								</div>
							</div>
							<div class="col-xl-3 col-lg-6 col-md-6 col-xm-12">
								<div class="card overflow-hidden dash1-card border-0">
									<div class="card-body">
										<p class=" mb-1 ">Total Orders</p>
										<h2 class="mb-1 number-font">{{ number_format($total_orders,0)}}</h2>
										<small class="fs-12 text-muted">Total Orders from the begging</small>
										<span class="ratio bg-secondary">
											
										All
										
										</span> 
									</div>
									{{-- <div id="spark3"></div> --}}
								</div>
							</div>
							<div class="col-xl-3 col-lg-6 col-md-6 col-xm-12">
								<div class="card overflow-hidden dash1-card border-0">
									<div class="card-body">
										<p class=" mb-1 ">Total Orders</p>
										<h2 class="mb-1 number-font">{{ number_format($orders_of_month,0)}}</h2>
										<small class="fs-12 text-muted">Orders in {{ date("M Y") }}</small>
										<span class="ratio bg-warning">{{ date("M") }}</span>
										
									</div>
									{{-- <div id="spark3"></div> --}}
								</div>
							</div>
							<div class="col-xl-3 col-lg-6 col-md-6 col-xm-12">
								<div class="card overflow-hidden dash1-card border-0">
									<div class="card-body">
										<p class=" mb-1">Confirmed Orders</p>
										<h2 class="mb-1 number-font">{{ number_format($total_confirm,0)}}</h2>
										<small class="fs-12 text-muted">Confirmed Order in {{ date("M Y") }}</small>
										<span class="ratio bg-success">
											@php

												if($orders_of_month > 0 && $total_confirm > 0){
													echo  number_format((($total_confirm/$orders_of_month)*100),0)."%";
												}else{
													echo "None";
												}

											@endphp

										</span>
										
									</div>
									{{-- <div id="spark4"></div> --}}
								</div>
							</div>
							<div class="col-xl-3 col-lg-6 col-md-6 col-xm-12">
								<div class="card overflow-hidden dash1-card border-0">
									<div class="card-body">
										<p class=" mb-1">Pending Orders</p>
										<h2 class="mb-1 number-font">{{ number_format($total_pending,0)}}</h2>
										<small class="fs-12 text-muted">Pending orders in {{ date("M Y") }}</small>
										<span class="ratio bg-default">
											@php

												if($orders_of_month > 0 && $total_pending >0 ){
													echo number_format((($total_pending/$orders_of_month)*100),0)."%";
												}else{
													echo "None";
												}

											@endphp
										</span>
										
									</div>
									{{-- <div id="spark4"></div> --}}
								</div>
							</div>
							<div class="col-xl-3 col-lg-6 col-md-6 col-xm-12">
								<div class="card overflow-hidden dash1-card border-0">
									<div class="card-body">
										<p class=" mb-1">Canceled Orders</p>
										<h2 class="mb-1 number-font">{{ number_format($total_canceled,0)}}</h2>
										<small class="fs-12 text-muted">Canceled Orders in {{ date("M Y") }}</small>
										<span class="ratio bg-danger">@php

											if($orders_of_month > 0 && $total_canceled  > 0){
												echo  number_format((($total_canceled/$orders_of_month)*100),0)."%";
											}else{
												echo "None";
											}

										@endphp</span>
										
									</div>
									{{-- <div id="spark4"></div> --}}
								</div>

								
							</div>
							<div class="col-xl-3 col-lg-6 col-md-6 col-xm-12">
								<div class="card overflow-hidden dash1-card border-0">
									<div class="card-body">
										<p class=" mb-1">  Products Sold</p>
										<h2 class="mb-1 number-font">{{ number_format($total_products_sold,0)}}</h2>
										<small class="fs-12 text-muted">Products Sold Till today</small>
										<span class="ratio bg-success">Products</span>
										
									</div>
									{{-- <div id="spark4"></div> --}}
								</div>

								
							</div>
						</div>
						<!-- End Row-1 -->

						<!-- Row-2 -->
						<div class="row d-none">
							<div class="col-xl-12 col-lg-12 col-md-12">
								<div class="card">
									<div class="card-header">
										<h3 class="card-title">Sales Analysis</h3>
										<div class="card-options">
											<div class="btn-group p-0">
												<button class="btn btn-outline-light btn-sm" type="button">Week</button>
												<button class="btn btn-light btn-sm" type="button">Month</button>
												<button class="btn btn-outline-light btn-sm" type="button">Year</button>
											</div>
										</div>
									</div>
									<div class="card-body">
										<div class="row mb-3">
											<div class="col-xl-3 col-6">
												<p class="mb-1">Total Sales</p>
												<h3 class="mb-0 fs-20 number-font1">$52,618</h3>
												<p class="fs-12 text-muted"><span class="text-danger mr-1"><i class="fe fe-arrow-down"></i>0.9%</span>this month</p>
											</div>
											<div class="col-xl-3 col-6 ">
												<p class=" mb-1">Maximum Sales</p>
												<h3 class="mb-0 fs-20 number-font1">$26,197</h3>
												<p class="fs-12 text-muted"><span class="text-success mr-1"><i class="fe fe-arrow-up"></i>0.15%</span>this month</p>
											</div>
											<div class="col-xl-3 col-6">
												<p class=" mb-1">Total Units Sold</p>
												<h3 class="mb-0 fs-20 number-font1">13,876</h3>
												<p class="fs-12 text-muted"><span class="text-danger mr-1"><i class="fe fe-arrow-down"></i>0.8%</span>this month</p>
											</div>
											<div class="col-xl-3 col-6">
												<p class=" mb-1">Maximum Units Sold</p>
												<h3 class="mb-0 fs-20 number-font1">5,876</h3>
												<p class="fs-12 text-muted"><span class="text-success mr-1"><i class="fe fe-arrow-up"></i>0.06%</span>this month</p>
											</div>
										</div>
										<div id="echart1" class="chart-tasks chart-dropshadow text-center"></div>
										<div class="text-center mt-2">
											<span class="mr-4"><span class="dot-label bg-primary"></span>Total Sales</span>
											<span><span class="dot-label bg-secondary"></span>Total Units Sold</span>
										</div>
									</div>
								</div>
							</div>
							<div class="col-xl-4 col-lg-4 col-md-12 d-none">
								<div class="card">
									<div class="card-header">
										<h3 class="card-title">Recent Activity</h3>
										<div class="card-options">
											<a href="{{url('/' . $page='#')}}" class="option-dots" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fe fe-more-horizontal fs-20"></i></a>
											<div class="dropdown-menu dropdown-menu-right">
												<a class="dropdown-item" href="{{url('/' . $page='#')}}">Today</a>
												<a class="dropdown-item" href="{{url('/' . $page='#')}}">Last Week</a>
												<a class="dropdown-item" href="{{url('/' . $page='#')}}">Last Month</a>
												<a class="dropdown-item" href="{{url('/' . $page='#')}}">Last Year</a>
											</div>
										</div>
									</div>
									<div class="card-body">
										<div class="latest-timeline scrollbar3" id="scrollbar3">
											<ul class="timeline mb-0">
												<li class="mt-0">
													<div class="d-flex"><span class="time-data">Task Finished</span><span class="ml-auto text-muted fs-11">09 June 2020</span></div>
													<p class="text-muted fs-12"><span class="text-info">Joseph Ellison</span> finished task on<a href="{{url('/' . $page='#')}}" class="font-weight-semibold"> Project Management</a></p>
												</li>
												<li>
													<div class="d-flex"><span class="time-data">New Comment</span><span class="ml-auto text-muted fs-11">05 June 2020</span></div>
													<p class="text-muted fs-12"><span class="text-info">Elizabeth Scott</span> Product delivered<a href="{{url('/' . $page='#')}}" class="font-weight-semibold"> Service Management</a></p>
												</li>
												<li>
													<div class="d-flex"><span class="time-data">Target Completed</span><span class="ml-auto text-muted fs-11">01 June 2020</span></div>
													<p class="text-muted fs-12"><span class="text-info">Sonia Peters</span> finished target on<a href="{{url('/' . $page='#')}}" class="font-weight-semibold"> this month Sales</a></p>
												</li>
												<li>
													<div class="d-flex"><span class="time-data">Revenue Sources</span><span class="ml-auto text-muted fs-11">26 May 2020</span></div>
													<p class="text-muted fs-12"><span class="text-info">Justin Nash</span> source report on<a href="{{url('/' . $page='#')}}" class="font-weight-semibold"> Generated</a></p>
												</li>
												<li>
													<div class="d-flex"><span class="time-data">Dispatched Order</span><span class="ml-auto text-muted fs-11">22 May 2020</span></div>
													<p class="text-muted fs-12"><span class="text-info">Ella Lambert</span> ontime order delivery <a href="{{url('/' . $page='#')}}" class="font-weight-semibold">Service Management</a></p>
												</li>
												<li>
													<div class="d-flex"><span class="time-data">New User Added</span><span class="ml-auto text-muted fs-11">19 May 2020</span></div>
													<p class="text-muted fs-12"><span class="text-info">Nicola	Blake</span> visit the site<a href="{{url('/' . $page='#')}}" class="font-weight-semibold"> Membership allocated</a></p>
												</li>
												<li>
													<div class="d-flex"><span class="time-data">Revenue Sources</span><span class="ml-auto text-muted fs-11">15 May 2020</span></div>
													<p class="text-muted fs-12"><span class="text-info">Richard	Mills</span> source report on<a href="{{url('/' . $page='#')}}" class="font-weight-semibold"> Generated</a></p>
												</li>
												<li class="mb-0">
													<div class="d-flex"><span class="time-data">New Order Placed</span><span class="ml-auto text-muted fs-11">11 May 2020</span></div>
													<p class="text-muted fs-12"><span class="text-info">Steven Hart</span> is proces the order<a href="{{url('/' . $page='#')}}" class="font-weight-semibold"> #987</a></p>
												</li>
											</ul>
										</div>
									</div>
								</div>
							</div>
						</div>
						 

					</div>
				</div>
				<!-- End app-content-->
			</div>
@endsection
@section('js')

<!--INTERNAL Peitychart js-->
<script src="{{URL::asset('assets/plugins/peitychart/jquery.peity.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/peitychart/peitychart.init.js')}}"></script>

<!--INTERNAL Apexchart js-->
<script src="{{URL::asset('assets/js/apexcharts.js')}}"></script>

<!--INTERNAL ECharts js-->
<script src="{{URL::asset('assets/plugins/echarts/echarts.js')}}"></script>

<!--INTERNAL Chart js -->
<script src="{{URL::asset('assets/plugins/chart/chart.bundle.js')}}"></script>
<script src="{{URL::asset('assets/plugins/chart/utils.js')}}"></script>

<!-- INTERNAL Select2 js -->
<script src="{{URL::asset('assets/plugins/select2/select2.full.min.js')}}"></script>
<script src="{{URL::asset('assets/js/select2.js')}}"></script>

<!--INTERNAL Moment js-->
<script src="{{URL::asset('assets/plugins/moment/moment.js')}}"></script>

<!--INTERNAL Index js-->
<script src="{{URL::asset('assets/js/index1.js')}}"></script>

@endsection