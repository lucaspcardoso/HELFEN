<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/index.css') }}">
    <link rel="stylesheet" href="{{ asset('css/viewService.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <title>Página Inicial / Helfen</title>
</head>
<x-app-layout>
    <div class="container-scroll">
        <div class="containerViewService">
            @if ($works->image1)
                <div class="containerCarrosseul areaCarrossel">

                    <div id="my-keen-slider" class="keen-slider">
                        @if ($works->image1)
                            <div class="keen-slider__slide number-slide containerImgMaxView">
                                <img src="{{ $works->image1 }}" alt="">
                            </div>
                        @endif
                        @if ($works->image2)
                            <div class="keen-slider__slide number-slide containerImgMaxView">
                                <img src="{{ $works->image2 }}" alt="">
                            </div>
                        @endif
                        @if ($works->image3)
                            <div class="keen-slider__slide number-slide containerImgMaxView">
                                <img src="{{ $works->image3 }}" alt="">
                            </div>
                        @endif
                    </div>
                    <div id="thumbnails" class="keen-slider thumbnail center">
                        @if ($works->image1)
                            <div class="keen-slider__slide number-slide thumbnailCard">
                                <img src="{{ $works->image1 }}" alt="">
                            </div>
                        @endif
                        @if ($works->image2)
                            <div class="keen-slider__slide number-slide thumbnailCard">
                                <img src="{{ $works->image2 }}" alt="">
                            </div>
                        @endif
                        @if ($works->image3)
                            <div class="keen-slider__slide number-slide thumbnailCard">
                                <img src="{{ $works->image3 }}" alt="">
                            </div>
                        @endif
                    </div>
                </div>
            @endif

            <div class="containerInformationService" @if (!$works->image1) style="width: 80vw;" @endif>
                <div class="informationPriceandName">
                    <h3>{{ $works->name_work }}</h3>
                    <div>
                        @if ($works->desconto_work)
                            <div class="price">
                                <div>
                                    <p class="discount-paragraph"></p>
                                    <span>
                                        R${{ preg_replace('/[^0-9]/', ',', $works->price_work) }}
                                    </span>

                                </div>
                                <span id="price">, por:
                                    {{ preg_replace('/[^0-9]/', ',', $works->price_work - ($works->price_work * $works->desconto_work) / 100) }}</span>
                            </div>
                        @else
                            <span class="price">
                                R${{ preg_replace('/[^0-9]/', ',', $works->price_work) }}
                            </span>
                        @endif

                    </div>
                </div>

                <p class="descripitonService">{{ $works->descr_work }}</p>
                <p><strong>Tipo do Serviço: </strong>{{ ucfirst($works->type_work) }}</p>
                @if ($works->type_work == 'local')
                    <p><strong>Endereço: </strong>{{ $works->rua_end_work }}, {{ $works->bairro_end_work }}, Nº:
                        {{ $works->num_end_work }} </p>
                @endif
                @if ($works->duracao_work > 180)
                    <p><strong>Duração: </strong>Mais que 3 horas</p>
                @else
                    <p><strong>Duração: </strong>{{ $works->duracao_work }} minutos</p>
                @endif

                <div class="containerButtonViewService">
                    @if ($works->user->id == auth()->user()->id)
                        <a href="#" class="hireService">Serviço pertencente a você</a>
                    @else
                        <a href="/service/pag/{{ $works->id }}" class="hireService">Contratar Serviço</a>
                    @endif

                    <a href="/dashboard" class="back">Voltar</a>
                </div>

            </div>
        </div>

    </div>

    <script src="{{ asset('js/viewService.js') }}"></script>
    <script>
        function ThumbnailPlugin(main) {
            return (slider) => {
                function removeActive() {
                    slider.slides.forEach((slide) => {
                        slide.classList.remove("active")
                    })
                }

                function addActive(idx) {
                    slider.slides[idx].classList.add("active")
                }

                function addClickEvents() {
                    slider.slides.forEach((slide, idx) => {
                        slide.addEventListener("click", () => {
                            main.moveToIdx(idx)
                        })
                    })
                }

                slider.on("created", () => {
                    addActive(slider.track.details.rel)
                    addClickEvents()
                    main.on("animationStarted", (main) => {
                        removeActive()
                        const next = main.animator.targetIdx || 0
                        addActive(main.track.absToRel(next))
                        slider.moveToIdx(Math.min(slider.track.details.maxIdx, next))
                    })
                })
            }
        }
        var slider = new KeenSlider("#my-keen-slider")
        var thumbnails = new KeenSlider(
            "#thumbnails", {
                initial: 0,
                slides: {
                    perView: 4,
                    spacing: 10,
                },
            },
            [ThumbnailPlugin(this.slider)]
        )
    </script>
</x-app-layout>

<script src="{{ asset('js/bootstrap.js') }}"></script>
