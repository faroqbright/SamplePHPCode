@extends('layouts.layout')

@section('content')

    <div class="page-content">

        <!-- Page-Title -->
        <div class="page-title-box">
            <div class="container-fluid">
                <div class="row align-items-center">
                    <div class="col-md-8">
                        <h4 class="page-title mb-1">Dashboard</h4>
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item active">Welcome to Rake Dashboard</li>
                        </ol>
                    </div>

                </div>

            </div>
        </div>
        <!-- end page title end breadcrumb -->

        <div class="page-content-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-xl-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-6">
                                        <h5>App Users </h5>
                                        <p class="text-muted">{{ $AppUsersCount }}</p>

                                        <div class="mt-4">
                                            {{-- <a href="#" class="btn btn-primary btn-sm">View more <i
                                                    class="mdi mdi-arrow-right ml-1"></i></a> --}}
                                        </div>
                                    </div>

                                    <div class="col-5 ml-auto">
                                        <div>
                                            <img src="{{ URL::asset('public/assets/images/widget-img.png') }}" alt=""
                                                class="img-fluid">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-6">
                                        <h5>Submitted Rakes</h5>
                                        <p class="text-muted">{{ $submittedRakesCount }}</p>

                                        <div class="mt-4">
                                            {{-- <a href="#" class="btn btn-primary btn-sm">View more <i
                                                    class="mdi mdi-arrow-right ml-1"></i></a> --}}
                                        </div>
                                    </div>

                                    <div class="col-5 ml-auto">
                                        <div>
                                            <img src="{{ URL::asset('public/assets/images/widget-img.png') }}" alt=""
                                                class="img-fluid">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- end row -->


                <div class="row">
                    <div class="col-xl-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-6">
                                        <h5>Daily Rake</h5>
                                        @if ($dailyRake)
                                        <p class="text-muted">{{ strlen($dailyRake->text) > 100 ? substr($dailyRake->text, 0, 100) : $dailyRake->text }}</p>
                                        @endif

                                        @if ($dailyRake)
                                        <div class="mt-4">

                                            <a href="{{ route('dailyRakes.show', $dailyRake->id) }}" class="btn btn-primary btn-sm">View more <i
                                                class="mdi mdi-arrow-right ml-1"></i></a>
                                        </div>
                                        @endif
                                    </div>

                                    <div class="col-5 ml-auto">
                                        <div>
                                            <img src="{{ URL::asset('public/assets/images/widget-img.png') }}" alt=""
                                                class="img-fluid">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-6">
                                        <h5>Daily Leader</h5>
                                        <p class="text-muted">{{ $dailyLeader }}</p>

                                        <div class="mt-4">
                                            {{-- <a href="#" class="btn btn-primary btn-sm">View more <i
                                                    class="mdi mdi-arrow-right ml-1"></i></a> --}}
                                        </div>
                                    </div>

                                    <div class="col-5 ml-auto">
                                        <div>
                                            <img src="{{ URL::asset('public/assets/images/widget-img.png') }}" alt=""
                                                class="img-fluid">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- end row -->

            </div> <!-- container-fluid -->
        </div>
        <!-- end page-content-wrapper -->
    </div>
    <!-- End Page-content -->

@endsection
