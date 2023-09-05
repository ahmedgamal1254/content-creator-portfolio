<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Our Reports</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    {{-- style links --}}
    <link href="{{ asset("assets/css/style.css") }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset("assets/css/font-awesome.css") }}">
    <link rel="stylesheet" href="{{ asset("assets/css/main.css") }}">
</head>
<body>
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

    <div class="container">
        <div class="alert alert-primary" role="alert">
            البوستات الخاصة بى
        </div>
        <div class="row">
            @foreach ($reports as $report)
                <div class="col-3">
                    <div class="card">
                        <div class="card-header">
                        Content creator
                        </div>
                        <div class="card-body">
                        <h5 class="card-title">number of posts :- {{ $report->number_of_posts_per_day  }}</h5>
                        <p class="card-text">{{ $report->days_of_week }} , {{ $report->history }}</p>
                        <a href="{{ route("show",$report->id) }}" class="btn btn-primary">show </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <script src="{{ asset("assets/js/jquery-3.4.1.min.js") }}"></script>
    <script src="{{ asset("assets/js/jquery.js") }}" ></script>
    <script src="{{ asset("assets/js/javascript.js") }}" ></script>
</body>
</html>
