@extends('layouts.layout')
@section('content')
    <style type="text/css">
        .avatar-upload-cover .avatar-preview {
            height: 200px !important;
        }

        .avatar-upload {
            position: relative !important;
            max-width: 100px !important;
            margin: 0px auto 20px auto !important;
        }

        .avatar-upload .avatar-edit {
            position: absolute !important;
            right: 12px !important;
            z-index: 1 !important;
            top: 10px !important;
        }

        .avatar-upload .avatar-edit input {
            display: none !important;
        }

        .avatar-upload .avatar-edit input+label {
            display: inline-block !important;
            width: 34px !important;
            height: 34px !important;
            margin-bottom: 0 !important;
            border-radius: 100% !important;
            background: #FFFFFF !important;
            border: 1px solid transparent !important;
            box-shadow: 0px 2px 4px 0px rgba(0, 0, 0, 0.12) !important;
            cursor: pointer !important;
            font-weight: normal !important;
            transition: all 0.2s ease-in-out !important;
            position: absolute;
            bottom: 0px;
            right: -9px;
        }

        .avatar-upload .avatar-edit input+label:hover {
            background: #f1f1f1 !important;
            border-color: #d6d6d6 !important;
        }

        .avatar-upload .avatar-edit input+label:after {
            content: "\f040" !important;
            font-family: 'FontAwesome' !important;
            color: #757575 !important;
            position: absolute !important;
            bottom: 10px !important;
            top: inherit !important;
            left: inherit !important;
            right: 0 !important;
            text-align: center !important;
            margin: auto !important;
        }

        .avatar-upload .avatar-preview {
            width: 100px !important;
            height: 100px !important;
            position: relative !important;
            border-radius: 100% !important;
            border: 3px solid #57576f !important;
            box-shadow: 0px 2px 4px 0px rgba(0, 0, 0, 0.1) !important;
        }

        .avatar-upload .avatar-preview>div {
            width: 100% !important;
            height: 100% !important;
            border-radius: 100% !important;
            background-size: cover !important;
            background-repeat: no-repeat !important;
            background-position: center !important;
        }

        .fa-camera {
            padding: 8px;
            background: blue;
            border-radius: 50%;
            border: 2px solid white;
            position: absolute;
            bottom: 0px;
            right: 0px;
            z-index: 1;
            color: white;
        }

        .mtNegative .nav-item {
            border: 0px solid #3a77f6;
        }

        .mtNegative .nav-tabs .nav-link {
            border: 0px solid;
            color: #6c757d9e !important;
        }

        .mtNegative .nav-tabs .nav-item.show .nav-link,
        .nav-tabs .nav-link.active {
            border-bottom: 2px solid #428cf8;
            color: black !important;
        }

        .mtNegative .nav-item:hover {
            border-left: 0px solid;
        }

        .input-bg-preview {
            padding: 5px 18px;
        }

        .avatar-upload-cover .avatar-edit {
            position: absolute;
            right: 0px;
            z-index: 1;
            top: 0px;
            left: 0px;
            bottom: 0px;
            opacity: 0;
        }

        .avatar-upload-cover .avatar-edit input+label {
            display: inline-block;
            width: 100%;
            height: 156px;
            margin-bottom: 0;
            border-radius: 0%;
            background: #ffffff;
            border: 1px solid transparent;
            box-shadow: 0px 2px 4px 0px rgba(0, 0, 0, 0.12);
            cursor: pointer;
            font-weight: normal;
            transition: all 0.2s ease-in-out;
        }

        .avatar-upload-cover .avatar-edit input+label:after {
            content: "\f040";
            font-family: "FontAwesome";
            color: #757575;
            position: absolute;
            top: 10px;
            text-align: center;
            margin: auto;
        }

        .avatar-upload-cover .avatar-preview {
            width: 100%;
            height: 156px;
            position: relative;
            margin: auto;
            border-radius: 8px;
            box-shadow: 0px 2px 4px 0px rgba(0, 0, 0, 0.1);
        }

        .changeCover {
            position: absolute;
            right: 20px;
            top: 20px;
            border: 1px solid white;
            border-radius: 5px;
            padding: 5px;
        }

        .rounded-5 {
            border-radius: 15px;
        }

        .mtNegative {
            margin-top: -50px;
        }

        .avatar-upload-cover .avatar-preview>div {
            width: 100%;
            height: 100%;
            border-radius: 0%;
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center;
        }

        .profilePicture {
            width: 150px !important;
            height: 150px;
        }

    </style>
    <div class="container-fluid">
        <div class="row">

            <!-- /***************
          cover  upload
          *******************/ -->
            <div class="row mt-4 w-100 mx-0">
                <div class="col-md-12 pr-0">
                    <div class="avatar-upload-cover mb-md-0 mb-2 position-relative">
                        <div class="avatar-edit">
                            <input type="file" style="display: none;" id="imageUpload-cover" accept=".png, .jpg, .jpeg"
                                name="bg_img">
                            <label for="imageUpload-cover"></label>
                        </div>
                        <div class="avatar-preview">
                            <div id="imagePreview-cover"
                                style="border-radius:14px;background-image: url({{ asset('public/assets/imgs/sidenavHeader.png') }});">
                            </div>
                        </div>
                        <img class="changeCover" src="{{ asset('public/assets/imgs/changeCover.png') }}">
                    </div>
                </div>
            </div>

            <!-- /***************
          dp  upload
          *******************/ -->
            <div class="row mx-0 mtNegative px-3 w-100 mb-5">
                <div class="col-md-6 mx-auto">
                    <div class="bg-white rounded-5 py-5 shadow">
                        <div class="text-center mb-4">
                            <img class="rounded-circle w-100 profilePicture"
                                src="public/assets/imgs/{{ Auth::user()->image }}">
                        </div>
                        {{-- <i onclick="edit_profile('{{ $profile->id }}')" class="fas fa-edit"></i> --}}
                        {{-- <a href="{{URL::to('edit_profile')}}" class="trash-button mt-2 text-primary" data-toggle="modal" data-target="#updatemodal">
                     <i class="fas fa-edit"></i>
                     </a> --}}
                        <a href="{{ url('edit_profile') }}" data-toggle="modal" data-target="#updatemodal">
                            <button>Edit Profile</button>
                        </a>

                        <h1 class="h4 text-center font-weight-bold">{{ Auth::user()->name }}</h1>
                        <p class="text-center text-secondary">{{ Auth::user()->email }}</p>
                        <div class="px-4 w-100 mt-4">
                            <div class="eventAlertMain w-100 d-inline-flex border-bottom pb-2">
                                <i class="fa fa-phone my-auto mr-2" aria-hidden="true"></i>
                                <h5 class="mt-2">Phone</h5>
                                <h6 class="ml-auto mt-2">
                                    <strong>{{ Auth::user()->phone }}</strong>
                                </h6>
                            </div>
                            <div class="eventAlertMain w-100 d-inline-flex border-bottom pb-2 mt-2">
                                <i class="fa fa-user my-auto mr-2" aria-hidden="true"></i>
                                <h5 class="mt-2">Gender</h5>
                                <h6 class="ml-auto mt-2">
                                    <strong>{{ Auth::user()->gender }}</strong>
                                </h6>
                            </div>
                            <h5 class="mt-2">Address</h5>
                            <h6 class="ml-auto mt-2">
                                <strong>{{ Auth::user()->address }}</strong>
                            </h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    {{-- modal --}}

    <div class="modal fade" id="updatemodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Update Profile</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="alert alert-danger print-error-msg" style="display:none">
                    <ul></ul>
                </div>
                <form action="{{ URL::to('update-profile') }}" method="POST"'>
       @csrf
       <div class="modal-body">
       <div class="row">
       <div class="col-md-12">
       <div class="form-group">
       <label for="exampleFormControlInput1">Name</label>
       <input type=' hidden'name='user_id' id="user_id">
                    <input type="text" class="form-control" value="{{ Auth::user()->name }}" name="name" required>
            </div>
        </div>
        <div class="col-md-12">
            <div class="form-group">
                <label for="exampleFormControlInput1">Gender</label>
                <input type="text" class="form-control" value="{{ Auth::user()->gender }}" name="gender" required>
            </div>
        </div>
        <div class="col-md-12">
            <div class="form-group">
                <label for="exampleFormControlInput1">Email</label>
                <input type="text" class="form-control" value="{{ Auth::user()->email }}" name="email" required>
            </div>
        </div>
        <div class="col-md-12">
            <div class="form-group">
                <label for="exampleFormControlInput1">Address</label>
                <input type="text" class="form-control" value="{{ Auth::user()->address }}" name="address" required>
            </div>
        </div>
        <div class="col-md-12">
            <div class="form-group">
                <label for="exampleFormControlInput1">Phone</label>
                <input type="text" class="form-control" value="{{ Auth::user()->phone }}" name="phone" required>
            </div>
        </div>


    </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
        <button type="submit" class="btn btn-success btn-submit">Update</button>
    </div>
    </form>
    </div>
    </div>
    </div>


@endsection
