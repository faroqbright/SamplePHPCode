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
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">

                            <h4 class="header-title">About</h4>
                            <p class="card-title-desc"></p>

                            <form method="post" action="{{ route('about.form') }}">
                                @csrf
                                <div class="form-group">
                                    <textarea class="summernote" name="about">{{ $about ? $about->value : '' }}</textarea>
                                </div>
                                <div class="btn-toolbar form-group mb-0">
                                    <div class="">
                                        <a href="{{ route('dashboard') }}" class="btn btn-secondary waves-effect waves-light text-white"> <span>Cancel</span></a>
                                        <button class="btn btn-primary waves-effect waves-light"> <span>Save</span> <i class="far fa-save ml-1"></i> </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end row -->

        </div>
        <!-- end container-fluid -->
    </div>
    <!-- end page-content-wrapper -->
</div>
<!-- End Page-content -->




@endsection

@section('scripts')
<!-- Summernote js -->
<script src="{{ asset('public/assets/libs/summernote/summernote-bs4.min.js') }}"></script>

<!-- init js -->
<script src="{{ asset('public/assets/js/pages/summernote.init.js') }}"></script>
@endsection
