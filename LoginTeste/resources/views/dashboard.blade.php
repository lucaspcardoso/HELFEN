<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/index.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <title>Página Inicial / Helfen</title>
</head>
<x-app-layout>

    <div class="scroll">


        <div class="mt-4">

            <div class="search">

                <input type="text" name="search" id="search" class="input"
                    placeholder="O que você está procurando?">
                <div class="">
                    <a href="{{ route('dashboard') }}">
                        <img src="{{ asset('imgs/3-semfundo.png') }}" alt="" height="80" id="logo">
                    </a>
                </div>
            </div>

            <div class="container-scroll">

                <div class="container-cards">

                    @forelse ($services as $work)
                        <div class="cards">

                            <a href="/dashboard/portfolio/{{ $work->user->id }}" class="container-img-cards">
                                <img src="{{ auth()->user()->profile_photo_path }}" alt="">
                                <span>
                                    <p class="strong">{{ $work->user->name }}</p>
                                    <div>
                                        @if ($work->user->avaliacao > 0)
                                            <span style="color: #f0d253">{{ $work->user->avaliacao }}</span>
                                            @for ($i = 0; $i < $work->user->avaliacao; $i++)
                                                <i class="bi bi-star-fill"></i>
                                            @endfor

                                            @for ($i = 0; $i < 5 - $work->user->avaliacao; $i++)
                                                <i class="bi bi-star"></i>
                                            @endfor
                                        @endif
                                    </div>
                                </span>
                            </a>

                            <a href="/service/{{ $work->id }}" class="textDescNone">
                                <div class="content-card">
                                    <h5 class="b-600">{{ $work->name_work }},
                                        <span class="b-400">{{ $work->categoria->nm_categoria }},
                                            {{ $work->subcategoria->nm_subCat }}</span>
                                    </h5>
                                    @if ($work->desconto_work)
                                        <div class="desc">
                                            <img class="desc-img" src="{{ asset('imgs/svg/desconto.svg') }}"
                                                alt="">
                                            <p class="desc-text arimo">{{ $work->desconto_work }}% sale</p>
                                        </div>
                                    @endif
                                    <p class="defalt">{{ $work->descr_work }}
                                    </p>
                                </div>

                                <div class="content-imgs">
                                    @if ($work->image1)
                                        <img src="{{ $work->image1 }}" alt="">
                                    @endif
                                    @if ($work->image2)
                                        <img src="{{ $work->image2 }}" alt="">
                                    @endif
                                    @if ($work->image3)
                                        <img src="{{ $work->image3 }}" alt="">
                                    @endif
                                </div>
                            </a>
                        </div>

                    @empty
                        {{-- Fazer um card para mostrar se não tem nenhum serviço cadastrado --}}
                        <div class="ocult-prof cards">
                            <div style="width: 50%">
                                <p>Não existe nenhum serviço cadastrado no momento.
                                    Se torne um profissional ou espera até aparecer um serviço de sua procura.</p>

                                <div class="container-button-ocult" style="justify-content: start">
                                    <a class="button-ocult" href="/dashboard/portfolio/{{ auth()->user()->id }}">
                                        @if (auth()->user()->role == 'profissional')
                                            Cadastre um serviço
                                        @else
                                            Vire um Profissional
                                        @endif

                                    </a>
                                    </form>
                                </div>
                            </div>

                            <div class="ocult-prof-container-img">
                                <video id="myVideo" src="{{ asset('video/work.mp4') }}" autoplay muted
                                    controls></video>
                            </div>
                        </div>
                    @endforelse


                </div>

                <div class="container-rank">

                </div>

            </div>

        </div>

    </div>
</x-app-layout>
