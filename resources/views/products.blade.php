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
								<h4 class="page-title mb-0">Data Tables</h4>
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="#"><i class="fe fe-layout mr-2 fs-14"></i>Dashboard</a></li>
									<li class="breadcrumb-item active" aria-current="page"><a href="#">Products</a></li>
								</ol>
							</div>
							 
						</div>
                        <!--End Page header-->
@endsection
@section('content')
						<!-- Row -->
						<div class="row">
							<div class="col-12">
							  
								<div class="card">
									<div class="card-header"> 
                                        {{-- <div class="card-title">Products info</div>
                                       <div class="card-title float-right"> 
										   <a class="btn btn-success float-right" href="/admin/product/create" style="float: right">Create New Product</a>
									   </div> --}}
									   <div style="display: flex;
									   justify-content: space-between; 
									   width: 100%;">
										   <h1 class=" fs-12 mr-1">Place Order</h1>

										   <a class="btn btn-success float-right" href="/admin/product/create" style="float: right">Create New Product</a>
									  
									   </div>
									</div>
									<div class="card-body">
										<div class="">
											<div class="table-responsive">
												<table id="example" class="table table-bordered text-wrap key-buttons">
													<thead>
														<tr>
															<th class="border-bottom-0">Name</th>
															<th class="border-bottom-0">Price</th> 
															<th class="border-bottom-0">Description </th>
															<th class="border-bottom-0">Inventory</th> 
                                                            <th class="border-bottom-0">Action</th>
														</tr>
													</thead>
													<tbody>
                                                        @foreach ($products as $item)
                                                            <tr>
																<td class="font-weight-bold">
																	<img class="w-7 h-7 rounded shadow mr-3" src='{{url("/products/$item->image_1")}}' alt="{{ $item->name }}" style="height: 80px;">
																	{{ $item->name }}</td>
														 
                                                                <td>{{ $item->price }}</td>
                                                                
                                                                <td>{{ $item->description }}</td> 
                                                                <td>{{ $item->inventory }}</td>
                                                                <td>
																	<a href="#"  onclick="view_product({{ $item->id}})"  class="btn btn-warning" style="margin: 2px;" ><i class="fa fa-eye"></i></a>
                                                                   
                                                                    <a href="#"  onclick="edit_product({{ $item->id}})"  class="btn btn-success" style="margin: 2px;" ><i class="fa fa-edit"></i></a>
                                                                    <button class="btn btn-danger" onclick="update_status({{ $item->id }},5)" type="button" style="margin: 2px;"><i class="fa fa-trash"></i></button>
                                                                    @if($item->status == 0)
                                                                    <button class="btn btn-success" onclick="update_status({{ $item->id }},1)" type="button" style="margin: 2px;"><i class="fa fa-check"></i></button>
                                                                   
                                                                    @else 
                                                                    <button class="btn btn-warning" onclick="update_status({{ $item->id }},0)" type="button" style="margin: 2px;"><i class="fa fa-times"></i></button>
                                                                   
                                                                    @endif
																	
                                                                    <a  href="#"  onclick="add_color({{ $item->id}})"  class="btn btn-success" style="margin: 2px;" >+</a>

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
             
				function update_status(product_id,status){
			 
					$.ajax({
					url: '/update-product-status',
					type:"POST",
					data:{
                        product_id : product_id,
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