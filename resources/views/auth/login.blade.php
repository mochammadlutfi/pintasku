<!doctype html>
<html lang="en" class="no-focus">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">

        <title>Pintasku - Growth With Us</title>

        <meta name="description" content="Pintasku">
        <meta name="author" content="pintasku">
        <meta name="robots" content="noindex, nofollow">

        <!-- Open Graph Meta -->
        <meta property="og:title" content="Codebase - Bootstrap 4 Admin Template &amp; UI Framework">
        <meta property="og:site_name" content="Codebase">
        <meta property="og:description" content="Codebase - Bootstrap 4 Admin Template &amp; UI Framework created by pixelcave and published on Themeforest">
        <meta property="og:type" content="website">
        <meta property="og:url" content="">
        <meta property="og:image" content="">

        <!-- Icons -->
        <!-- The following icons can be replaced with your own, they are used by desktop and mobile browsers -->
        <link rel="shortcut icon" href="{{ asset('assets/backend/media/favicons/favicon.png') }}">
        <link rel="icon" type="image/png" sizes="192x192" href="{{ asset('assets/backend/media/favicons/favicon-192x192.png') }}">
        <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('assets/backend/media/favicons/apple-touch-icon-180x180.png') }}">
        <!-- END Icons -->

        <!-- Stylesheets -->

        <!-- Fonts and Codebase framework -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Muli:300,400,400i,600,700">
        <link rel="stylesheet" id="css-main" href="{{ asset('assets/backend/css/codebase.min.css') }}">

    </head>
    <body>
        <div id="page-container" class="main-content-boxed">

            <!-- Main Container -->
            <main id="main-container">

                <!-- Page Content -->
                <div class="bg-white">
                    <div class="hero-static content content-full bg-white invisible" data-toggle="appear">
                        <!-- Header -->
                        <div class="py-30 px-5 text-center">
                            <a class="" href="{{ url('/') }}">
                                <img src="{{ asset('assets/img/logo/logo.png') }}">
                            </a>
                            <h2 class="h5 font-w700 mb-0 mt-30">Silakan masuk ke dalam akun kamu</h2>
                        </div>
                        <!-- END Header -->

                        <!-- Sign In Form -->
                        <div class="row justify-content-center px-5">
                            <div class="col-sm-8 col-md-6 col-xl-4">
                                <!-- jQuery Validation functionality is initialized with .js-validation-signin class in js/pages/op_auth_signin.min.js which was auto compiled from _es6/pages/op_auth_signin.js -->
                                <!-- For more examples you can check out https://github.com/jzaefferer/jquery-validation -->
                                <h3 class="h6 mb-0 my-20">Belum punya akun? <a class="link-effect" href="{{ route('register') }}">Daftar di sini</a></h3>
                                <form method="POST" action="{{ route($loginRoute) }}">
                                    @csrf
                                    <div class="form-group row">
                                        <div class="col-12">
                                            <label for="login-username">Username / Email</label>
                                            <input type="text" class="form-control {{ $errors->has('email') ? ' is-invalid' : '' }}" id="login-username" name="email">
                                            @if ($errors->has('email'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('email') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-12">
                                            <label for="login-password">Password</label>
                                            <input type="password" class="form-control {{ $errors->has('password') ? ' is-invalid' : '' }}" id="login-password" name="password">
                                            @if ($errors->has('password'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('password') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group row mb-0">
                                        <div class="col-sm-6 d-sm-flex align-items-center push">
                                            <div class="custom-control custom-checkbox mr-auto ml-0 mb-0">
                                                <input type="checkbox" class="custom-control-input" id="login-remember-me" name="remember">
                                                <label class="custom-control-label" for="login-remember-me">Ingat Saya</label>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 text-sm-right push">

                                        </div>
                                    </div>
                                    <div class="form-group row mb-0">
                                        <div class="col-sm-12 text-sm-right push">
                                            <button type="submit" class="btn btn-alt-primary btn-block">
                                                <i class="si si-login mr-10"></i> Masuk
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <!-- END Sign In Form -->
                    </div>
                </div>
                <!-- END Page Content -->

            </main>
            <!-- END Main Container -->
        </div>
        <!-- END Page Container -->
        <script src="{{ asset('assets/backend/js/codebase.core.min.js') }}"></script>
        <script src="{{ asset('assets/backend/js/codebase.app.min.js') }}"></script>

        <!-- Page JS Plugins -->
        <script src="{{ asset('assets/backend/js/plugins/jquery-validation/jquery.validate.min.js') }}"></script>

        <!-- Page JS Code -->
        <script src="{{ asset('assets/backend/js/pages/op_auth_signin.min.js') }}"></script>

    </body>
</html>
