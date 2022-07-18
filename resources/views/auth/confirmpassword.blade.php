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
				    <p class="font_14 mt-4">Enter your password </p>


					<form action="{{URL::to('update')}}" method="POST"> 
						@csrf
					  <input type="hidden" name="user_id" value="{{ base64_decode($id) }}">
                      <div class="form-group mt-4">
					    
					    <input type="password" class="form-control" id="exampleInputPassword2" name="newpassword" aria-describedby="passwordHelp" placeholder="Enter New Password">
					   
					  </div>
					  @if($errors->first('newpassword'))
				 <div class="alert-danger">{{$errors->first('newpassword')}}</div>
				@endif
                      <div class="form-group mt-4">
					    
					    <input type="password" class="form-control" id="exampleInputPassword3" name="confirmpassword" aria-describedby="passwordHelp" placeholder="Confirm Password">
					   
					  </div>
					  @if($errors->first('confirmpassword'))
				 <div class="alert-danger">{{$errors->first('confirmpassword')}}</div>
				@endif
					  
					  <button type="submit" class="btn btn_orange w-100" href="">RESET</button>
	
					  <strong style="color: red">{{session('message')}}</strong>
					</form>


				  </div>
				</div>

			</div>
		</div>
		
	</div>
@endsection	