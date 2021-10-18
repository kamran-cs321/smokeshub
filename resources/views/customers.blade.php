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
								<h4 class="page-title mb-0">Customers</h4>
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="{{ url('/admin/dashboard') }}"><i class="fe fe-layout mr-2 fs-14"></i>Admin</a></li>
									<li class="breadcrumb-item active" aria-current="page"><a href="#">Customers</a></li>
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
										<div class="card-title">Customer Info</div>
										 
									</div>
									<div class="card-body">
										<div class="">
											<div class="table-responsive">
												<table id="example" class="table  table-bordered text-nowrap key-buttons"  role="grid" aria-describedby="example2_info" >
													<thead>
														<tr>
                                                            <th class="border-bottom-0">Sr#</th>
															<th class="border-bottom-0">Customer</th>
                                                            <th class="border-bottom-0">Email</th>
															<th class="border-bottom-0">Order Number</th>
															<th class="border-bottom-0">Contact</th> 
															<th class="border-bottom-0">Address</th>
                                                            <th class="border-bottom-0">  City</th>  
															<th class="border-bottom-0">  Date</th>
                                                            <th class="border-bottom-0">  Action</th>
														</tr>
													</thead>
													<tbody>
													  @foreach ($customers as $customer)
                                                          
														<tr role="row" class="odd">
                                                            <td class="sorting_1" tabindex="0">{{ $loop->iteration }}</td>
															<td>{{ $customer->name }}</td>
                                                            <td>
                                                                @if($customer->email == "")
                                                                {{ "-" }}
                                                                @else 


                                                                {{ $customer->email }}
                                                                @endif
                                                            </td>
															<td>{{ $customer->order_number }}</td> 
															<td>{{ $customer->contact }}</td> 
														 	<td>{{ $customer->address }}</td>
                                                             <td>{{ $customer->city }}</td>
															<td>{{ $customer->created_at  }}</td>
                                                           
                                                            <td>
                                                                <a   href="#"  onclick="edit_customer_info({{ $customer->id}})"  class="btn btn-success"  ><i class="fa fa-edit"></i></a>
                                                                 
																<button class="btn btn-warning" onclick="view_details({{ $customer->id }})" type="button"><i class="fa fa-eye" aria-hidden="true"></i></button>
                                                                
																 
																<button class="btn btn-danger" onclick="delete_customer({{ $customer->id }},1)" type="button"><i class="fa fa-trash"></i></button>
																 
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

			<!-- Modal -->
<div id="customer_order" class="modal fade" role="dialog">
	<div class="modal-dialog">
  
	  <!-- Modal content-->
	  <div class="modal-content">

		<div class="modal-header">
			<h4 class="modal-title" style="margin-left: 30%">Customer Orders info</h4>
		  <button type="button" class="close" data-dismiss="modal">&times;</button>
		  
		</div>

		<div class="modal-body" id="customer_orders_sections">
		   
		</div>

		<div class="modal-footer">
		  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
		</div>

	  </div>
  
	</div>
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
             
				function delete_customer(customer_id,status){
			 
					$.ajax({
					url: '/update-customer-status',
					type:"POST",
					data:{
                        customer_id : customer_id,
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
                

            function view_details(customer_id){
			 
             $.ajax({
             url: '/show-customer-orders',
             type:"POST",
             data:{
                 customer_id : customer_id
                 },
                 headers: {
                         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                     },
             success: function(response){ 
                 console.log(response);
				 $("#customer_orders_sections").html(response);
				 $('#customer_order').modal('show'); 

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