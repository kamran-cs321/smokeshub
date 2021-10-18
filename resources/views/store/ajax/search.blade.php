@if(count($products) > 0)
@foreach($products as $product)
				@php 
					$value="";
				@endphp
				@foreach ($categories as $item)
					@if($item->id ==  $product->category_id)
						@php 
							$value =$item->name;
						@endphp
					@endif
				@endforeach
				<div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item {{ $value }}">
					<!-- Block2 -->
					<div class="block2">
						<div class="block2-pic hov-img0">
						
							<img   src='{{ URL::to("/products/$product->image_1") }}' alt="IMG-PRODUCT">
							{{-- onclick="fetch_product_info({{ $product->id }})" --}}
							<a href='{{ url("/product-info/$product->slug") }}'  class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04 js-show-modal1">
								Quick View
							</a>
						</div>

						<div class="block2-txt flex-w flex-t p-t-14">
							<div class="block2-txt-child1 flex-col-l ">
								<a href='{{ url("product-info/$product->slug") }}' class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
									{{ $product->name }}
								</a>

								<span class="stext-105 cl3">
									PKR {{ round($product->price,0) }}
								</span>
							</div>

							<div class="block2-txt-child2 flex-r p-t-3">
								<a href="#"   onclick="add_to_cart({{ $product->id }})"  class="btn-addwish-b2 dis-block pos-relative js-addwish-b2 ">
									{{-- <i class="zmdi zmdi-shopping-cart lead"></i>
									 --}}
									<i class=" p-lr-15 trans-04 zmdi zmdi-shopping-cart " style="color: green !important"></i>
								</a>
							</div>
						</div>
					</div>
				</div>
			@endforeach
            @else 

                <div class="col-sm-12">
                    <p class="text-center">No products Available with this name</p>
                </div>
            @endif