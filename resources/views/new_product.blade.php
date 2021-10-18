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
									<li class="breadcrumb-item"><a href="{{ url('/admin/dashboard') }}"><i class="fe fe-layout mr-2 fs-14"></i>Dashboard</a></li>
									<li class="breadcrumb-item active" aria-current="page"><a href="{{ url('/admin/products') }}">Products</a></li>
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
										<div class="card-title">New Product</div>
										 
									</div>
									<div class="card-body">
                                        <form method="POST" action="{{ url('/admin/product/store') }}" enctype="multipart/form-data">
                                            @csrf
                                            <div class="form-group">
                                                <label>Product category</label>
                                                <select name="category" class="form-control" required>
                                                    <option selected disabled>--Choose Product Category--</option>
                                                @foreach ($categories as $item)
                                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                                @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label>Product Name</label>
                                                <input type="text" name="name" class="form-control" placeholder="Product Display Name here" />
                                            </div>
                                            <div class="form-group">
                                                <label>Product Price</label>
                                                <input type="number" min="1" name="price" class="form-control" placeholder="Product Display Price here" />
                                            </div>

                                            <div class="form-group">
                                                <label>Product inventory</label>
                                                <input type="number" min="0" name="inventory" class="form-control" placeholder="Product Inventory Here" />
                                            </div>
                                          
                                            <div class="form-group">
                                                <label>Product Display Image </label>
                                                <input type="file" name="image1" class="form-control" placeholder="Product Image Here" required />
                                            </div>
                                            <div class="form-group">
                                                <label>Product Info Image </label>
                                                <input type="file" name="image2" class="form-control" placeholder="Product Image Here" />
                                            </div>
                                            <div class="form-group">
                                                <label>Product Info Image </label>
                                                <input type="file" name="image3" class="form-control" placeholder="Product Image Here" />
                                            </div>

                                            <div class="form-group">
                                                <label>Product Description</label>
                                                <textarea rows="5" class="form-control" name="description" placeholder="Decription of product here"></textarea>
                                            </div>
                                            <button type="submit" class="btn btn-success form-control bg-success">Save</button>

                                         </form>
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