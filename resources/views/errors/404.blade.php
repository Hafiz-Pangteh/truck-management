<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>404 Page not found</title>
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <script src="https://kit.fontawesome.com/97f83ae048.js" crossorigin="anonymous"></script>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div class="container mt-5 pt-5">
        <div class="aler alert-danger text-center">
        <h1 class="display-3"> 404 Page not Found </h1>
        </div>
        <p class="display-5 mt-5 text-center"><a class="btn btn-primary bg-success" href="{{url('home')}}">  Back to Home Page </a></p>
    </div>
</body>
</html>