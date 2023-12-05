<!DOCTYPE html>
<html lang="pt-br">


<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/index.css') }}">
    <link rel="stylesheet" href="{{ asset('css/defalt.css') }}">
    <link rel="stylesheet" href="{{ asset('css/calendario.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <title>Calendario Trabalho</title>
</head>

<body>
    <main>
        <div>
            <form action="/calender/register" method="POST">
                @csrf
                <input type="hidden" name="selected_days[]" value="{{ old('selected_days') }}">
                <div id="calendar-container">
                    <div id="weekdays"></div>
                    <div id="calendar"></div>
                    <button id="submitBtn">Enviar</button>
                </div>

                <button type="button" id="prevMonthBtn">Previous Month</button>
                <button type="button" id="nextMonthBtn">Next Month</button>
            </form>
        </div>
    </main>
    <script src="{{ asset('js/calendario.js') }}"></script>
</body>

</html>