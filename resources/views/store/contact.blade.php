@include('store.layout.header')
	<!-- Header -->
@include('store.layout.navbar')
	<!-- Header ends here -->
 
	<!-- Title page -->
	<section class="bg-img1 txt-center p-lr-15 p-tb-92" style="background-image: url({{URL::asset('/storage/images/bg-01.jpg')}});">
		<h2 class="ltext-105 cl0 txt-center mt-5">
			Contact US
		</h2>
	</section>


	<!-- Content page -->
	<section class="bg0 p-t-104 p-b-116">
		<div class="container">
			<div class="flex-w flex-tr">
				<div class="size-210 bor10 p-lr-70 p-t-55 p-b-70 p-lr-15-lg w-full-md">
					<form method="POST" id="contact_form">
						@csrf
						<h4 class="mtext-105 cl2 txt-center p-b-30">
							Send Us A Message
						</h4>
						<div class="bor8 m-b-20 how-pos4-parent">
							<input class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30" type="text" id="user_name" name="user_name" placeholder="Your Name" required>
							<img class="how-pos4 pointer-none" src="{{URL::asset('/storage/images/icons/avatar.png')}}" alt="ICON">
							
						</div>
						<div class="bor8 m-b-20 how-pos4-parent">
							<input class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30" type="text" id="user_email" name="user_email" placeholder="Your Email Address" required>
							<img class="how-pos4 pointer-none" src="{{URL::asset('/storage/images/icons/icon-email.png')}}" alt="ICON">
							
						</div>
						<div class="bor8 m-b-20 how-pos4-parent">
							<input class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30" type="number" id="user_phone" name="user_phone" placeholder="Your Phone Number">
							<img class="how-pos4 pointer-none" src="{{URL::asset('/storage/images/icons/phone-number.png')}}" alt="ICON">
							
						</div>
						<div class="bor8 m-b-30">
							<textarea class="stext-111 cl2 plh3 size-120 p-lr-28 p-tb-25" id="user_message" name="user_message" placeholder="How Can We Help?" required></textarea>
						</div>

						<button class="flex-c-m stext-101 cl0 size-121 bg3 bor1 hov-btn3 p-lr-15 trans-04 pointer">
							Submit
						</button>
					</form>
				</div>

				<div class="size-210 bor10 flex-w flex-col-m p-lr-93 p-tb-30 p-lr-15-lg w-full-md">
					<div class="flex-w w-full p-b-42">
						<span class="fs-18 cl5 txt-center size-211">
							<span class="lnr lnr-map-marker"></span>
						</span>

						<div class="size-212 p-t-2">
							<span class="mtext-110 cl2">
								Address
							</span>

							<p class="stext-115 cl6 size-213 p-t-18">
								600 W 15th St. Long Beach CA 90813
							</p>
						</div>
					</div>
					<div class="flex-w w-full">
						<span class="fs-18 cl5 txt-center size-211">
							<span class="lnr lnr-envelope"></span>
						</span>

						<div class="size-212 p-t-2">
							<span class="mtext-110 cl2">
								Sale Support
							</span>

							<p class="stext-115 cl1 size-213 p-t-18">
								contact@repostdeals.com
							</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>


	<!-- Map -->
	{{-- <div class="map">
		<div class="size-303" id="google_map" data-map-x="40.691446" data-map-y="-73.886787" data-pin="images/icons/pin.png" data-scrollwhell="0" data-draggable="1" data-zoom="11"></div>
	</div> --}}



	<!-- Footer -->
	@include('store.layout.footer')