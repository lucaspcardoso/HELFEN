<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/index.css') }}">
    <link rel="stylesheet" href="{{ asset('css/categoria.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <title>Página Inicial / Helfen</title>
</head>

<x-app-layout>
    <main class="mt-4">

        <div class="catRow">

            @foreach ($categoria as $cat)
                <a href="/dashboard/cat/{{ $cat->nm_categoria }}" class="cardCat">
                    @if (!empty($cat->img))
                        <img src="{{ asset($cat->img) }}" alt="">
                    @endif


                    <div class="containerTextsCards">
                        <div>
                            <h5 class="strong">{{ $cat->nm_categoria }}</h5>
                        </div>

                        <div class="containerTextsCardsUls">
                            <div>
                                <ul>
                                    @foreach ($cat->cat as $subcategoria)
                                        <li>{{ $subcategoria->nm_subCat }}</li>
                                    @endforeach
                                </ul>
                            </div>

                        </div>
                    </div>
                </a>
            @endforeach

        </div>
    </main>
</x-app-layout>
