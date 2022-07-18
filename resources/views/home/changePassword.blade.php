@extends('layouts.layout')

@section('content')
    <div class="page-content">

        <!-- Page-Title -->
        <div class="page-title-box">
            <div class="container-fluid">
                <div class="row align-items-center">
                    <div class="col-md-8">
                        <h4 class="page-title mb-1"></h4>
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item active"></li>
                        </ol>
                    </div>

                </div>

            </div>
        </div>
        <!-- end page title end breadcrumb -->

        <div class="page-content-wrapper">
            <div class="container-fluid">
                <div class="row">
                   <div class="row mx-0 mtNegative px-3 w-100 mb-5">
                      <div class="col-md-6 mx-auto">
                         <div class="bg-white rounded-5 py-5 shadow">
                            <div class="text-center mb-4">
                               <img class="rounded-circle w-100 profilePicture"
                                  src="{{ Auth::user()->image ? asset('public/'. Auth::user()->image) : 'https://www.bootdey.com/img/Content/avatar/avatar6.png' }}">
                            </div>

                            <div class="card">
                                <div class="card-body">
                                    <form action="{{ route('password.update') }}" method="POST">
                                        @csrf
                                        <div class="form-group mt-4">
                                            <input type="password" class="form-control" name="oldpassword"
                                                placeholder="Old Password">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control" name="newpassword"
                                                placeholder="New Password">
                                        </div>


                                        <div class="form-group">
                                            <input type="password" class="form-control" name="confirmpassword"
                                                placeholder="Confirm New Password">
                                        </div>

                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </form>
                                </div>
                            </div>
                         </div>
                      </div>
                   </div>
                </div>
             </div>
             </div>
        </div>

    </div>
@endsection
