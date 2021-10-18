@extends('layouts.master')
@section('css')
		<!-- Data table css -->
		<link href="{{URL::asset('assets/plugins/datatable/css/dataTables.bootstrap4.min.css')}}" rel="stylesheet" />
		<link href="{{URL::asset('assets/plugins/datatable/css/buttons.bootstrap4.min.css')}}"  rel="stylesheet">
		<link href="{{URL::asset('assets/plugins/datatable/responsive.bootstrap4.min.css')}}" rel="stylesheet" />
		<!-- Slect2 css -->
		<link href="{{URL::asset('assets/plugins/select2/select2.min.css')}}" rel="stylesheet" />

@endsection
@section('page-header')
						<!--Page header-->
						<div class="page-header">
							<div class="page-leftheader">
								<h4 class="page-title mb-0">Orders</h4>
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="{{ url('/admin/dashboard') }}"><i class="fe fe-layout mr-2 fs-14"></i>Admin</a></li>
									<li class="breadcrumb-item active" aria-current="page"><a href="#">Orders</a></li>
								</ol>
							</div>
							 
						</div>
                        <!--End Page header-->
@endsection
@section('content')
						<!-- Row -->
						<div class="row">
							<div class="col-12">
							 
								<!--/div-->
								<!--div-->
								<div class="card">
									<div class="card-header">
										<div class="card-title">Sales Info</div>
										 
									</div>
									<div class="card-body">
										<div class="">
											<div class="table-responsive">
												<table id="example" class="table  table-bordered text-nowrap key-buttons"  role="grid" aria-describedby="example2_info" >
													<thead>
														<tr>
                                                            <th class="border-bottom-0">Sr#</th>
															<th class="border-bottom-0">Customer</th>
															<th class="border-bottom-0">Order Number</th>
															<th class="border-bottom-0">Product</th> 
															<th class="border-bottom-0">Address</th>
                                                            <th class="border-bottom-0">  City</th> 
															<th class="border-bottom-0">  Quantity</th>
															<th class="border-bottom-0">Price per unit</th>
                                                            <th class="border-bottom-0">  Total</th>
                                                            <th class="border-bottom-0">  Status</th>
															<th class="border-bottom-0">  Date</th>
                                                            <th class="border-bottom-0">  Action</th>
														</tr>
													</thead>
													<tbody>
													  @foreach ($orders as $order)
                                                          
														<tr role="row" class="odd">
                                                            <td class="sorting_1" tabindex="0">{{ $loop->iteration }}</td>
															<td>{{ $order->customer_name }}</td>
															<td>{{ $order->order_number }}</td> 
															<td>{{ $order->product_name }}</td> 
														 	<td>{{ $order->address }}</td>
															<td>{{ $order->city }}</td>
                                                            <td>{{ $order->quantity }}</td>
                                                            <td>{{ $order->price }}</td>
                                                            <td>{{ $order->price * $order->quantity }}</td>
                                                            <td>
                                                                @php 
                                                                    if($order->order_status == 0){
                                                                        echo "Order Placed";
                                                                    }
                                                                    if($order->order_status == 1){
                                                                        echo "Confirmed";
                                                                    }
                                                                    if($order->order_status == 2){
                                                                        echo "Pending";
                                                                    }
                                                                    if($order->order_status == 3){
                                                                        echo "Canceled";
                                                                    }
                                                                @endphp
                                                            </td>
															<td>{{ $order->created_at  }}</td>
                                                           
                                                            <td>
                                                                <a   href="#"  onclick="edit_order({{ $order->order_id}})"  class="btn btn-success"  ><i class="fa fa-edit"></i></a>
                                                                @if($order->order_status == 0)
																<button class="btn btn-success" onclick="update_status({{ $order->order_id }},1)" type="button"><i class="fa fa-check" aria-hidden="true"></i></button>
                                                                @endif
																@if($order->order_status == 0 || $order->order_status == 1)
																<button class="btn btn-warning" onclick="update_status({{ $order->order_id }},2)" type="button"><i class="fa fa-times" aria-hidden="true"></i></button>
                                                                @endif
																 
																<button class="btn btn-danger" onclick="update_status({{ $order->order_id }},5)" type="button"><i class="fa fa-trash"></i></button>
																 
															</td>
															 
														</tr>
														  @endforeach
													</tbody>
												</table>
											</div>
										</div>
									</div>
								</div>
								<!--/div-->
 
							</div>
						</div>
						<!-- /Row -->

					</div>
				</div><!-- end app-content-->
            </div>
@endsection
@section('js')
		<!-- INTERNAL Data tables -->
		<script src="{{URL::asset('assets/plugins/datatable/js/jquery.dataTables.js')}}"></script>
		<script src="{{URL::asset('assets/plugins/datatable/js/dataTables.bootstrap4.js')}}"></script>
		<script src="{{URL::asset('assets/plugins/datatable/js/dataTables.buttons.min.js')}}"></script>
		<script src="{{URL::asset('assets/plugins/datatable/js/buttons.bootstrap4.min.js')}}"></script>
		<script src="{{URL::asset('assets/plugins/datatable/js/jszip.min.js')}}"></script>
		<script src="{{URL::asset('assets/plugins/datatable/js/pdfmake.min.js')}}"></script>
		<script src="{{URL::asset('assets/plugins/datatable/js/vfs_fonts.js')}}"></script>
		<script src="{{URL::asset('assets/plugins/datatable/js/buttons.html5.min.js')}}"></script>
		<script src="{{URL::asset('assets/plugins/datatable/js/buttons.print.min.js')}}"></script>
		<script src="{{URL::asset('assets/plugins/datatable/js/buttons.colVis.min.js')}}"></script>
		<script src="{{URL::asset('assets/plugins/datatable/dataTables.responsive.min.js')}}"></script>
		<script src="{{URL::asset('assets/plugins/datatable/responsive.bootstrap4.min.js')}}"></script>
		<script src="{{URL::asset('assets/js/datatables.js')}}"></script>

		<!-- INTERNAL Select2 js -->
		<script src="{{URL::asset('assets/plugins/select2/select2.full.min.js')}}"></script>
		<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        <script type="text/javascript">
             
				function update_status(order_id,status){
			 
					$.ajax({
					url: '/update-order-status',
					type:"POST",
					data:{
							order_id : order_id,
							status:status
						},
						headers: {
								'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
							},
					success: function(response){ 
						console.log(response);
						if(response == 1){
							
						swal("Wait!", "Operation Successfull!", "success");
						}else{
							
						swal("error!", "you can't repeat same operation on one record!", "danger");
						}
		
						location.reload();
							
					},
					error: function (jqXHR, textStatus, errorThrown) {
							
							console.log(jqXHR);
							console.log(textStatus);
							console.log(errorThrown);    
						}
					});
				}
			 

            </script>
@endsection