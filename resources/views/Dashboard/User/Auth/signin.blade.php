@extends('Dashboard.layouts.master2')
@section('css')

<style>

	.loginform{
		display:none;
	}
</style>


<!-- Sidemenu-respoansive-tabs css -->
<link href="{{URL::asset('Dashboard/plugins/sidemenu-responsive-tabs/css/sidemenu-responsive-tabs.css')}}" rel="stylesheet">
@endsection
@section('content')
		<div class="container-fluid">
			<div class="row no-gutter">
				<!-- The image half -->
				<div class="col-md-6 col-lg-6 col-xl-7 d-none d-md-flex bg-primary-transparent">
					<div class="row wd-100p mx-auto text-center">
						<div class="col-md-12 col-lg-12 col-xl-12 my-auto mx-auto wd-100p">
							<img src="{{URL::asset('Dashboard/img/media/login.png')}}" class="my-auto ht-xl-80p wd-md-100p wd-xl-80p mx-auto" alt="logo">
						</div>
					</div>
				</div>
				<!-- The content half -->
				<div class="col-md-6 col-lg-6 col-xl-5 bg-white">
					<div class="login d-flex align-items-center py-2">
						<!-- Demo content-->
						<div class="container p-0">
							<div class="row">
								<div class="col-md-10 col-lg-10 col-xl-9 mx-auto">
									<div class="card-sigin">
										<div class="mb-5 d-flex"> <a href="{{ url('/' . $page='index') }}"><img src="{{URL::asset('Dashboard/img/brand/favicon.png')}}" class="sign-favicon ht-40" alt="logo"></a><h1 class="main-logo1 ml-1 mr-0 my-auto tx-28">Va<span>le</span>x</h1></div>
										<div class="card-sigin">
											<div class="main-signup-header">
												<h2>{{trans('Dashboard/login_trans.Welcome')}}</h2>


												@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif





												<div class="form-group">
    <label for="exampleFormControlSelect1">{{trans('Dashboard/login_trans.Select_Enter')}}</label>
    <select class="form-control" id="exampleFormControlSelect1">
		<option value='' selected disabled>{{trans('Dashboard/login_trans.Choose_list')}}</option>
      <option value='admin'>{{trans('Dashboard/login_trans.admin')}}</option>
	  <option value='doctor'>{{trans('Dashboard/login_trans.doctor')}}</option>
	  <option value='Ray_Employee'>{{trans('Dashboard/login_trans.Ray_Employee')}}</option>
	  <option value='Lab_Employee'>{{trans('Dashboard/login_trans.Lab_Employee')}}</option>
	  <option value='patient'>{{trans('Dashboard/login_trans.patient')}}</option>
    </select>
  </div>
												




  <!-- form admin -->

  <div class='loginform' id='admin'>
												<h5 class="font-weight-semibold mb-4">{{trans('Dashboard/login_trans.admin')}}</h5>
											
											
											
											
												<form method="POST" action="{{ route('login.admin') }}">
        @csrf
													<div class="form-group">
														<label>{{trans('Dashboard/login_trans.Email')}}</label> <input class="form-control" name="email" placeholder="Enter your email" type="email" autofocus :value="old('email')" required >
													</div>
													<div class="form-group">
														<label>{{trans('Dashboard/login_trans.Password')}}</label> <input class="form-control" placeholder="Enter your password" name="password" type="password"  required autocomplete="current-password">
													</div><button type='submit' class="btn btn-main-primary btn-block">{{trans('Dashboard/login_trans.Sign_In')}}</button>
												</form>
												<div class="main-signin-footer mt-5">
													<p><a href="">{{trans('Dashboard/login_trans.Forgot')}}</a></p>
													<p><a href="{{ url('/register') }}">{{trans('Dashboard/login_trans.Create_Account')}}</a></p>
												</div>
</div>

 <!-- end form admin -->


 
  <!-- form doctor -->

  <div class='loginform' id='doctor'>
												<h5 class="font-weight-semibold mb-4">{{trans('Dashboard/login_trans.doctor')}}</h5>
											
											
											
											
												<form method="POST" action="{{ route('login.doctor') }}">
        @csrf
													<div class="form-group">
														<label>{{trans('Dashboard/login_trans.Email')}}</label> <input class="form-control" name="email" placeholder="Enter your email" type="email" autofocus :value="old('email')" required >
													</div>
													<div class="form-group">
														<label>{{trans('Dashboard/login_trans.Password')}}</label> <input class="form-control" placeholder="Enter your password" name="password" type="password"  required autocomplete="current-password">
													</div><button type='submit' class="btn btn-main-primary btn-block">{{trans('Dashboard/login_trans.Sign_In')}}</button>
												</form>
												<div class="main-signin-footer mt-5">
													<p><a href="">{{trans('Dashboard/login_trans.Forgot')}}</a></p>
													<p><a href="{{ url('/register') }}">{{trans('Dashboard/login_trans.Create_Account')}}</a></p>
												</div>
</div>

 <!-- end form doctor -->


   <!-- form doctor -->

   <div class='loginform' id='Ray_Employee'>
												<h5 class="font-weight-semibold mb-4">{{trans('Dashboard/login_trans.Ray_Employee')}}</h5>
											
											
											
											
												<form method="POST" action="{{ route('login.Ray_Employee') }}">
        @csrf
													<div class="form-group">
														<label>{{trans('Dashboard/login_trans.Email')}}</label> <input class="form-control" name="email" placeholder="Enter your email" type="email" autofocus :value="old('email')" required >
													</div>
													<div class="form-group">
														<label>{{trans('Dashboard/login_trans.Password')}}</label> <input class="form-control" placeholder="Enter your password" name="password" type="password"  required autocomplete="current-password">
													</div><button type='submit' class="btn btn-main-primary btn-block">{{trans('Dashboard/login_trans.Sign_In')}}</button>
												</form>
												<div class="main-signin-footer mt-5">
													<p><a href="">{{trans('Dashboard/login_trans.Forgot')}}</a></p>
													<p><a href="{{ url('/register') }}">{{trans('Dashboard/login_trans.Create_Account')}}</a></p>
												</div>
</div>

 <!-- end form doctor -->

     <!-- form doctor -->

   <div class='loginform' id='Lab_Employee'>
												<h5 class="font-weight-semibold mb-4">{{trans('Dashboard/login_trans.Lab_Employee')}}</h5>
											
											
											
											
												<form method="POST" action="{{ route('login.lab_employee') }}">
        @csrf
													<div class="form-group">
														<label>{{trans('Dashboard/login_trans.Email')}}</label> <input class="form-control" name="email" placeholder="Enter your email" type="email" autofocus :value="old('email')" required >
													</div>
													<div class="form-group">
														<label>{{trans('Dashboard/login_trans.Password')}}</label> <input class="form-control" placeholder="Enter your password" name="password" type="password"  required autocomplete="current-password">
													</div><button type='submit' class="btn btn-main-primary btn-block">{{trans('Dashboard/login_trans.Sign_In')}}</button>
												</form>
												<div class="main-signin-footer mt-5">
													<p><a href="">{{trans('Dashboard/login_trans.Forgot')}}</a></p>
													<p><a href="{{ url('/register') }}">{{trans('Dashboard/login_trans.Create_Account')}}</a></p>
												</div>
</div>

 <!-- end form doctor -->

 <!-- form admin -->

 <div class='loginform' id='patient'>
												<h5 class="font-weight-semibold mb-4">{{trans('Dashboard/login_trans.patient')}}</h5>
											
											
											
											
												<form method="POST" action="{{ route('login.patient') }}">
        @csrf
													<div class="form-group">
														<label>{{trans('Dashboard/login_trans.Email')}}</label> <input class="form-control" name="email" placeholder="Enter your email" type="email" autofocus :value="old('email')" required >
													</div>
													<div class="form-group">
														<label>{{trans('Dashboard/login_trans.Password')}}</label> <input class="form-control" placeholder="Enter your password" name="password" type="password"  required autocomplete="current-password">
													</div><button type='submit' class="btn btn-main-primary btn-block">{{trans('Dashboard/login_trans.Sign_In')}}</button>
												</form>
												<div class="main-signin-footer mt-5">
													<p><a href="">{{trans('Dashboard/login_trans.Forgot')}}</a></p>
													<p><a href="{{ url('/register') }}">{{trans('Dashboard/login_trans.Create_Account')}}</a></p>
												</div>
</div>

 <!-- end form admin -->
											</div>
										</div>
									</div>
								</div>
							</div>
						</div><!-- End -->
					</div>
				</div><!-- End -->
			</div>
		</div>
@endsection
@section('js')

<script>
	$('#exampleFormControlSelect1').change(function(){ //#exampleFormControlSelect1(id select)
		var myId= $(this).val(); //take value
		$('.loginform').each(function(){//class form
			myId === $(this).attr('id')? $(this).show():$(this).hide();//نفس قيمه selectهياخدنفس id form
		});
	});
</script>


@endsection