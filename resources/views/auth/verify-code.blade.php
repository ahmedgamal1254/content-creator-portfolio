<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Email</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    {{-- style links --}}
    <link href="{{ asset("assets/css/style.css") }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset("assets/css/font-awesome.css") }}">
    <link rel="stylesheet" href="{{ asset("assets/css/main.css") }}">
</head>
<body>
    <div class="container">
        <div class="alert alert-primary">Write Your email to sent your otp</div>

        <form action="" method="post">
            <label for="email">Write your email</label>
            <input type="email" name="email" id="email" placeholder="enter your email" class="form-control" />

            <button type="submit" class="btn btn-success">Send</button>
        </form>
    </div>
    <script src="{{ asset("assets/js/jquery-3.4.1.min.js") }}"></script>
    <script src="{{ asset("assets/js/jquery.js") }}" ></script>
    <script src="{{ asset("assets/js/javascript.js") }}" ></script>
</body>
</html>
