@include('store.layout.header')
	<!-- Header -->
@include('store.layout.navbar')

	<!-- breadcrumb -->
	<div class="container mt-5" style="margin-top: 50px">
		<div class="bread-crumb flex-w p-l-25 p-r-15 p-t-30 p-lr-0-lg mt-5">
			{{-- <a href="/" class="stext-109 cl8 hov-cl1 trans-04">
				Home
				<i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
			</a>

			<span class="stext-109 cl4">
				Shoping Cart
			</span> --}}
		</div>
	</div>
	@php
						 
    $cart = array( );
    if(@session()->get('cart')){
        $cart = session()->get('cart');
    } 
@endphp

	<!-- Shoping Cart -->
	<form class="bg0 p-t-75 p-b-85" method="POST" action="{{ url('/user/order-now') }}">
		@csrf
		<div class="row">
			<div class="col-sm-12">
				<h2 class="text-center">Cart Details</h2>
			</div>
	
		</div>
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="m-l-25 m-r--38 m-lr-0-xl">
						<div class="wrap-table-shopping-cart">
							<table class="table-shopping-cart">
								<tr class="table_head">
									<th class="column-1">Product</th>
									<th class="column-2"></th>
									<th class="column-3">Price</th>
									<th class="column-4">Quantity</th>
									<th class="column-5">Total</th>
								</tr>
                                <?php 
                                $sum_product = 0;
                                ?>
                                @if(count($cart) > 0)
							
                                @foreach ($cart as $item)
                                <?php  
                                  //  $sum =$item['price'] * $item['quantity'];
                                   
                                ?>
								@if ($item['quantity'] > 0)
                                
								<tr class="table_row">
									<td class="column-1">
										<div class="how-itemcart1" onclick="delete_product({{ $item['product_id'] }})">
											@php
                                            $image = $item['image'];
                                           
											$sum_product += round($item['price'],0) * $item['quantity'];
                                        @endphp
                                        
                                        <img  src='{{URL::asset("/products/$image")}}' alt="IMG">
										</div>
										<input type="hidden" name="product_id[]"  value="{{ $item['product_id'] }}"/>
									</td>
									<td class="column-2">
										{{ $item['name'] }}

									</td>
									<td class="column-3">
										{{ $item['price'] }}
									 
								 	</td>

									<td class="column-4">
										<div class="wrap-num-product flex-w m-l-auto m-r-0">
											<div class="btn-num-product-down cl8 hov-btn3 trans-04 flex-c-m" onclick="remove_from_cart({{ $item['product_id'] }})">
												<i class="fs-16 zmdi zmdi-minus"></i>
											</div>
 
											<input class="mtext-104 cl3 txt-center num-product" type="number" name="quantity[]" value="{{ $item['quantity'] }}">

											<div class="btn-num-product-up cl8 hov-btn3 trans-04 flex-c-m" onclick="add_to_cart({{ $item['product_id'] }})">
												<i class="fs-16 zmdi zmdi-plus"></i>
											</div>
										</div>
									</td>


									<td class="column-5">{{  round($item['price'],0) * $item['quantity']}}</td>
								</tr>
								@endif
                                @endforeach
                                <tr>
                                </tr>
								 @else 
                                <tr>
                                    <td colspan="4" class="text-center">No products in Cart</td>
                                </tr>

                                 @endif
							</table>
						</div>

						
						
						{{-- <a type="{{ url('/order-now') }}" class="flex-c-m stext-101 cl0 size-116 bg3 bor14 hov-btn3 p-lr-15 trans-04 pointer">
									Checkout Now
						</a> --}}
						@if (count($item) > 0)
                                

						 <div class="flex-w flex-sb-m bor15 p-t-18 p-b-15 p-lr-40 p-lr-15-sm">
						  
							<a href="{{ url('/order-now') }}">
							  <div class="flex-c-m stext-101 cl2 size-119 bg8 bor13 hov-btn3 p-lr-15 trans-04 pointer m-tb-10 float-right">
									Checkout
							</div>  
							</a>
						</div> 
						@endif
					</div>
				</div>
				
			 
			</div>
		</div>
	</form>



	@include('store.layout.footer')