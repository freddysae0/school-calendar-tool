@extends('layouts.app')
@section('content')

    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
        <link rel="icon" type="image/png" href="../assets/img/favicon.png">
        <title>
            Material Dashboard 3 by Creative Tim
        </title>
        <!--     Fonts and icons     -->
        <link rel="stylesheet" type="text/css"
            href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700,900" />
        <!-- Nucleo Icons -->
        <link href="../assets/css/nucleo-icons.css" rel="stylesheet" />
        <link href="../assets/css/nucleo-svg.css" rel="stylesheet" />
        <!-- Font Awesome Icons -->
        <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
        <!-- Material Icons -->
        <link rel="stylesheet"
            href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@24,400,0,0" />
        <!-- CSS Files -->
        <link id="pagestyle" href="../assets/css/material-dashboard.css?v=3.2.0" rel="stylesheet" />
    </head>

    <body class="">

        <main class="main-content  mt-0">
            <section>
                <div class="page-header min-vh-100">
                    <div class="container">
                        <div class="row">
                            <div
                                class="col-6 d-lg-flex d-none h-100 my-auto pe-0 position-absolute top-0 start-0 text-center justify-content-center flex-column">
                                <div class="position-relative bg-gradient-primary h-100 m-3 px-7 border-radius-lg d-flex flex-column justify-content-center"
                                    style="background-image: url('../assets/img/illustrations/illustration-signup.jpg'); background-size: cover;">
                                </div>
                            </div>
                            <div
                                class="col-xl-4 col-lg-5 col-md-7 d-flex flex-column ms-auto me-auto ms-lg-auto me-lg-auto">

                                <div class="card card-plain">
                                    <div class="card-header">
                                        <h4 class="font-weight-bolder">Sign up</h4>
                                        <p class="mb-0">Enter the requiered information to sign up</p>
                                    </div>
                                    <div class="card-body">
                                        <form method="POST" action="{{ route('register') }}">

                                            @csrf

                                            <div class="input-group input-group-outline mb-3">

                                                <input id="name" type="text" placeholder="{{ __('Your Name') }}"
                                                    class="form-control @error('name') is-invalid @enderror" name="name"
                                                    value="{{ old('email') }}" required autocomplete="name" autofocus>
                                            </div>

                                            @error('name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror

                                            <div class="input-group input-group-outline mb-3">

                                                <input placeholder="{{ __('School Name') }}" id="name" type="text"
                                                    class="form-control @error('school_name') is-invalid @enderror"
                                                    name="school_name" value="{{ old('school_name') }}" required
                                                    autocomplete="school_name" autofocus>
                                            </div>

                                            @error('school_name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror

                                            <!-- Campo School Link -->
                                            <div class="input-group input-group-outline mb-3">
                                                <input placeholder="{{ __('School Link') }}" id="school_link" type="text"
                                                    class="form-control @error('school_link') is-invalid @enderror"
                                                    name="school_link" value="{{ old('school_link') }}" required
                                                    autocomplete="school_link">
                                                <span class="form-text">This will be the link to your school's website
                                                    schedule, ex: for yourschool.thissite.com just type
                                                    <b>yourschool</b></span>
                                                @error('school_link')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>

                                            <!-- Campo Email Address -->
                                            <div class="input-group input-group-outline mb-3">
                                                <input id="email" type="email" placeholder="{{ __('Email Adress') }}"
                                                    class="form-control @error('email') is-invalid @enderror" name="email"
                                                    value="{{ old('email') }}" required autocomplete="email">
                                                @error('email')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>

                                            <!-- Campo Password -->
                                            <div class="input-group input-group-outline mb-3">
                                                <input placeholder="{{ __('Password') }}" id="password" type="password"
                                                    class="form-control @error('password') is-invalid @enderror"
                                                    name="password" required autocomplete="new-password">
                                                @error('password')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>

                                            <!-- Campo Confirm Password -->
                                            <div class="input-group input-group-outline mb-3">
                                                <input placeholder="{{ __('Confirm Password') }}" id="password-confirm"
                                                    type="password" class="form-control" name="password_confirmation"
                                                    required autocomplete="new-password">
                                            </div>

                                            <div class="text-center">



                                                <button type="submit"
                                                    class="btn btn-lg bg-gradient-dark btn-lg w-100 mt-4 mb-0">
                                                    {{ __('Sign up') }}</button>

                                            </div>
                                        </form>
                                    </div>
                                    <div class="card-footer text-center pt-0 px-lg-2 px-1">
                                        <p class="mb-2 text-sm mx-auto">
                                            Already signed up?
                                            <a href="sign-un" class="text-primary text-gradient font-weight-bold">Log
                                                in</a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </main>
        <!--   Core JS Files   -->
        <script src="../assets/js/core/popper.min.js"></script>
        <script src="../assets/js/core/bootstrap.min.js"></script>
        <script src="../assets/js/plugins/perfect-scrollbar.min.js"></script>
        <script src="../assets/js/plugins/smooth-scrollbar.min.js"></script>
        <script>
            var win = navigator.platform.indexOf('Win') > -1;
            if (win && document.querySelector('#sidenav-scrollbar')) {
                var options = {
                    damping: '0.5'
                }
                Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
            }
        </script>
        <!-- Github buttons -->
        <script async defer src="https://buttons.github.io/buttons.js"></script>
        <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
        <script src="../assets/js/material-dashboard.min.js?v=3.2.0"></script>
    </body>
@endsection
