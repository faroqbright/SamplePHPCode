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

                                <h4 class="header-title">Point Settings</h4>
                                <p class="card-title-desc">Abc xyz
                                </p>

                                <table id="datatable-buttons"
                                    class="table table-striped table-bordered dt-responsive nowrap"
                                    style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                    <thead>
                                        <tr>
                                            <th>Event Name</th>
                                            <th>Min Points</th>
                                            <th>Max Points</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>


                                    <tbody>
                                        <tr>
                                            <td>Tiger Nixon</td>
                                            <td>System Architect</td>
                                            <td>Edinburgh</td>
                                            <td>
                                                <div class="btn-group" role="group">
                                                    <button onclick="window.location.href='{{ route('dashboard') }}';" type="button" class="btn btn-outline-secondary btn-sm" data-toggle="tooltip" data-placement="top" title="" data-original-title="View">
                                                        <i class="mdi mdi-eye"></i>
                                                    </button>
                                                    <button onclick="window.location.href='{{ route('dashboard') }}';" type="button" class="btn btn-outline-secondary btn-sm" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit">
                                                        <i class="mdi mdi-pencil"></i>
                                                    </button>
                                                    <button onclick="event.preventDefault(); document.getElementById('').submit();" type="button" class="btn btn-outline-secondary btn-sm" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete">
                                                        <i class="mdi mdi-trash-can"></i>
                                                    </button>
                                                    <form method="POST" action="{{ route('dashboard') }}">
                                                        @csrf @method('delete')
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
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
