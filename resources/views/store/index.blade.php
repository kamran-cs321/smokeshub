@include('store.layout.header')

@include('store.layout.navbar')
	<!-- Header -->
	<div class="top-bar" id="top_bar">
		<div class="close-btn" id="close_top_bar">
			<img  src="{{URL::asset('/storage/images/icons/multiply.png')}}">
		</div>
		<div class="content-topbar flex-sb-m h-full container">

			<div class="left-top-bar txt-center text-white">
				Free shipping for standard order over $100s
			</div>

		</div>
	</div>


	<!-- Header ends here -->
    
	<!-- Slider -->
	<section class="section-slide">
		<div class="wrap-slick1">
			<div class="slick1">
				<div class="item-slick1" style="background-image: url({{URL::asset('/storage/images/home_slider_1.jpg')}});">
					<div class="container h-full">
						<div class="flex-col-l-m h-full p-t-100 p-b-30 respon5">
							<div class="layer-slick1 animated visible-false" data-appear="fadeInDown" data-delay="0">
								<span class="ltext-101 cl2 respon2 text-white">
									Latest Collection 
								</span>
							</div>

							<div class="layer-slick1 animated visible-false" data-appear="fadeInUp" data-delay="800">
								<h2 class="ltext-201 cl2 p-t-19 p-b-43 respon1 text-white">
									NEW SEASON
								</h2>
							</div>

							<div class="layer-slick1 animated visible-false d-none" data-appear="zoomIn" data-delay="1600">
								<a href="{url('/products')}" class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04 text-white">
									Shop Now
								</a>
							</div>
						</div>
					</div>
				</div>

               

				<div class="item-slick1" style="background-image: url({{URL::asset('/storage/images/home_slider_2.jpg')}});">
					<div class="container h-full">
						<div class="flex-col-l-m h-full p-t-100 p-b-30 respon5">
							<div class="layer-slick1 animated visible-false" data-appear="fadeInDown" data-delay="0">
								<span class="ltext-101 cl2 respon2 text-white">
									Men Collection 2018
								</span>
							</div>

							<div class="layer-slick1 animated visible-false" data-appear="fadeInUp" data-delay="800">
								<h2 class="ltext-201 cl2 p-t-19 p-b-43 respon1 text-white">
									New arrivals
								</h2>
							</div>

							<div class="layer-slick1 animated visible-false d-none" data-appear="zoomIn" data-delay="1600">
								<a href="{{ url('/products') }}" class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04 text-white">
									Shop Now
								</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>




	<!-- Product -->
	<section class="bg0 p-t-23 p-b-140 "  >
		<div class="container">
			<div class="p-b-10">
				<h3 class="ltext-103 cl5  ">
					Product Overview
				</h3>
			</div>
<div class="row">
	<div class="col-sm-12">
		@php
						 
		$cart = array( );
		if(@session()->get('cart')){
			$cart = session()->get('cart');
		} 
	@endphp
	</div>
</div>
			<div class="flex-w flex-sb-m p-b-52">
				<div class="flex-w flex-l-m filter-tope-group m-tb-10">
					<button class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5 how-active1 t " data-filter="*">
						All Products
					</button>

					
					@foreach ($categories as $category)
					<button class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5 " data-filter=".{{$category->name}}">
						{{$category->name}}
					</button>
					@endforeach
				</div>

			  {{-- <div class="flex-w flex-c-m m-tb-10">
					 

					<div class="flex-c-m stext-106 cl6 size-105 bor4 pointer hov-btn3 trans-04 m-tb-4 js-show-search">
						<i class="icon-search cl2 m-r-6 fs-15 trans-04 zmdi zmdi-search"></i>
						<i class="icon-close-search cl2 m-r-6 fs-15 trans-04 zmdi zmdi-close dis-none"></i>
						Search
					</div>
				</div>
 
				<div class="dis-none panel-search w-full p-t-10 p-b-15">
					<div class="bor8 dis-flex p-l-15">
						<button class="size-113 flex-c-m fs-16 cl2 hov-cl1 trans-04">
							<i class="zmdi zmdi-search"></i>
						</button>

						<input class="mtext-107 cl2 size-114 plh2 p-r-15"  name="search_input"  id="search_input" type="text" name="search-product" placeholder="Search Product Name">
					</div>
				</div>   --}}

				 
			</div>

			<div class="row isotope-grid" id="products_grid">
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
							  <a href='{{ url("/product-info/$product->slug") }}'  class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04  ">
								Quick View
							</a>  
						</div>
						{{-- onclick="fetch_product_info({{ $product->id }})" --}}
						<div class="block2-txt flex-w flex-t p-t-14">
							<div class="block2-txt-child1 flex-col-l ">
								<a href='{{ url("/product-info/$product->slug") }}'  class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
									{{ $product->name }}
								</a>

								<span class="stext-105 cl3">
									PKR {{ round($product->price,0) }}
								</span>
							</div>

							<div class="block2-txt-child2 flex-r p-t-3">
								<a href="#"   onclick="add_to_cart({{ $product->id }})"  class=" dis-block pos-relative js-addwish-b2 text-white">
									{{-- <i class="zmdi zmdi-shopping-cart lead"></i>
									 --}}
									<i for="Add to Cart" data-toggle="tooltip" data-placement="bottom" title="Add to Cart" class=" p-lr-15 trans-04 zmdi zmdi-shopping-cart text-dark"></i>
								</a>
							</div>
						</div>
					</div>
				</div>
			@endforeach
				 
			</div>

			<!-- Load more -->
			{{-- onclick="load_more()" --}}
			<div class="flex-c-m flex-w w-full p-t-45">
				<a href="/products-list"  class="flex-c-m stext-101 cl5 size-103 bg2 bor1 hov-btn1 p-lr-15 trans-04">
					Show All
				</a>
			</div>
		</div>
	</section>
	<!-- Banner -->
 	<!-- Back to top -->
	 <div class="btn-back-to-top" id="myBtn">
		<span class="symbol-btn-back-to-top">
			<i class="zmdi zmdi-chevron-up"></i>
		</span>
	</div>

	<!-- Modal1 -->
	<div class="wrap-modal1 js-modal1 p-t-60 p-b-20" id="product_info_section" disabled>
		<div class="overlay-modal1 js-hide-modal1"></div>

<div class="container">
    <div class="bg0 p-t-60 p-b-30 p-lr-15-lg how-pos3-parent">
        <button class="how-pos3 hov3 trans-04 js-hide-modal1" onclick="remove_backdoor()">
            <img src="{{URL::asset('/storage/images/icons/icon-close.png')}}" alt="CLOSE">
        </button>
		<div id="product_section_info">
		</div>

	</div>
</div>
	</div>
	<div class="modal fade modal-full-window" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content " data-dismiss="modal" aria-label="Close">

				<div class="modal-body">
					...
				</div>
			</div>
		</div>
	</div>
	<p id="done"></p>
	<!--===============================================================================================-->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script> 

	
@include('store.layout.footer')
<script>
		$("#search_input").on("keyup", function() {
	   
	   var value = $(this).val().toLowerCase();
	   $("#products_grid .col-sm-6").filter(function() {
		 $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
	   });
	   });
	   </script> 


{{-- <script>
	$("#search_input").on("keyup", function() {
   alert(1);
   var value = $(this).val().toLowerCase();
   $("#table_body tr").filter(function() {
	 $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
   });
   });
   </script>  --}}
