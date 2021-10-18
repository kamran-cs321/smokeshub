
	<!-- Footer -->
	<footer class="bg3 p-t-75 p-b-32">
		<div class="container">
		  <div class="row">
			<div class="col-sm-6 col-lg-2 p-b-50">
			  <h4 class="stext-301 cl0 p-b-30">
				Categories
			  </h4>
			  @foreach ($categories as $category)
			  
			  @if($loop->iteration < 4)
			  <li class="p-b-10">
				<a  href='{{ url("/products-category/$category->name") }}' class="stext-107 cl7 hov-cl1 trans-04" data-filter=".{{$category->name}}">
					{{$category->name}}
				</a>
			  </li>

			  
			  
			  @endif
			  @endforeach

 
			</div>
  
			<div class="col-sm-6 col-lg-2 p-b-50">
			  <h4 class="stext-301 cl0 p-b-30">
				Help
			  </h4>
  
			  <ul>
				<li class="p-b-10">
				  <a href="privacy-policy.html" class="stext-107 cl7 hov-cl1 trans-04">
					Privacy Policy
				  </a>
				</li>
				
				<li class="p-b-10">
				  <a href="{{ url('/terms-and-conditions') }}" class="stext-107 cl7 hov-cl1 trans-04">
					Terms of service
				  </a>
				</li>
  
				<li class="p-b-10">
				  <a href="return-policy.html" class="stext-107 cl7 hov-cl1 trans-04">
					Return Policy
				  </a>
				</li>
			  </ul>
			</div>
  
			<div class="col-sm-6 col-lg-4 p-b-50">
			  <h4 class="stext-301 cl0 p-b-30">
				GET IN TOUCH
			  </h4>
  
			  <p class="stext-107 cl7 size-201">
				smokeshubpakistan@gmail.com
			  </p>
			  <p class="stext-107 cl7 size-201">
				+923091615501
			  </p>
  
			  {{-- <div class="p-t-27">
				<a href="#" class="fs-18 cl7 hov-cl1 trans-04 m-r-16">
				  <i class="fa fa-twitter"></i>
				</a>
				<a href="#" class="fs-18 cl7 hov-cl1 trans-04 m-r-16">
				  <i class="fa fa-facebook"></i>
				</a>
  
				<a href="#" class="fs-18 cl7 hov-cl1 trans-04 m-r-16">
				  <i class="fa fa-instagram"></i>
				</a>
  
				<a href="#" class="fs-18 cl7 hov-cl1 trans-04 m-r-16">
				  <i class="fa fa-pinterest-p"></i>
				</a>
			  </div> --}}
			</div>
			<div class="col-sm-6 col-lg-4 p-b-50">
			  <h4 class="stext-301 cl0 p-b-30">
				Never Miss A Release
			  </h4>
			  <form method="POST" id="subscriber-request">
				@csrf
				<div class="wrap-input1 w-full p-b-4">
				  <input class="input1 bg-none plh1 stext-107 cl7"  id="email_address" type="email" name="email" placeholder="email@example.com" required>
				  <div class="focus-input1 trans-04"></div>
				</div>
  
				<div class="p-t-18">
				  <button  type="submit" class="flex-c-m stext-101 cl0 size-103 bg1 bor1 hov-btn2 p-lr-15 trans-04 size-103-inline-b ">Subscribe Now</button>
				  <!-- <a class="flex-c-m stext-101 cl0 size-103 bg1 bor1 hov-btn2 p-lr-15 trans-04 size-103-inline-b" href="customer-login.html">
					Customer Login
				  </a> -->
				</div>
			  </form>
			</div>
		  </div>
  
		  <div class="p-t-40">
			 
  
			<p class="stext-107 cl6 txt-center">
			  <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
			  Copyright &copy;<script>
				document.write(new Date().getFullYear());
			  </script> All rights reserved </a>
			  <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
  
			</p>
		  </div>
		</div>
	  </footer>

      
<!--===============================================================================================-->
	<!--===============================================================================================-->
	<script src="{{ asset('vendor/jquery/jquery-3.2.1.min.js') }}"></script>
	<!--===============================================================================================-->
	<script src="{{ asset('vendor/animsition/js/animsition.min.js') }}"></script>
	<!--===============================================================================================-->
	<script src="{{ asset('vendor/bootstrap/js/popper.js') }}"></script>
	<script src=" {{ asset('vendor/bootstrap/js/bootstrap.min.js') }}"></script>
	<!--===============================================================================================-->
	<script src="{{ asset('vendor/select2/select2.min.js') }}"></script>
	<script>
		$(".js-select2").each(function(){
			$(this).select2({
				minimumResultsForSearch: 20,
				dropdownParent: $(this).next('.dropDownSelect2')
			});
		})
	</script>
	<!--===============================================================================================-->
	<script src="{{ asset('vendor/daterangepicker/moment.min.js') }}"></script>
	<script src="{{ asset('vendor/daterangepicker/daterangepicker.js') }}"></script>
	<!--===============================================================================================-->
	<script src=" {{ asset('vendor/slick/slick.min.js') }}"></script>
	<script src=" {{ asset('user/js/slick-custom.js') }}"></script>
	<!--===============================================================================================-->
	<script src="{{ asset('vendor/parallax100/parallax100.js') }}"></script>
	<script src="{{ asset('vendor/validation/validate.min.js') }}"></script>
	<script src="{{ asset('user/js/validation.js') }}"></script>
	<script>
		$('.parallax100').parallax100();
	</script>
	<!--===============================================================================================-->
	<script src="{{ asset('vendor/MagnificPopup/jquery.magnific-popup.min.js') }}"></script>
	<script>
		$('.gallery-lb').each(function() { // the containers for all your galleries
			$(this).magnificPopup({
		        delegate: 'a', // the selector for gallery item
		        type: 'image',
		        gallery: {
		        	enabled:true
		        },
		        mainClass: 'mfp-fade'
		    });
		});
	</script>
<!--===============================================================================================-->
<script src="{{ asset('vendor/isotope/isotope.pkgd.min.js') }}"></script>
<!--===============================================================================================-->
<script src="{{ asset('vendor/sweetalert/sweetalert.min.js') }}"></script>
	<script>
		$('.js-addwish-b2, .js-addwish-detail').on('click', function(e){
			e.preventDefault();
		});

		$('.js-addwish-b2').each(function(){
			var nameProduct = $(this).parent().parent().find('.js-name-b2').html();
			$(this).on('click', function(){
				swal(nameProduct, "is added to wishlist !", "success");

				$(this).addClass('js-addedwish-b2');
				$(this).off('click');
			});
		});

		$('.js-addwish-detail').each(function(){
			var nameProduct = $(this).parent().parent().parent().find('.js-name-detail').html();

			$(this).on('click', function(){
				swal(nameProduct, "is added to wishlist !", "success");

				$(this).addClass('js-addedwish-detail');
				$(this).off('click');
			});
		});

		/*---------------------------------------------*/

		$('.js-addcart-detail').each(function(){
			var nameProduct = $(this).parent().parent().parent().parent().find('.js-name-detail').html();
			$(this).on('click', function(){
				swal(nameProduct, "is added to cart !", "success");
			});
		});

	</script>
<!--===============================================================================================-->
<script src="{{ asset('vendor/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>
	<script>
		$('.js-pscroll').each(function(){
			$(this).css('position','relative');
			$(this).css('overflow','hidden');
			var ps = new PerfectScrollbar(this, {
				wheelSpeed: 1,
				scrollingThreshold: 1000,
				wheelPropagation: false,
			});

			$(window).on('resize', function(){
				ps.update();
			})
		});
	</script>
<!--===============================================================================================-->
<script src="{{ asset('user/js/main.js') }}"></script>
<script src="{{ asset('js/custom_scripts.js') }}"></script>
</body>
</html>