				<aside class="app-sidebar">
					<div class="app-sidebar__logo">
						<a class="header-brand text-uppercase " href="{{url('/' . $page='index')}}">
						Smokes Hub
							{{-- <img src="{{URL::asset('assets/images/brand/logo.png')}}" class="header-brand-img desktop-lgo" alt="Admintro logo">
							<img src="{{URL::asset('assets/images/brand/logo1.png')}}" class="header-brand-img dark-logo" alt="Admintro logo">
							<img src="{{URL::asset('assets/images/brand/favicon.png')}}" class="header-brand-img mobile-logo" alt="Admintro logo">
							<img src="{{URL::asset('assets/images/brand/favicon1.png')}}" class="header-brand-img darkmobile-logo" alt="Admintro logo">
						</a> --}}
					</div>
					<div class="app-sidebar__user">
						<div class="dropdown user-pro-body text-center">
							<div class="user-pic">
								<img src="{{URL::asset('assets/images/users/2.jpg')}}" alt="user-img" class="avatar-xl rounded-circle mb-1">
							</div>
							<div class="user-info">
								<h5 class=" mb-1">{{ Session::get('user')->username }} <i class="ion-checkmark-circled  text-success fs-12"></i></h5>
								<span class="text-muted app-sidebar__user-name text-sm">Admin</span>
							</div>
						</div>
					 
					</div>
					<ul class="side-menu app-sidebar3">
						<li class="side-item side-item-category mt-4">Main</li>
						<li class="slide">
							<a class="side-menu__item"  href="{{url('/admin/dashboard')}}">
							<svg class="side-menu__icon" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24" width="24"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M19 5v2h-4V5h4M9 5v6H5V5h4m10 8v6h-4v-6h4M9 17v2H5v-2h4M21 3h-8v6h8V3zM11 3H3v10h8V3zm10 8h-8v10h8V11zm-10 4H3v6h8v-6z"/></svg>
							<span class="side-menu__label">Dashboard</span><span class="badge badge-danger side-badge">Hot</span></a>
						</li>
						<li class="side-item side-item-category">Orders & Sales</li>
						<li class="slide">
							<a class="side-menu__item" data-toggle="slide" href="#">
							<svg class="side-menu__icon" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24" width="24"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M16.66 4.52l2.83 2.83-2.83 2.83-2.83-2.83 2.83-2.83M9 5v4H5V5h4m10 10v4h-4v-4h4M9 15v4H5v-4h4m7.66-13.31L11 7.34 16.66 13l5.66-5.66-5.66-5.65zM11 3H3v8h8V3zm10 10h-8v8h8v-8zm-10 0H3v8h8v-8z"/></svg>
							<span class="side-menu__label">Orders</span><i class="angle fa fa-angle-right"></i></a>
							<ul class="slide-menu">
								<li><a href="{{url('/admin/orders')}}" class="slide-item">Show Orders</a></li>
								<li><a href="{{url('/admin/orders/canceled')}}" class="slide-item">Canceled Orders</a></li>
								{{-- <li><a href="{{url('/' . $page='widgets-1')}}" class="slide-item">Widgets</a></li> --}}
							</ul>
						</li>
					
						<li class="side-item side-item-category">Products & info</li>
						<li class="slide">
							<a class="side-menu__item" data-toggle="slide" href="#">
							<svg class="side-menu__icon" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24" width="24"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M4 8h4V4H4v4zm6 12h4v-4h-4v4zm-6 0h4v-4H4v4zm0-6h4v-4H4v4zm6 0h4v-4h-4v4zm6-10v4h4V4h-4zm-6 4h4V4h-4v4zm6 6h4v-4h-4v4zm0 6h4v-4h-4v4z"/></svg>
							<span class="side-menu__label">Products</span><i class="angle fa fa-angle-right"></i></a>
							<ul class="slide-menu ">
								 
								 <li>
									<a class="slide-item"  href="{{ url('/admin/products')}}">Show Products</a>
									<a class="slide-item"  href="{{ url('/admin/product/create')}}">Add Products</a>
									
								</li>
							 
							</ul>
						</li>

						<li class="side-item side-item-category">Customers Info</li>
						<li class="slide">
							<a class="side-menu__item" data-toggle="slide" href="#">
							<svg class="side-menu__icon" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24" width="24"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M4 8h4V4H4v4zm6 12h4v-4h-4v4zm-6 0h4v-4H4v4zm0-6h4v-4H4v4zm6 0h4v-4h-4v4zm6-10v4h4V4h-4zm-6 4h4V4h-4v4zm6 6h4v-4h-4v4zm0 6h4v-4h-4v4z"/></svg>
							<span class="side-menu__label">Customers</span><i class="angle fa fa-angle-right"></i></a>
							<ul class="slide-menu ">
								 
								 <li>
									<a class="slide-item"  href="{{ url('/admin/customers')}}">Show Customers</a>
									
									
								</li>
								<li>
									<a class="slide-item"  href="{{ url('/admin/messages')}}">  Messages</a>
									
									
								</li>
							 
							</ul>
						</li>
						 
{{-- 						 
						<li class="side-item side-item-category">Tables & Icons </li>
						<li class="slide">
							<a class="side-menu__item" data-toggle="slide" href="{{ url('/' . $page='#')}}">
							<svg class="side-menu__icon" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24" width="24"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M20 3H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h15c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm0 2v3H5V5h15zm-5 14h-5v-9h5v9zM5 10h3v9H5v-9zm12 9v-9h3v9h-3z"/></svg>
							<span class="side-menu__label">Tables</span><i class="angle fa fa-angle-right"></i></a>
							<ul class="slide-menu">
								<li><a href="{{url('/' . $page='tables')}}" class="slide-item">Default table</a></li>
								<li><a href="{{url('/' . $page='datatable')}}" class="slide-item">Data Table</a></li>
							</ul>
						</li>
						 
						<li class="side-item side-item-category">Pages & E-Commerce</li>
						<li class="slide">
							<a class="side-menu__item" data-toggle="slide" href="{{ url('/' . $page='#')}}">
							<svg class="side-menu__icon" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24" width="24"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M11.99 18.54l-7.37-5.73L3 14.07l9 7 9-7-1.63-1.27zM12 16l7.36-5.73L21 9l-9-7-9 7 1.63 1.27L12 16zm0-11.47L17.74 9 12 13.47 6.26 9 12 4.53z"/></svg>
							<span class="side-menu__label">Pages</span><i class="angle fa fa-angle-right"></i></a>
							<ul class="slide-menu">
								<li class="sub-slide">
									<a class="sub-side-menu__item" data-toggle="sub-slide" href="{{ url('/' . $page='#')}}"><span class="sub-side-menu__label">Profile</span><i class="sub-angle fe fe-chevron-down"></i></a>
									<ul class="sub-slide-menu">
										<li><a class="sub-slide-item" href="{{url('/' . $page='profile-1')}}">Profile 01</a></li>
										<li><a class="sub-slide-item" href="{{url('/' . $page='profile-2')}}">Profile 02</a></li>
										<li><a class="sub-slide-item" href="{{url('/' . $page='profile-3')}}">Profile 03</a></li>
									</ul>
								</li>
								<li><a href="{{url('/' . $page='editprofile')}}" class="slide-item"> Edit Profile</a></li>
								<li class="sub-slide">
									<a class="sub-side-menu__item" data-toggle="sub-slide" href="{{ url('/' . $page='#')}}"><span class="sub-side-menu__label">Email</span><i class="sub-angle fe fe-chevron-down"></i></a>
									<ul class="sub-slide-menu">
										<li><a class="sub-slide-item" href="{{url('/' . $page='email-compose')}}">Email Compose</a></li>
										<li><a class="sub-slide-item" href="{{url('/' . $page='email-inbox')}}">Email Inbox</a></li>
										<li><a class="sub-slide-item" href="{{url('/' . $page='email-read')}}">Email Read</a></li>
									</ul>
								</li>
							 
								</ul>
						</li>
						 --}}
					 
						 
					</ul>
				</aside>
				<!--aside closed-->