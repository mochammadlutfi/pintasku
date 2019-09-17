<!doctype html>
<html lang="en" class="no-focus">
    <head>

        @include('layouts.meta')
        <!-- Stylesheets -->

        <!-- Fonts and Codebase framework -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Muli:300,400,400i,600,700">
        <link rel="stylesheet" id="css-main" href="{{ mix('/assets/backend/css/codebase.css') }}">

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
                            <h2 class="h5 font-w700 mb-0 mt-30">{{ $title }}</h2>
                        </div>
                        <!-- END Header -->

                        <!-- Sign In Form -->
                        <div class="row justify-content-center px-5">
                            <div class="col-sm-8 col-md-6 col-xl-4">
                                @if($type == 'user')
                                <h3 class="h6 mb-0 my-20">Belum punya akun? <a class="link-effect" href="{{ route('register') }}">Daftar di sini</a></h3>
                                @endif
                                <form method="POST" action="{{ route($passwordEmailRoute) }}">
                                    @csrf
                                    <div class="form-group row">
                                        <div class="col-12">
                                            <label for="login-username">Username / Email</label>
                                            <input type="text" class="form-control {{ $errors->has('email') ? ' is-invalid' : '' }}" id="login-username" name="email" placeholder="Masukan Username/Email">
                                            @if ($errors->has('email'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('email') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group row mb-0">
                                        <div class="col-sm-12 text-sm-right push">
                                            <button type="submit" class="btn btn-alt-primary btn-block">
                                                <i class="si si-paper-plane mr-10"></i> Kirim
                                            </button>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                                <span class="text-center">Kembali ke halaman <a href="{{ route($login_route) }}">login</a> @if($type == 'User')atau <a href="{{ route($register_route) }}">daftar @endif</a></span>
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
        <script src="{{ mix('/assets/backend/js/codebase.app.js') }}"></script>
        {{-- <script src="{{ asset('assets/backend/js/codebase.app.min.js') }}"></script> --}}
    </body>
</html>
