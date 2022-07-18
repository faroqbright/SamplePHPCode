@extends('layouts.layout')

@section('content')
    <style type="text/css">
        #mySidebar {
            display: none !important;
        }

        .header {
            display: none;
        }

        #main {
            margin-left: 0px !important;
        }

        #openNav,
        #closeNav {
            display: none !important;
        }

    </style>

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
                    <div class="col-lg-4 col-md-6 mx-auto">
                        <div class="text-center">
                            <img src="{{ Auth::user()->image ? asset('public/'. Auth::user()->image) : 'https://bootdey.com/img/Content/avatar/avatar6.png' }}" class="w-25 my-5" alt="">
                        </div>

                        <div class="card">
                            <div class="card-body">
                                <h3 class="font_weight">Change Password</h3>

                                <form action="{{ URL::to('chang_password') }}" method="POST">
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

                                    <button type="submit" class="btn btn_orange w-100">Submit</button>
                                </form>


                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </div>

    </div>
@endsection
