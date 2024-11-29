<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Styles / Scripts -->
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        {{-- @vite(['resources/css/app.css', 'resources/js/app.js']) --}}
    @else
        <style>
            h1 {
                font-size: 3rem;
                font-weight: 700;
                margin-bottom: 20px;
            }

            p {
                font-size: 1.25rem;
                margin-bottom: 30px;
            }

            .btn-custom {
                font-size: 1rem;
                font-weight: 500;
                padding: 10px 20px;
                border-radius: 50px;
                transition: all 0.3s ease;
            }

            .btn-custom-primary {
                background: #ff6b6b;
                color: white;
                border: none;
            }

            .btn-custom-primary:hover {
                background: #ff4757;
                transform: translateY(-3px);
            }

            .btn-custom-secondary {
                background: transparent;
                color: white;
                border: 2px solid white;
            }

            .btn-custom-secondary:hover {
                background: white;
                color: #4e54c8;
                transform: translateY(-3px);
            }
        </style>
    @endif
    <style>
        body {


            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            font-family: 'Roboto', sans-serif;
        }

        .container {
            text-align: center;

            border-radius: 15px;
            padding: 40px;

        }

        h1 {
            font-size: 3rem;
            font-weight: 700;
            margin-bottom: 20px;
        }

        p {
            font-size: 1.25rem;
            margin-bottom: 30px;
        }

        .btn-custom {
            font-size: 1rem;
            font-weight: 500;
            padding: 10px 20px;
            border-radius: 50px;
            transition: all 0.3s ease;
        }

        .btn-custom-primary {
            background: #ff6b6b;
            color: white;
            border: none;
        }

        .btn-custom-primary:hover {
            background: #ff4757;
            transform: translateY(-3px);
        }

        .btn-custom-secondary {
            background: transparent;
            color: white;
            border: 2px solid white;
        }

        .btn-custom-secondary:hover {
            background: white;
            color: #4e54c8;
            transform: translateY(-3px);
        }
    </style>

</head>


<x-head-content></x-head-content>

<body class=" font-sans antialiased ">
    <div class="container">
        <h1>Welcome to my humble platform!</h1>
        <p>I am really glad to have you here. Log in to explore more.</p>

        @if (Route::has('login'))
            <div class="d-flex justify-content-center gap-3">
                @auth
                    <a href="{{ url('/dashboard') }}" class="btn btn-custom btn-custom-primary">
                        Dashboard
                    </a>
                @else
                    <a href="{{ route('login') }}" class="btn btn-custom btn-custom-primary">
                        Log in
                    </a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="btn btn-custom btn-custom-secondary">
                            Register
                        </a>
                    @endif
                @endauth
            </div>
        @endif
    </div>

</body>

</html>
