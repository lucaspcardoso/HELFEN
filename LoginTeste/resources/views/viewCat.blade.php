<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/index.css') }}">
    <link rel="stylesheet" href="{{ asset('css/categoria.css') }}">
    <link rel="stylesheet" href="{{ asset('css/viewCat.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <title>Ver {{ $cat->nm_categoria }}</title>
</head>

<x-app-layout>

    <main class="mt-4">

        <div class="search">

            <input type="text" name="search" id="search" class="input"
                placeholder="O que você está procurando?">
            <!-- <form action="">
                                                            <div class="submit-div">
                                                                <input type="text" name="search" id="search" class="input" placeholder="O que você está procurando?">
                                                                <button class="submit-button">
                                                                    <i class="bi bi-search"></i>
                                                                </button>
                                                            </div>
                                                        </form> -->
            <div class="">
                <a href="{{ route('dashboard') }}">
                    <x-icon-search />
                </a>
            </div>
        </div>

        <div class="containerTitleViewCat @if (!empty($cat->img)) inicio @endif">
            @if (!empty($cat->img))
                <img src="{{ $cat->img }}" class="">
                <h1>{{ $cat->nm_categoria }}</h1>
            @else
                <h1>{{ $cat->nm_categoria }}</h1>
            @endif
        </div>

        <div class="containerCardsWork">
            @forelse ($works as $work)
                <a href="/service/{{ $work->id }}" class="cardWork">
                    <div class="contentInfoProf">
                        <img src="{{ $work->user->profile_photo_path }}" alt="" class="imgProf">
                        <div class="nameAva">
                            <p class="strong">{{ $work->user->name }}</p>
                            <div class="containerAvaliacao">
                                @if ($work->user->avaliacao > 0)
                                    <span style="color: #f0d253">{{ $work->user->avaliacao }}</span>
                                    @for ($i = 0; $i < $work->user->avaliacao; $i++)
                                        <i class="bi bi-star-fill"></i>
                                    @endfor

                                    @for ($i = 0; $i < $work->user->avaliacao; $i++)
                                        <i class="bi bi-star"></i>
                                    @endfor
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="ms-2 mt-3">
                        <h4>{{ $work->name_work }}</h4>
                        <p>{{ $work->descr_work }}</p>
                    </div>

                    <div class="containerImgWork">
                        @if ($work->image1)
                            <img src="{{ $work->image1 }}" alt="" class="imageWork">
                            @if ($work->image2)
                                <img src="{{ $work->image2 }}" alt="">
                                @if ($work->image3)
                                    <img src="{{ $work->image3 }}" alt="">
                                @endif
                            @endif
                        @endif
                    </div>
                </a>
            @empty
                <div class="containerEmptyCat">
                    <div>
                        <h3 class="arimo">
                            Ups!... nenhum resultado encontrado em {{ $cat->nm_categoria }}.
                        </h3>
                        <p>Espera ou procure um <a href="/dashboard/cat">novo serviço</a>.</p>
                    </div>

                    <div>
                        <img src="{{ asset('imgs/notSearch.svg') }}" alt="" srcset="">
                    </div>
                </div>
            @endforelse
        </div>

    </main>

</x-app-layout>
