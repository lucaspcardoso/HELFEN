<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/login_register.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <title><?= $text ?> / Helfen</title>
</head>

<body>
    <div class="circulo"></div>

    <div class="centralizar">

        <div class="wave_container"><img src="{{ asset('imgs/Vector.png') }}" alt="" class="wave"></div>

        <div class="container">
            @yield('form')
        </div>

    </div>

</body>

</html>
