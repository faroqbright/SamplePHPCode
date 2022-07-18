<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Login | Rake</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesdesign" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="assets/images/favicon.ico">

    <!-- Bootstrap Css -->
    <link href="{{ URL::asset('public/assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="{{ URL::asset('public/assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="{{ URL::asset('public/assets/css/app.min.css') }}" rel="stylesheet" type="text/css" />

</head>

<body class="bg-grey bg-pattern">

        <div class="account-pages my-2 pt-sm-5">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="text-center mb-2">
                            <a href="index.php" class="logo"><img src="{{ URL::asset('public/assets/images/rake_logo.png') }}" height="100" alt="logo"></a>
                        </div>
                    </div>
                </div>
                <!-- end row -->

            <div class="row justify-content-center">
                <div class="col-xl-5 col-sm-8">
                    <div class="card">
                        <div class="card-body p-4">
                            <div class="p-2">
                                <h5 class="mb-5 text-center">Sign in to continue</h5>

                                <div class="mb-5 text-center">
	                                @error('email')
	                                    <span class="alert alert-primary alert-dismissible fade show" role="alert">
	                                        <strong>{{ $message }}</strong>
	                                    </span>
	                                @enderror


	                                @error('password')
	                                    <span class="alert alert-primary alert-dismissible fade show" role="alert">
	                                        <strong>{{ $message }}</strong>
	                                    </span>
	                                @enderror
                                </div>



                                <form action="{{ url('login') }}" method="post" class="form-horizontal" >
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group form-group-custom mb-4">
                                                <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" autocomplete="email" autofocus required>
                                                <label for="username">Email</label>
                                            </div>

                                            <div class="form-group form-group-custom mb-4">
                                                <input type="password" class="form-control" id="password" name="password" autocomplete="current-password" required>
                                                <label for="userpassword">Password</label>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-6">
                                                    <!-- <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input" id="customControlInline">
                                                        <label class="custom-control-label" for="customControlInline">Remember me</label>
                                                    </div> -->
                                                </div>
                                               <!--  <div class="col-md-6">
                                                    <div class="text-md-right mt-3 mt-md-0">
                                                        <a href="{{ URL::to('forgot') }}" class="text-muted"><i class="mdi mdi-lock"></i> Forgot your password?</a>
                                                    </div>
                                                </div> -->
                                            </div>
                                            <div class="mt-4">
                                                <button class="btn btn-success btn-block waves-effect waves-light" type="submit">{{ __('Login') }}</button>
                                            </div>
                                            <!-- <div class="mt-4 text-center">
                                                <br>
                                                <i>New to NLT ?.</i> <br><br> <a href="register.php" class="text-muted"><i class="mdi mdi-account-circle mr-1"></i> Create an account</a>
                                            </div> -->
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end row -->
        </div>
    </div>
    <!-- end Account pages -->

    <!-- JAVASCRIPT -->
    <script src="{{ URL::asset('public/assets/libs/jquery/jquery.min.js') }}"></script>
    <script src="{{ URL::asset('public/assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ URL::asset('public/assets/libs/metismenu/metisMenu.min.js') }}"></script>
    <script src="{{ URL::asset('public/assets/libs/simplebar/simplebar.min.js') }}"></script>
    <script src="{{ URL::asset('public/assets/libs/node-waves/waves.min.js') }}"></script>

    <script src="https://unicons.iconscout.com/release/v2.0.1/script/monochrome/bundle.js"></script>

    <script src="{{ URL::asset('public/assets/js/app.js') }}"></script>

</body>

</html>
