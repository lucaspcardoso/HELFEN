<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/layoutSite.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/defalt.css') }}">
</head>

<body>
    <nav class="navGuest">
        <div class="containerIcon">
            <a href="/">
                <img src="{{ asset('imgs/3-semfundo.png') }}" alt="">
            </a>
        </div>
    </nav>


    <div class="">
        @yield('info')
    </div>
</body>

</html>
