

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
               <!-- /***************
                  dp  upload
                  *******************/ -->
               <div class="row mx-0 mtNegative px-3 w-100 mb-5">
                  <div class="col-md-6 mx-auto">
                     <div class="bg-white rounded-5 py-5 shadow">
                        <div class="text-center mb-4">
                           <img class="rounded-circle w-100 profilePicture"
                              src="{{ $user->image ? asset('public/'. $user->image) : 'https://www.bootdey.com/img/Content/avatar/avatar6.png' }}">
                        </div>
                        <a class="d-flex justify-content-center" href="{{ url('edit_profile') }}" data-toggle="modal" data-target="#updatemodal">
                        <button class="btn btn-link"><i class="fas fa-edit"></i> Edit Profile</button>
                        </a>
                        <h1 class="h4 text-center font-weight-bold">{{ Auth::user()->name }}</h1>
                        <p class="text-center text-secondary">{{ $user->email }}</p>
                        <div class="px-4 w-100 mt-4">
                           <div class="eventAlertMain w-100 d-inline-flex border-bottom pb-2">
                              <i class="fa fa-phone my-auto mr-2" aria-hidden="true"></i>
                              <h5 class="mt-2">Phone</h5>
                              <h6 class="ml-auto mt-2">
                                 <strong>{{ $user->phone }}</strong>
                              </h6>
                           </div>

                           <div class="eventAlertMain w-100 d-inline-flex pb-2">
                            <i class="fa fa-map-marker my-auto mr-2" aria-hidden="true"></i>
                            <h5 class="mt-2">Address</h5>
                            <h6 class="ml-auto mt-2">
                               <strong>{{ $user->address }}</strong>
                            </h6>
                         </div>

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
                  <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
                     @csrf @method('patch')
                     <div class="modal-body">
                        <div class="row">
                           <div class="col-md-12">
                            <div class="form-group">
                                <label>Profile Image</label>
                                <div class="custom-file">
                                    <input type="file" name="image" class="custom-file-input" id="validationCustomFile" accept=".png, .jpg, .jpeg, .svg, .gif">
                                    <label class="custom-file-label" for="validationCustomFile">Choose file...</label>
                                </div>
                            </div>
                           </div>
                           <div class="col-md-12">
                              <div class="form-group">
                                 <label for="exampleFormControlInput1">Name</label>
                                 <input type="text" class="form-control" value="{{ $user->username }}" name="username" required>
                              </div>
                           </div>
                           <div class="col-md-12">
                              <div class="form-group">
                                 <label for="exampleFormControlInput1">Email</label>
                                 <input type="email" class="form-control" value="{{ $user->email }}" name="email" disabled>
                              </div>
                           </div>
                           <div class="col-md-12">
                              <div class="form-group">
                                 <label for="exampleFormControlInput1">Address</label>
                                 <input type="text" class="form-control" value="{{ $user->address }}" name="address" required>
                              </div>
                           </div>
                           <div class="col-md-12">
                              <div class="form-group">
                                 <label for="exampleFormControlInput1">Phone</label>
                                 <input type="text" class="form-control" value="{{ $user->phone }}" name="phone" required>
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
    </div>

</div>



@endsection

