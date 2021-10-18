<header>
    <!-- Header desktop -->
    <div class="container-menu-desktop topbar-enabled">
        <!-- Topbar -->

        <div class="wrap-menu-desktop">
            <nav class="limiter-menu-desktop container-fluid" style="background-color:#000000">

                <!-- Logo desktop -->
                <!-- Menu desktop -->
                <a href="/" style="width:100px" class="logo">
                    <img  src="{{URL::asset('/storage/logo.jpeg')}}" alt="IMG-LOGO">
                </a>
                <div class="menu-desktop">
                    <ul class="main-menu">
                        <li>
                            <a class="text-white" href="{{ url('/') }}">Home</a>
                        </li>
                        <li>
                            <a class="text-white" href="{{ url('/products-list') }}">Products</a>
                            {{-- hover products cate --}}
                        </li>

                        <li>
                            <a class="text-white" href="{{ url('/about') }}">Why Us</a>
                        </li>
                        {{-- <li>
                            <a href="reviews.php">Reviews</a>
                        </li> --}}
                        <li>
                            <a class="text-white" href="{{ url('/contact') }}">Contact</a>
                        </li>
                    </ul>
                </div>

                <!-- Icon header -->
                <div class="wrap-icon-header flex-w flex-r-m">
                    <ul class="main-menu d-none">
                        <li class="dropdown fix-dropdown">
                            <a class="dis-block icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11"><i class="fa fa-user"></i></a>
                             
                        </li>
                    </ul>

                    <div class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 js-show-modal-search d-none">
                        <i class="zmdi zmdi-search"></i>
                    </div>
                    @php
                     
                        $cart = array( );
                        if(@session()->get('cart')){
                            $cart = session()->get('cart');
                        } 
                    @endphp
                    
                    {{-- icon-header-noti --}}
                    <div class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11  js-show-cart" onclick="fetch_cart()" data-notify="{{ count($cart)}}">
                        <i class="zmdi zmdi-shopping-cart text-white" ></i>
                    </div>
                </div>
            </nav>
        </div>
    </div>

    <!-- Header Mobile -->
    <div class="wrap-header-mobile">
        <!-- Logo moblie -->
        <div class="logo-mobile">
            <a href="/" >		<img src="images/repost.png" alt="IMG-LOGO"></a>
        </div>

        <!-- Icon header -->
        <div class="wrap-icon-header flex-w flex-r-m m-r-15">
            <div class="icon-header-item cl2 hov-cl1 trans-04 p-r-11 js-show-modal-search">
                <i class="zmdi zmdi-search"></i>
            </div>

            <div class="icon-header-item cl2 hov-cl1 trans-04 p-r-11 p-l-10 icon-header-noti js-show-cart" data-notify="2">
                <i class="zmdi zmdi-shopping-cart text-white" style="color:white"></i>
            </div>

            <a href="#" class="dis-block icon-header-item cl2 hov-cl1 trans-04 p-r-11 p-l-10 icon-header-noti" data-notify="0">
                <i class="zmdi zmdi-favorite-outline"></i>
            </a>
        </div>

        <!-- Button show menu -->
        <div class="btn-show-menu-mobile hamburger hamburger--squeeze">
            <span class="hamburger-box">
                <span class="hamburger-inner"></span>
            </span>
        </div>
    </div>


    <!-- Menu Mobile -->
    <div class="menu-mobile">
        <ul class="topbar-mobile">
            <li>
                <div class="left-top-bar">
                    Free shipping for standard order over $100
                </div>
            </li>

            <li>
                <div class="right-top-bar flex-w h-full">
                    <a href="#" class="flex-c-m p-lr-10 trans-04">
                        Help & FAQs
                    </a>

                    <a href="#" class="flex-c-m p-lr-10 trans-04">
                        My Account
                    </a>

                    <a href="#" class="flex-c-m p-lr-10 trans-04">
                        EN
                    </a>

                    <a href="#" class="flex-c-m p-lr-10 trans-04">
                        USD
                    </a>
                </div>
            </li>
        </ul>

        <ul class="main-menu-m">
            <li>
                <a href="index.html">Home</a>
                <ul class="sub-menu-m">
                    <li><a href="index.html">Homepage 1</a></li>
                    <li><a href="home-02.html">Homepage 2</a></li>
                    <li><a href="home-03.html">Homepage 3</a></li>
                </ul>
                <span class="arrow-main-menu-m">
                    <i class="fa fa-angle-right" aria-hidden="true"></i>
                </span>
            </li>

            <li>
                <a href="product.html">Shop</a>
            </li>

            <li>
                <a href="shoping-cart.html" class="label1 rs1" data-label1="hot">Features</a>
            </li>

            <li>
                <a href="blog.html">Blog</a>
            </li>

            <li>
                <a href="about.html">About</a>
            </li>

            <li>
                <a href="contact.html">Contact</a>
            </li>
        </ul>
    </div>

    <!-- Modal Search -->
    <div class="modal-search-header flex-c-m trans-04 js-hide-modal-search d-none">
        <button class="flex-c-m btn-hide-modal-search trans-04 js-hide-modal-search">
            <img   src="{{URL::asset('/storage/images/icons/icon-close2.png')}}" alt="CLOSE">
        </button>
        <div class="row">
            <div class="col-md-8">
                <div class="container-search-header">
                    <form class="wrap-search-header flex-w p-l-15">
                        <button class="flex-c-m trans-04">
                            <i class="zmdi zmdi-search"></i>
                        </button>
                        <input class="plh3" type="text" name="search" placeholder="Search...">
                    </form>
                </div>
            </div>
            <div class="col-md-4">
                <div class="latest-searches">
                    <div class="ltext-101 mb-3">Top Searches</div>
                    <ul class="stext-115">
                        <li>Madison</li>
                        <li>Loafers</li>
                        <li>Sandals</li>
                        <li>Madison Boots</li>
                        <li>Sutcliff</li>

                        <ul>
                </div>
            </div>
        </div>

    </div>
    <div class="modal-login-header flex-c-m trans-04 js-hide-modal-login">
        <div class="container">

            <div class="flex-w flex-tr container-login-header p-t-80">

                <div class="size-210 bor10 p-lr-70 p-t-55 p-b-70 p-lr-15-lg w-full-md customer-box d-none">
                    <form class="login-form">
                        <h4 class="mtext-105 cl2 txt-center p-b-30">
                            Customer's Login
                        </h4>

                        <div class="bor8 m-b-20 how-pos4-parent">
                            <input class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30" type="email" name="email" placeholder="Your Email Address">
                            <img class="how-pos4 pointer-none"  src="{{URL::asset('/storage/images/icons/icon-email.png')}}"  alt="ICON">
                        </div>
                        <div class="bor8 m-b-30 how-pos4-parent">
                            <input class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30" type="password" name="password" placeholder="Your Password">
                            <img class="how-pos4 pointer-none" src="{{URL::asset('/storage/images/icons/locked.png')}}" alt="ICON">
                        </div>


                        <button class="flex-c-m stext-101 cl0 size-121 bg3 bor1 hov-btn3 p-lr-15 trans-04 pointer mb-2">
                            Login
                        </button>
                        <a href="register-customer.html" class="flex-c-m stext-101 cl0 size-121 bg1 bor1 hov-btn3 p-lr-15 trans-04 pointer active clwhite">
                            Register
                        </a>
                    </form>
                </div>


            </div>
        </div>
    </div>

    <!-- Modal login -->
</header>

	<!-- Cart -->
	<div class="wrap-header-cart js-panel-cart">
		<div class="s-full js-hide-cart"></div>

		<div class="header-cart flex-col-l p-l-65 p-r-25">
			<div class="header-cart-title flex-w flex-sb-m p-b-8">
				<span class="mtext-103 cl2">
					Your Cart
				</span>

				<div class="fs-35 lh-10 cl2 p-lr-5 pointer hov-cl1 trans-04 js-hide-cart">
					<i class="zmdi zmdi-close"></i>
				</div>
			</div>

			<div class="header-cart-content flex-w js-pscroll" id="cart_section">
				<ul class="header-cart-wrapitem w-full">
					@php
						$sum = 0;
					@endphp
					@if(count($cart) > 0)
					@foreach ($cart as $item)
						
					@if($item['quantity'] > 0)
					<li class="header-cart-item flex-w flex-t m-b-12">
						<div class="header-cart-item-img" onclick="delete_product({{ $item['product_id'] }})">
							@php
								$image = $item['image'];
							 	$sum += round($item['price'],0) * $item['quantity'] ;
							@endphp
							
							<img  src='{{URL::asset("/products/$image")}}' alt="IMG">
						</div>

						<div class="header-cart-item-txt p-t-8">
							<a href="#" class="header-cart-item-name m-b-18 hov-cl1 trans-04">
							{{$item['name']}}
							</a>

							<span class="header-cart-item-info">
								{{round($item['price'],0)}}*{{ $item['quantity'] }} = {{ round($item['price'],0) * $item['quantity']  }}
							</span>
						</div>
					</li>
                    @endif
					@endforeach
					@else 
					<li class="text-center">No Products in the cart</li>
					@endif
				 


				</ul>
				@if(count($cart) > 0)
				<div class="w-full">
					<div class="header-cart-total w-full p-tb-40">
						Total: {{ $sum }} PKR
					</div>

					<div class="header-cart-buttons flex-w w-full">
						{{-- <a href="{{ url('/cart-detail-info') }}" class="flex-c-m stext-101 cl0 size-107 bg3 bor2 hov-btn3 p-lr-15 trans-04 m-r-8 m-b-10">
							View Cart
						</a> --}}

						<a href="{{ url('/checkout-details-info') }}" class="flex-c-m stext-101 cl0 size-107 bg3 bor2 hov-btn3 p-lr-15 trans-04 m-b-10">
							Check Out
						</a>
					</div>
				</div>
				@endif

			</div>
		</div>
	</div>
