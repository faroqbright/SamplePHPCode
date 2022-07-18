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
                            <li class="breadcrumb-item"><a href="javascript: void(0);"></a></li>
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
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">

                                <div class="d-flex justify-content-between mb-4">

                                    <h4 class="header-title">App User</h4>

                                    <button type="button" class="btn btn-primary btn-sm waves-effect waves-light" data-toggle="modal"
                                        data-target="#lavelCreate">Add App User</button>

                                    <!-- sample modal content -->
                                    <div id="lavelCreate" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                                        aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title mt-0" id="myModalLabel">Create Level</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="modal-body">
                                                        <form class="custom-validation" method="post" action="{{ route('app-users.store') }}" enctype="multipart/form-data">
                                                            @csrf
                                                            <div class="row">
                                                                <div class="col-md-6 mb-3">
                                                                    <label for="validationCustom01">Username</label>
                                                                    <input name="username" type="text" class="form-control" id="validationCustom01" placeholder="username" required="">
                                                                    <div class="valid-feedback">
                                                                        Looks good!
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6 mb-3">
                                                                    <label for="validationCustom01">Phone#</label>
                                                                    <input name="phone" type="text" class="form-control" id="validationCustom01" placeholder="Phone Number" required="">
                                                                    <div class="valid-feedback">
                                                                        Looks good!
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            
                                                            <div class="row">
                                                                <div class="col-md-6 mb-3">
                                                                    <label for="validationCustom02">Email</label>
                                                                    <input name="email" type="email" class="form-control" id="validationCustom02" placeholder="Email" required="">
                                                                    <div class="valid-feedback">
                                                                        Looks good!
                                                                    </div>
                                                                </div>
                                                                
                                                                <div class="col-md-6 mb-3">
                                                                    <label for="validationCustom02">Address</label>
                                                                    <input name="address" type="text" class="form-control" id="validationCustom02" placeholder="address" required="">
                                                                    <div class="valid-feedback">
                                                                        Looks good!
                                                                    </div>
                                                                </div>
                                                                
                                                            </div>
                                                            
                                                            
                                                            <div class="row">
                                                                <div class="col-md-6 mb-3">
                                                                    <label for="validationCustom02">Link</label>
                                                                    <input name="link" type="text" class="form-control" id="validationCustom02" placeholder="link" required="">
                                                                    <div class="valid-feedback">
                                                                        Looks good!
                                                                    </div>
                                                                </div>
                                                                
                                                                <div class="col-md-6 mb-3">
                                                                    <label for="validationCustom02">Image</label>
                                                                    <input name="profile_image" type="file" class="form-control" required="">
                                                                    <div class="valid-feedback">
                                                                        Looks good!
                                                                    </div>
                                                                </div>
                                                                
                                                            </div>
                                                            
                                                            <div class="form-group mb-0">
                                                                <div>
                                                                    <button type="submit" class="btn btn-primary waves-effect waves-light mr-1">
                                                                        Submit
                                                                    </button>
                                                                    <button type="reset" class="btn btn-secondary waves-effect" data-dismiss="modal">
                                                                        Cancel
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div><!-- /.modal-content -->
                                        </div><!-- /.modal-dialog -->
                                    </div><!-- /.modal -->
                                </div>

                                @if (!$users->count())
                                    <p class="card-title-desc">
                                        No level settings found
                                    </p>
                                @else
                                    <table id="example1"
                                        class="table table-striped table-bordered dt-responsive nowrap"
                                        style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                        <thead>
                                            <tr>
                                                <th>Id #</th>
                                                <th>Image</th>
                                                <th>Title</th>
                                                <th>Username</th>
                                                <th>Email</th>
                                                <th>Phone</th>
                                                <!--<th>Level</th>-->
                                                <th>Actions</th>
                                                
                                                <!--<th>Registration Date</th>-->
                                                <th>Daily Leader</th>
                                                <!--<th>UserType</th>-->
                                                <th>Link</th>
                                                <th>Address</th>
                                                
                                            </tr>
                                        </thead>


                                        <tbody>
                                            @foreach ($users as $user)
                                            <tr>
                                                <td>{{ $user->id }}</td>
                                                <td class="review-block-img"><img src="{{url('public/').'/'.$user->image}}" class="img-rounded" alt=""></td>
                                                <td>{{ $user->title }}</td>
                                                <td>{{ $user->username }}</td>
                                                <td>{{ $user->email }}</td>
                                                <td>{{ $user->phone }}</td>
                                                <!--<td>{{ $user->level ? $user->level->name : '' }}</td>-->
                                                 <td>
                                                    <div class="btn-group" role="group">
                                                        {{-- <button onclick="window.location.href='{{ route('dashboard') }}';" type="button" class="btn btn-outline-secondary btn-sm" data-toggle="tooltip" data-placement="top" title="" data-original-title="View">
                                                            <i class="mdi mdi-eye"></i>
                                                        </button> --}}

                                                        <button type="button" class="btn btn-outline-secondary btn-sm waves-effect waves-light" data-toggle="modal"
                                                            data-target="#level-{{ $user->id }}"><i class="mdi mdi-pencil"></i></button>

                                                        <!-- sample modal content -->
                                                        <div id="level-{{ $user->id }}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                                                            aria-hidden="true">
                                                            <div class="modal-dialog">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title mt-0" id="myModalLabel">Level: {{ $user->username }}</h5>
                                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                            <span aria-hidden="true">&times;</span>
                                                                        </button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <form class="custom-validation" method="post" action="{{ route('app-users.update', $user->id) }}" enctype="multipart/form-data">
                                                                            @csrf @method('patch')
                                                                            
                                                                            <div class="row">
                                                                <div class="col-md-6 mb-3">
                                                                    <label for="validationCustom01">Username</label>
                                                                    <input name="username" value="{{ $user->username }}" type="text" class="form-control" id="validationCustom01" placeholder="username" required="">
                                                                    <div class="valid-feedback">
                                                                        Looks good!
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6 mb-3">
                                                                    <label for="validationCustom01">Phone#</label>
                                                                    <input name="phone" value="{{ $user->phone }}" type="text" class="form-control" id="validationCustom01" placeholder="Phone Number" required="">
                                                                    <div class="valid-feedback">
                                                                        Looks good!
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            
                                                            <div class="row">
                                                                <div class="col-md-6 mb-3">
                                                                    <label for="validationCustom02">Email</label>
                                                                    <input name="email" value="{{ $user->email }}" readonly type="email" class="form-control" id="validationCustom02" placeholder="Email" required="">
                                                                    <div class="valid-feedback">
                                                                        Looks good!
                                                                    </div>
                                                                </div>
                                                                
                                                                <div class="col-md-6 mb-3">
                                                                    <label for="validationCustom02">Address</label>
                                                                    <input name="address" type="text" value="{{ $user->address }}" class="form-control" id="validationCustom02" placeholder="address" required="">
                                                                    <div class="valid-feedback">
                                                                        Looks good!
                                                                    </div>
                                                                </div>
                                                                
                                                            </div>
                                                            
                                                            
                                                            <div class="row">
                                                                <div class="col-md-6 mb-3">
                                                                    <label for="validationCustom02">Link</label>
                                                                    <input name="link" type="text" value="{{ $user->link }}" class="form-control" id="validationCustom02" placeholder="link" required="">
                                                                    <div class="valid-feedback">
                                                                        Looks good!
                                                                    </div>
                                                                </div>
                                                                
                                                                <div class="col-md-6 mb-3">
                                                                    <label for="validationCustom02">Image</label>
                                                                    <input name="profile_image" type="file" class="form-control">
                                                                    <div class="valid-feedback">
                                                                        Looks good!
                                                                    </div>
                                                                </div>
                                                                
                                                            </div>
                                                                            <div class="form-group mb-0">
                                                                                <div>
                                                                                    <button type="submit" class="btn btn-primary waves-effect waves-light mr-1">
                                                                                        Submit
                                                                                    </button>
                                                                                    <button type="reset" class="btn btn-secondary waves-effect" data-dismiss="modal">
                                                                                        Cancel
                                                                                    </button>
                                                                                </div>
                                                                            </div>
                                                                        </form>
                                                                    </div>
                                                                </div><!-- /.modal-content -->
                                                            </div><!-- /.modal-dialog -->
                                                        </div><!-- /.modal -->
                                                        
                                                        <button onclick="event.preventDefault(); document.getElementById('delete-user-{{ $user->id }}').submit();" type="button" class="btn btn-outline-secondary btn-sm" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete">
                                                            <i class="mdi mdi-trash-can"></i>
                                                        </button>
                                                        <form id="delete-user-{{ $user->id }}" method="POST" action="{{ route('app-users.delete', $user->id) }}">
                                                            @csrf @method('delete')
                                                        </form>
                                                    </div>
                                                </td>
                                                 <!--<td>{{ date("d/m/Y", strtotime($user->created_at)) }}</td>-->
                                                
                                                <td>
                                                    <div class="btn-group" role="group">
                                                        <!-- Rounded switch -->
                                                        <label class="switch mr-2">
                                                            <input type="checkbox" {{$user->is_daily_leader ? 'checked' : ''}} onclick="event.preventDefault(); document.getElementById('daily_leader_toggle_{{$user->id}}').submit();">
                                                            <span class="slider round"></span>
                                                        </label>
                                                        <form method="post" id="daily_leader_toggle_{{$user->id}}" action="{{ route('app-users.daily-leader-toggle', $user->id) }}">
                                                            @csrf
                                                        </form>
                                                    </div>
                                                </td>
                                                <!--<td>{{ $user->user_type }}</td>-->
                                                <td>{{ $user->link }}</td>
                                                <td>{{ $user->address }}</td>
                                                
                                               
                                                
                                               
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                @endif
                            </div>
                        </div>
                    </div> <!-- end col -->
                </div> <!-- end row -->

            </div>
            <!-- end container-fluid -->
        </div>
        <!-- end page-content-wrapper -->
    </div>
    <!-- End Page-content -->
<script>
$(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
    "buttons": ["csv", "excel", "pdf"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>
@endsection
