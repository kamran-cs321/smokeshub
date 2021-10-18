@extends('layouts.master2')
@section('css')
@endsection
@section('content')
<div class="page">
			<div class="page-content">
				<div class="container">
					<div class="row">
						<div class="col-md-6">
							<div class="">
								<div class="text-white">
									<div class="card-body">
										<h2 class="display-4 mb-2 font-weight-bold error-text text-center"><strong>Admin Login</strong></h2>
										{{-- <h4 class="text-white-80 mb-7 text-center">Sign In to your account</h4> --}}
										
										<div class="row">
											<div class="col-9 d-block mx-auto">
												@if (session()->has('error'))
                                            	<div class="alert alert-danger">
                                                	{!! session()->get('error') !!}
                                            	</div>
												@endif
												@if (session()->has('success'))
													<div class="alert alert-success">
														{!! session()->get('success') !!}
													</div>
												@endif
												<form method="post" action="{{ url('/admin/login') }}" autocomplete="off">
												@csrf
												<div class="input-group mb-4">
													<div class="input-group-prepend">
														<div class="input-group-text">
															<i class="fe fe-user"></i>
														</div>
													</div>
													<input type="text" class="form-control" name="email" placeholder="Username" required autocomplete="off">
												</div>
												<div class="input-group mb-4">
													<div class="input-group-prepend">
														<div class="input-group-text">
															<i class="fe fe-lock"></i>
														</div>
													</div>
													<input type="password" class="form-control" name="password" placeholder="Password" required autocomplete="off" >
												</div>
												<div class="row">
													<div class="col-12">
														<button type="submit" class="btn  btn-secondary btn-block px-4">Login</button>
													</div>
												</form>
													{{-- <div class="col-12 text-center">
														<a href="{{ url('/' . $page='forgot-password-2')}}" class="btn btn-link box-shadow-0 px-0 text-white-80">Forgot password?</a>
													</div> --}}
												</div>
											</div>
										</div>
										{{-- <div class="text-center pt-4">
											<div class="font-weight-normal fs-16">You Don't have an account <a class="btn-link font-weight-normal text-white-80" href="#">Register Here</a></div>
										</div> --}}
									</div>
									{{-- <div class="custom-btns text-center">
										<button class="btn btn-icon" type="button"><span class="btn-inner-icon"><i class="fa fa-facebook-f"></i></span></button>
										<button class="btn btn-icon" type="button"><span class="btn-inner-icon"><i class="fa fa-google"></i></span></button>
										<button class="btn btn-icon" type="button"><span class="btn-inner-icon"><i class="fa fa-twitter"></i></span></button>
										<button class="btn btn-icon" type="button"><span class="btn-inner-icon"><i class="fa fa-pinterest-p"></i></span></button>
									</div> --}}
								</div>
							</div>
						</div>
						<div class="col-md-6 d-none d-md-flex align-items-center">
							<img src="{{URL::asset('assets/images/png/login.png')}}" alt="img">
						</div>
					</div>
				</div>
			</div>
        </div>
@endsection
@section('js')
@endsection