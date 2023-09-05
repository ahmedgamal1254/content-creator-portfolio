<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Content Creator</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

        {{-- style links --}}
        <link href="{{ asset("assets/css/style.css") }}" rel="stylesheet">
        <link rel="stylesheet" href="{{ asset("assets/css/font-awesome.css") }}">
        <link rel="stylesheet" href="{{ asset("assets/css/main.css") }}">
    </head>
    <body>

        <!-- This code snippet uses the basscss framework -->
        <header class=" hero center px3 py4 white">
            {{-- <div class="overlay"></div> --}}
           <div>
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
                <a class="navbar-brand" href="/">Content Creator</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                  <ul class="navbar-nav mr-auto" >
                    <li class="nav-item active">
                      <a class="nav-link" href="/">Home <span class="sr-only">(current)</span></a>
                    </li>
                    @if (Route::has('login'))
                        @auth
                            <li class="nav-item">
                                <a href="{{ url('/reports') }}" class="nav-link">our reports</a>
                            </li>

                            <li class="nav-item">
                                <form action="{{ route("logout") }}" method="post">
                                    @csrf
                                    <button type="submit" class="nav-link btn">LogOut</button>
                                </form>
                            </li>
                        @else
                            <li class="nav-item">
                                <a href="{{ route('login') }}" class="nav-link">Log in</a>
                            </li>
                            @if (Route::has('register'))
                            <li class="nav-item">
                                <a href="{{ route('register') }}" class="nav-link">Register</a>
                            </li>
                            @endif
                        @endauth
                    @endif
                  </ul>
                </div>

                <a class="navbar-brand" href="{{ url("/") }}">
                    <img src="{{ asset("assets/imgs/LOGO-300x76.webp") }}" alt=""
                        class="img-fluid d-inline-block align-text-top" style="height:50px;">
                </a>
            </nav>

            <div class="flex">
                <h1 class="h1 h0-responsive mt4 mb0 regular">Content Creator</h1>
                <p class="h3">report your daily projects</p>
                <a href="{{ route("create") }}" class="btn btn-primary">fill your report</a>
            </div>
           </div>
        </header>
        <script src="{{ asset("assets/js/jquery-3.4.1.min.js") }}"></script>
        <script src="{{ asset("assets/js/jquery.js") }}" ></script>
        <script src="{{ asset("assets/js/javascript.js") }}" ></script>
    </body>
</html>
