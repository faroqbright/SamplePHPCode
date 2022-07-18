@extends('layouts.layout')

@section('content')
<style type="text/css">
	#mySidebar{
		display: none  !important;
	}
	.header{
		display: none;
	}
	#main {
    margin-left: 0px !important;
}
#openNav, #closeNav{
	display: none !important;
}
</style>
	<div class="container">
		<div class="row">
			<div class="col-lg-4 col-md-6 mx-auto">
				<div class="text-center">
					
				{{-- <img src="assets/images/logo-new.jpg" class="w-25 my-5"> --}}
				</div>

				<div class="card">
				  <div class="card-body">
				    <h3 class="font_weight">Reset Password</h3>
				    <p class="font_14 mt-4">Enter your email address and we'll send you a link to reset Your password </p>


					<form action="{{URL::to('check')}}" method="POST"> 
						@csrf
					  <div class="form-group mt-4">
					    
					    <input type="email" class="form-control" id="exampleInputEmail1" name="email" aria-describedby="emailHelp" placeholder="Enter email">
					   
					  </div>
					  
					  <button type="submit" class="btn btn_orange w-100" href="{{ URL::to('check') }}">RESET</button>
	
					  <strong style="color: red">{{session('message')}}</strong>
					</form>


				  </div>
				</div>

			</div>
		</div>
		
	</div>
@endsection	