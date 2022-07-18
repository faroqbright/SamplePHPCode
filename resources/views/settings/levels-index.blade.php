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

                                    <h4 class="header-title">Level Settings</h4>

                                    <button type="button" class="btn btn-primary btn-sm waves-effect waves-light" data-toggle="modal"
                                        data-target="#lavelCreate">Add Level</button>

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
                                                        <form class="custom-validation" method="post" action="{{ route('levels.store') }}" enctype="multipart/form-data">
                                                            @csrf
                                                            <div class="row">
                                                                <div class="col-md-3 mb-3">
                                                                    <label for="validationCustom01">Level</label>
                                                                    <input name="name" type="text" class="form-control" id="validationCustom01" placeholder="Level" required="">
                                                                    <div class="valid-feedback">
                                                                        Looks good!
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-3 mb-3">
                                                                    <label for="validationCustom01">Min Points</label>
                                                                    <input name="min" type="number" class="form-control" id="validationCustom01" placeholder="Min Points" required="">
                                                                    <div class="valid-feedback">
                                                                        Looks good!
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-3 mb-3">
                                                                    <label for="validationCustom02">Max Points</label>
                                                                    <input name="max" type="number" class="form-control" id="validationCustom02" placeholder="Max Points" required="">
                                                                    <div class="valid-feedback">
                                                                        Looks good!
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-3 mb-3">
                                                                    <label for="validationCustom02">Level Name</label>
                                                                    <input name="level_name" type="text" class="form-control" id="validationCustom02" placeholder="Level Name" required="">
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

                                @if (!$levels->count())
                                    <p class="card-title-desc">
                                        No level settings found
                                    </p>
                                @else
                                    <table id="datatable"
                                        class="table table-striped table-bordered dt-responsive nowrap"
                                        style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                        <thead>
                                            <tr>
                                                <th>Level</th>
                                                <th>Min Points</th>
                                                <th>Max Points</th>
                                                <th>Level Name</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>


                                        <tbody>
                                            @foreach ($levels as $level)
                                            <tr>
                                                <td>{{ $level->name }}</td>
                                                <td>{{ $level->min }}</td>
                                                <td>{{ $level->max }}</td>
                                                <td>{{ $level->level_name }}</td>
                                                <td>
                                                    <div class="btn-group" role="group">
                                                        {{-- <button onclick="window.location.href='{{ route('dashboard') }}';" type="button" class="btn btn-outline-secondary btn-sm" data-toggle="tooltip" data-placement="top" title="" data-original-title="View">
                                                            <i class="mdi mdi-eye"></i>
                                                        </button> --}}

                                                        <button type="button" class="btn btn-outline-secondary btn-sm waves-effect waves-light" data-toggle="modal"
                                                            data-target="#level-{{ $level->id }}"><i class="mdi mdi-pencil"></i></button>

                                                        <!-- sample modal content -->
                                                        <div id="level-{{ $level->id }}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                                                            aria-hidden="true">
                                                            <div class="modal-dialog">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title mt-0" id="myModalLabel">Level: {{ $level->name }}</h5>
                                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                            <span aria-hidden="true">&times;</span>
                                                                        </button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <form class="custom-validation" method="post" action="{{ route('levels.update', $level->id) }}" enctype="multipart/form-data">
                                                                            @csrf @method('patch')
                                                                            <div class="row">
                                                                                <div class="col-md-3 mb-3">
                                                                                    <label for="validationCustom01">Level</label>
                                                                                    <input name="name" type="text" class="form-control" id="validationCustom01" value="{{ $level->name }}" placeholder="Level" required="">
                                                                                    <div class="valid-feedback">
                                                                                        Looks good!
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-md-3 mb-3">
                                                                                    <label for="validationCustom01">Min Points</label>
                                                                                    <input name="min" type="number" class="form-control" id="validationCustom01" value="{{ $level->min }}" placeholder="Min Points" required="">
                                                                                    <div class="valid-feedback">
                                                                                        Looks good!
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-md-3 mb-3">
                                                                                    <label for="validationCustom02">Max Points</label>
                                                                                    <input name="max" type="number" class="form-control" id="validationCustom02" value="{{ $level->max }}" placeholder="Max Points" required="">
                                                                                    <div class="valid-feedback">
                                                                                        Looks good!
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-md-3 mb-3">
                                                                                    <label for="validationCustom02">Level Name</label>
                                                                                    <input name="level_name" type="text" class="form-control" id="validationCustom02" placeholder="Level Name" value="{{ $level->level_name }}" required="">
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
                                                        {{-- <button onclick="event.preventDefault(); document.getElementById('').submit();" type="button" class="btn btn-outline-secondary btn-sm" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete">
                                                            <i class="mdi mdi-trash-can"></i>
                                                        </button>
                                                        <form method="POST" action="{{ route('dashboard') }}">
                                                            @csrf @method('delete')
                                                        </form> --}}
                                                    </div>
                                                </td>
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

@endsection
