<?php
$name = ucwords(strtolower($user->name));
?>
@if (auth()->user())

    <head>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
        <link rel="stylesheet" href="{{ asset('css/popUp.css') }}">
        <link rel="stylesheet" href="{{ asset('css/formProfissional.css') }}">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
        <link rel="stylesheet"
            href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
        <title>Portifolio {{ $name }} / Helfen</title>
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




            <div class="card-profile @if ($user->role == 'user') w80 @endif">

                {{-- funcional colocar a classe banner --}}
                <div class="">

                    <div class="block-ranges2">

                        <div class="containerPhotoUser">
                            <img src="{{ auth()->user()->profile_photo_path }}" alt="" class="photo-user">
                        </div>

                        <div class="range black" id="range1" style="background-color: {{ $user->color1 }}">
                        </div>

                        <div class="range white"></div>

                        <div class="range black" id="range2" style="background-color: {{ $user->color2 }}">
                        </div>

                        <div class="range white"></div>

                        <div class="range black" id="range3" style="background-color: {{ $user->color3 }}">
                        </div>
                    </div>
                </div>

                <div class="content-user">

                    <div class="container-edit">
                        <span>{{ $name }}</span>
                        @if ($user->role === 'profissional' || $user->desc)
                            <div class="custom-dropdown">

                                <button onclick="toggleCustomDropdown()" class="btnMoreMenu"><img
                                        src="{{ asset('imgs/svg/three-dots.svg') }}" alt=""></button>
                                <div class="custom-dropdown-content menuMore" id="myCustomDropdown">
                                    @if ($user->desc_usu && $user->id === auth()->user()->id)
                                        <div id="editProfille" data-user-id="{{ $user->id }}">Editar Perfil</div>
                                    @endif
                                    <div>
                                        @if ($user->role === 'profissional')
                                            <a href="/gerar-pdf/{{ $user->id }}">Baixar Currículo(PDF)</a>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        @endif

                    </div>

                    <div class="line">
                        @if (!empty($user->desc_usu))
                            <p class="descricaoUsuario" id="descricaoUsuario">{{ $user->desc_usu }}</p>
                        @else
                            <p id="descUsu">Adicione uma descrição ao seu perfil.</a></p>
                        @endif

                        <p class="local">{{ $user->cdd_end_usu }}, {{ $user->rua_end_usu }},
                            {{ $user->bairro_end_usu }}
                        </p>
                    </div>
                    <div class="containerAvaliacao">
                        @if ($user->avaliacao > 0)
                            <span style="color: #f0d253">{{ $user->avaliacao }}</span>
                            @for ($i = 0; $i < $user->avaliacao; $i++)
                                <i class="bi bi-star-fill"></i>
                            @endfor

                            @for ($i = 0; $i < $user->avaliacao; $i++)
                                <i class="bi bi-star"></i>
                            @endfor
                        @endif
                    </div>
                </div>
            </div>

            @if ($user->role == 'profissional')
                <div class="card-profile pad">
                    <div class="content-user">
                        <div>
                            <div class="card-works-start">
                                <h6 class="b-600">Sobre: </h6>
                                @if ($user->id === auth()->user()->id)
                                    <div class="editSobre" id="editbtnSobre">Editar</div>
                                @endif
                            </div>
                            <p class="lineBreak" id="outSobre">{{ $user->sobre_usu }}</p>
                        </div>
                    </div>
                </div>
            @endif


            <div class="card-profile pad cardWorkMargin @if ($user->role == 'user') w80 @endif">
                <div class="content-user">
                    @if ($user->role == 'profissional')

                        <div class="card-works-start ">
                            <div>
                                <h6 class="b-600">Serviços</h6>
                                <p>Serviços oferecidos:</p>
                            </div>

                            @if ($user->id === auth()->user()->id)
                                <div class="buttom-add">
                                    <a href="/dashboard/add-service"><img src="{{ asset('imgs/plus.png') }}"
                                            alt=""></a>
                                </div>
                            @endif


                        </div>

                        @foreach ($user->servico as $work)
                            <div class="btn-group dropstart configIcon" id="">
                                <button type="button" class="botaoDropStart" data-bs-toggle="dropdown">
                                    <span>
                                        <img src="{{ asset('imgs/svg/dots3.svg') }}" alt="" id="configIcon">
                                    </span>
                                </button>

                                <ul class="dropdown-menu tamanhoDropStartWork">

                                    <li class="dropdown-item deleteWork" data-work-id={{ $work->id }}>
                                        <img src="{{ asset('imgs/svg/trash.svg') }}" alt="">
                                        Apagar
                                    </li>
                                    <li class="dropdown-item editWork"><a
                                            href="/dashboard/add-service/edit/{{ $work->id }}">
                                            <img src="{{ asset('imgs/svg/pencil-square.svg') }}" alt="">
                                            Editar
                                        </a>
                                    </li>
                                </ul>


                            </div>
                            <div class="card-work">
                                @if ($work->image1)
                                    <img src="{{ $work->image1 }}" alt="">
                                @endif

                                <div class="card-work-content">
                                    @if ($user->id === auth()->user()->id)
                                    @endif
                                    <div class="card-work-content-info">
                                        <h6 class="b-600">{{ $work->name_work }}</h6>
                                        <div class="b-600">R${{ $work->price_work }}</div>

                                    </div>
                                    <p>{{ $work->descr_work }} <a class="continue"
                                            href="/service/{{ $work->id }}">Saiba
                                            Mais</a></p>

                                    <p><strong>Tipo do Serviço:</strong>
                                        @if ($work->type_work == 'local')
                                            Local
                                        @elseif ($work->type_work == 'remoto')
                                            Remoto
                                        @elseif ($work->type_work == 'domicilio')
                                            Domicilio
                                        @endif
                                    </p>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <div class="ocult-prof">
                            <div>
                                <p>Se torne um Profissional para ter acessos a recursos como esses:</p>
                                <ul>
                                    <li> <img src="{{ asset('imgs/svg/check-mark.png') }}" alt=""> Serviços
                                        Oferecidos</li>
                                    <li> <img src="{{ asset('imgs/svg/check-mark.png') }}" alt=""> Formação
                                        Acadêmica</li>
                                    <li> <img src="{{ asset('imgs/svg/check-mark.png') }}" alt="">
                                        Experiência</li>
                                    <li> <img src="{{ asset('imgs/svg/check-mark.png') }}" alt="">
                                        Línguas</li>
                                </ul>

                                <div class="container-button-ocult">
                                    <div id="vireProfi" class="button-ocult btnProf">Vire um Profissional</div>
                                </div>
                            </div>

                            <div class="ocult-prof-container-img">
                                <img src="{{ asset('imgs/ocult-prof.png') }}" alt="">
                            </div>


                        </div>
                    @endif
                </div>
            </div>

            @if ($user->role == 'profissional')


                <div class="container-card-right">

                    <aside class="cards-right">
                        <div class="card-xp">
                            <div>
                                <h6 class="xp">Experiência</h6>
                            </div>

                            @if ($user->id === auth()->user()->id)
                                <div id="xp">
                                    <div class="xpPopUp " href=""><img src="{{ asset('imgs/plus.png') }}"
                                            alt=""></div>
                                </div>
                            @endif
                        </div>
                        <div class="card-local-work">
                            @foreach ($user->xp as $xp)
                                <div class="card-local-word-line">
                                    @if ($user->id === auth()->user()->id)
                                        <div class="containerDropStart">
                                            <div class="btn-group dropstart">
                                                <button type="button" class="botaoDropStart"
                                                    data-bs-toggle="dropdown">
                                                    <span>
                                                        <img src="{{ asset('imgs/svg/dots3.svg') }}" alt="">
                                                    </span>
                                                </button>

                                                <ul class="dropdown-menu">
                                                    <li class="dropdown-item delete">
                                                        <img src="{{ asset('imgs/svg/trash.svg') }}" alt="">
                                                        Apagar
                                                    </li>
                                                    <li class="dropdown-item edit"
                                                        data-edit-popup="xp-{{ $xp->id }}"
                                                        data-xp-id="{{ $xp->id }}">
                                                        <img src="{{ asset('imgs/svg/pencil-square.svg') }}"
                                                            alt="">
                                                        Editar
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    @endif


                                    <h6 class="b-600 cargoExercido" data-cargo="{{ $xp->cargo_empre_trab }}">
                                        {{ $xp->cargo_empre_trab }}</h6>
                                    <p class="bold" data-empresa="{{ $xp->nm_empresa_trab }}"
                                        data-inicio="{{ $xp->anoInicial }}" data-fim="{{ $xp->anoFinal }}">
                                        {{ $xp->nm_empresa_trab }} / {{ $xp->anoInicial }} - {{ $xp->anoFinal }}
                                    </p>
                                    <p class="font-distance" data-descricao="{{ $xp->desc_trab }}">
                                        {{ $xp->desc_trab }}</p>

                                </div>
                            @endforeach
                        </div>
                    </aside>


                    <aside class="cards-right">
                        <div class="card-xp">
                            <div>
                                <h6 class="xp">Formação Acadêmica</h6>
                            </div>

                            @if ($user->id === auth()->user()->id)
                                <div id="forAcademica">
                                    <div class="xpPopUp"><img src="{{ asset('imgs/plus.png') }}" alt="">
                                    </div>
                                </div>
                            @endif


                        </div>

                        <div class="card-local-work">
                            @foreach ($user->formacao as $formacao)
                                <div class="card-local-word-line">
                                    <div class="containerDropStart">

                                        @if ($user->id === auth()->user()->id)
                                            <div class="btn-group dropstart" id="btnFormacao">
                                                <button type="button" class="botaoDropStart"
                                                    data-bs-toggle="dropdown">
                                                    <span>
                                                        <img src="{{ asset('imgs/svg/dots3.svg') }}" alt="">
                                                    </span>
                                                </button>

                                                <ul class="dropdown-menu">
                                                    <li class="dropdown-item deleteFormacao">
                                                        <img src="{{ asset('imgs/svg/trash.svg') }}" alt="">
                                                        Apagar
                                                    </li>
                                                    <li class="dropdown-item editFormacao"
                                                        data-edit-popup="xp-{{ $formacao->id }}"
                                                        data-xp-id="{{ $formacao->id }}">
                                                        <img src="{{ asset('imgs/svg/pencil-square.svg') }}"
                                                            alt="">
                                                        Editar
                                                    </li>
                                                </ul>

                                            </div>
                                        @endif
                                    </div>

                                    @if (!empty($formacao->nm_curso_form))
                                        <h6 class="b-600 curso" data-curso="curso"
                                            data-cargo="{{ $formacao->nm_curso_form }}">
                                            [Curso] -
                                            {{ $formacao->nm_curso_form }}</h6>
                                    @else
                                        <h6 class="b-600" data-curso="uni"
                                            data-cargo="{{ $formacao->nm_uni_form }}">
                                            [Universidade] -
                                            {{ $formacao->nm_uni_form }}</h6>
                                    @endif
                                    <p class="font-distance" data-descricao="{{ $formacao->desc_curso }}">
                                        {{ $formacao->desc_curso }}</p>
                                </div>
                            @endforeach
                        </div>
                    </aside>

                    {{-- Idioma --}}
                    <aside class="cards-right">
                        <div class="card-xp">
                            <div>
                                <h6 class="xp">Idioma</h6>
                            </div>

                            @if ($user->id === auth()->user()->id)
                                <div id="language">
                                    <div class="xpPopUp"><img src="{{ asset('imgs/plus.png') }}" alt="">
                                    </div>
                                </div>
                            @endif


                        </div>

                        <div class="card-local-work">
                            @foreach ($user->language as $language)
                                <div class="card-local-word-line">
                                    <div class="containerDropStart">
                                        @if ($user->id === auth()->user()->id)
                                            <div class="btn-group dropstart" id="btnFormacao">
                                                <button type="button" class="botaoDropStart"
                                                    data-bs-toggle="dropdown">
                                                    <span>
                                                        <img src="{{ asset('imgs/svg/dots3.svg') }}" alt="">
                                                    </span>
                                                </button>

                                                <ul class="dropdown-menu">

                                                    <li class="dropdown-item deleteLang">
                                                        <img src="{{ asset('imgs/svg/trash.svg') }}" alt="">
                                                        Apagar
                                                    </li>
                                                    <li class="dropdown-item editLang lang"
                                                        data-edit-popup="xp-{{ $language->id }}"
                                                        data-xp-id="{{ $language->id }}">
                                                        <img src="{{ asset('imgs/svg/pencil-square.svg') }}"
                                                            alt="">
                                                        Editar
                                                    </li>
                                                </ul>


                                            </div>
                                        @endif
                                    </div>

                                    <div class="containerLanguage">

                                        @if ($language->name_lingua == 'en')
                                            <img src="{{ asset('imgs/country/eua.webp') }}" alt=""
                                                class="iconLanguage">
                                        @elseif ($language->name_lingua == 'es')
                                            <img src="{{ asset('imgs/country/espanha.webp') }}" alt=""
                                                class="iconLanguage">
                                        @elseif ($language->name_lingua == 'ale')
                                            <img src="{{ asset('imgs/country/alemanha.webp') }}" alt=""
                                                class="iconLanguage">
                                        @elseif ($language->name_lingua == 'fr')
                                            <img src="{{ asset('imgs/country/franca.jpg') }}" alt=""
                                                class="iconLanguage">
                                        @elseif ($language->name_lingua == 'it')
                                            <img src="{{ asset('imgs/country/italia.webp') }}" alt=""
                                                class="iconLanguage">
                                        @endif


                                        <h6 class="b-600 curso" data-curso="curso"
                                            data-nivel="{{ $language->nivel_lingua }}"
                                            data-idioma="{{ $language->name_lingua }}">
                                            @if ($language->name_lingua == 'en')
                                                Inglês
                                            @elseif ($language->name_lingua == 'es')
                                                Espanhol
                                            @elseif ($language->name_lingua == 'ale')
                                                Alemão
                                            @elseif ($language->name_lingua == 'fr')
                                                Francês
                                            @elseif ($language->name_lingua == 'it')
                                                Italiano
                                            @endif
                                            -
                                            @if ($language->nivel_lingua == 1)
                                                Nível Baixo
                                            @elseif ($language->nivel_lingua == 2)
                                                Nível Intermediário
                                            @elseif ($language->nivel_lingua == 3)
                                                Fluente
                                            @endif
                                        </h6>
                                    </div>

                                </div>
                            @endforeach
                        </div>
                    </aside>

                </div>

            @endif

        </main>

        @if ($user->id === auth()->user()->id)


            <div id="popUpContainer" class="popUpContainer">
                <div class="popUpPortifolio">
                    <div>
                        <h1 id="title">Experiência</h1>
                    </div>
                    <!--formulário-->
                    <form method="POST" action="/dashboard/portfolio/xp" id="formXpFormacao" name="formXpFormacao">
                        @csrf
                        <div class="flex">

                            <div id="selectCurso" class="containerInput">
                                <select name="selectCurso" id="SelectCursoValue" class="selectForm">
                                    <option disabled selected value="dis">Selecione Curso ou Universidade</option>
                                    <option value="curso">Curso</option>
                                    <option value="uni">Universidade</option>
                                </select>
                            </div>

                            <div id="selectIdioma" class="containerInput">
                                <select name="selectIdioma" id="SelectIdiomaValue" class="selectForm">
                                    <option disabled selected value="dis">Selecione um Idioma</option>
                                    <option value="en">Inglês</option>
                                    <option value="es">Espanhol</option>
                                    <option value="ale">Alemão</option>
                                    <option value="fr">Francês</option>
                                    <option value="it">Italiano</option>
                                </select>
                            </div>


                            <div id="selectNivel" class="containerInput">
                                <select name="selectNivel" id="SelectNivelValue" class="selectForm">
                                    <option disabled selected value="dis">Selecione um nivel para sua habilidade no
                                        idioma</option>
                                    <option value="1">Nível Baixo</option>
                                    <option value="2">Nível Intermediário</option>
                                    <option value="3">Fluente</option>
                                </select>
                            </div>


                            <div id="containerAllPopUp">

                                <div class="containerInput" id="divInput1">
                                    <label for="cargo" id="input1">Cargo:</label>
                                    <input type="text" class="estilo_form" name="cargo" id="cargo"
                                        placeholder="Cargo" />
                                </div>

                                <div class="containerInput" id="divInput2">
                                    <label for="empresa" id="input2">Empresa:</label>
                                    <input type="text" class="estilo_form" name="empresa" id="empresa"
                                        placeholder="Empresa" />
                                </div>

                                <div class="containerInput" id="descricao">
                                    <label for="desc" id="input3">Descrição Experiência:</label>
                                    <textarea name="desc" class="estilo_form" id="desc" rows="2" cols="40"
                                        placeholder="Descrição da sua Experiência"></textarea>
                                </div>

                                <div class="containerInput colorInput1" id="colorInput1">
                                    <label for="color1">Selecione a cor da primeira faixa:</label>
                                    <input type="color" class="estilo_form" name="color1" id="color1"
                                        value="{{ auth()->user()->color1 }}" />
                                </div>

                                <div class="containerInput colorInput1" id="colorInput1">
                                    <label for="color2">Selecione a cor da segunda faixa:</label>
                                    <input type="color" class="estilo_form" name="color2" id="color2"
                                        value="{{ auth()->user()->color2 }}" />
                                </div>

                                <div class="containerInput colorInput1" id="colorInput1">
                                    <label for="color3">Selecione a cor da terceira faixa:</label>
                                    <input type="color" class="estilo_form" name="color3" id="color3"
                                        value="{{ auth()->user()->color3 }}" />
                                </div>



                            </div>

                            <div class="containerInput formFlex" id="input4">
                                <label for="cargo">Data:</label>
                                <input type="number" class="estilo_form" name="dataInicial"
                                    placeholder="Data de Inicio" />
                                <input type="number" class="estilo_form" name="dataFinal"
                                    placeholder="Data de Fim" />
                            </div>


                            <!--botão-->
                            <div class="containerButton">
                                <button type="button" id="close" class="button-fechar">Fechar</button>
                                <button type="submit" class="button-enviar">Enviar</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <div id="UppopUpContainer" class="popUpContainer">
                <div class="popUpPortifolio">
                    <div>
                        <h1 id="Uptitle">Experiência</h1>
                    </div>
                    <!--formulário-->
                    <form method="POST" action="/dashboard/portfolio/xp" id="UpformXpFormacao"
                        name="formXpFormacao">
                        @csrf
                        @method('put')
                        <div class="flex">

                            <div id="UpselectCurso" class="containerInput">
                                <select name="selectCurso" id="UpSelectCursoValue" class="selectForm">
                                    <option disabled selected value="dis">Selecione Curso ou Universidade</option>
                                    <option value="curso">Curso</option>
                                    <option value="uni">Universidade</option>
                                </select>
                            </div>

                            <div id="UpselectIdioma" class="containerInput">
                                <select name="selectIdioma" id="UpSelectIdiomaValue" class="selectForm">
                                    <option disabled selected value="dis">Selecione um Idioma</option>
                                    <option value="en">Inglês</option>
                                    <option value="es">Espanhol</option>
                                    <option value="ale">Alemão</option>
                                    <option value="fr">Francês</option>
                                    <option value="it">Italiano</option>
                                </select>
                            </div>

                            <div id="UpselectNivel" class="containerInput">
                                <select name="selectNivel" id="UpSelectNivelValue" class="selectForm">
                                    <option disabled selected value="dis">Selecione um nivel para sua habilidade no
                                        idioma</option>
                                    <option value="1">Nível Baixo</option>
                                    <option value="2">Nível Intermediário</option>
                                    <option value="3">Fluente</option>
                                </select>
                            </div>

                            <div id="UpcontainerAllPopUp">
                                <div class="containerInput Up" id="UpdivInput1">
                                    <label for="cargo" id="Upinput1">Cargo:</label>
                                    <input type="text" class="estilo_form" name="cargo" id="Upcargo"
                                        placeholder="Cargo" />
                                </div>

                                <div class="containerInput Up" id="UpdivInput2">
                                    <label for="empresa" id="Upinput2">Empresa:</label>
                                    <input type="text" class="estilo_form" name="empresa" id="Upempresa"
                                        placeholder="Empresa" />
                                </div>

                                <div class="containerInput Up" id="Updescricao">
                                    <label for="desc" id="Upinput3">Descrição Experiência:</label>
                                    <textarea name="desc" class="estilo_form" id="Updesc" rows="2" cols="40"
                                        placeholder="Descrição da sua Experiência"></textarea>
                                </div>

                                <div class="containerInput colorInput1 ColorUp" id="colorInput1">
                                    <label for="color1">Selecione a cor da primeira faixa:</label>
                                    <input type="color" class="estilo_form" name="color1" id="color1Up"
                                        value="{{ auth()->user()->color1 }}" />
                                </div>

                                <div class="containerInput colorInput1 ColorUp" id="colorInput1">
                                    <label for="color2">Selecione a cor da segunda faixa:</label>
                                    <input type="color" class="estilo_form" name="color2" id="color2Up"
                                        value="{{ auth()->user()->color2 }}" />
                                </div>

                                <div class="containerInput colorInput1 ColorUp" id="colorInput1">
                                    <label for="color3">Selecione a cor da terceira faixa:</label>
                                    <input type="color" class="estilo_form" name="color3" id="color3Up"
                                        value="{{ auth()->user()->color3 }}" />
                                </div>

                                <div class="containerInput" id="ckeck">
                                    <label for="">Faixas Branca: </label>
                                    <div class="displayFlex">
                                        <input type="checkbox" id="checkBoxInput" value="yes"> <span
                                            style="margin-left: 10px">Sim</span>
                                    </div>
                                </div>

                            </div>

                            <div class="containerInput Up formFlex" id="Upinput4">
                                <label for="cargo">Data:</label>
                                <input type="number" class="estilo_form" name="dataInicial" id="dataInicialUp"
                                    placeholder="Data de Inicio" />
                                <input type="number" class="estilo_form" name="dataFinal" id="dataFinalUp"
                                    placeholder="Data de Fim" />
                            </div>


                            <!--botão-->
                            <div class="containerButton">
                                <button type="button" id="closeUp" class="button-fechar">Fechar</button>
                                <button type="submit" class="button-enviar">Enviar</button>
                            </div>

                        </div>
                    </form>
                </div>
            </div>


            <div id="popUpDelete" class="popUpContainer">
                <div class="popUpPortifolio">
                    <div>
                        <h1 id="titleDelete text-warning">Excluir Registro</h1>
                        <p>Você tem certeza que quer apagar o registro?</p>
                    </div>
                    <!--formulário-->
                    <form method="POST" action="/dashboard/portfolio/xp/delete" id="DeleteformXpFormacao"
                        name="formXpFormacao">
                        @csrf
                        @method('delete')
                        <div class="flex">
                            <!--botão-->
                            <div class="containerButton">
                                <button type="button" id="closeDelete" class="button-fechar">Fechar</button>
                                <button type="submit" class="button-enviar apagar">Excluir</button>
                            </div>

                        </div>
                    </form>
                </div>
            </div>

            <div id="makeProf" class="popUpContainer">
                <div class="popUpPortifolio">
                    <div>
                        <h1 id="text-warning">Virar Profissional</h1>
                        <p id="textCpfSobre">Insira o seu CPF ou CNPJ para se tornar um profissional, e insira uma
                            breve
                            informação sobre
                            você.</p>
                    </div>
                    <!--formulário-->
                    <form action="/makeProfissional/{{ auth()->user()->id }}" method="POST">
                        @method('put')
                        @csrf

                        <div class="containerFormProfiAll" id="CpfInput">
                            <input type="text" placeholder="CPF/CNPJ" name="inCPF" class="inputProf"
                                id="inCPF" oninput="formatarInputDocumento()">
                        </div>

                        <div class="containerFormProfiAll">
                            <textarea class="estilo_form inputProf" id="inSobre" name="inSobre" rows="4" cols="40"
                                placeholder="Sobre você"></textarea>
                        </div>

                        <div class="containerButton">
                            <button type="button" id="fecharBotaoCPF" class="button-fechar">Fechar</button>
                            <button class="button-ocult" type="submit" id="btnMakeProf">Se torne um
                                Profissional</button>
                        </div>
                    </form>
                </div>
            </div>
        @endif


        <script src="{{ asset('js/bootstrap.js') }}"></script>
        <script src="{{ asset('js/popUp.js') }}"></script>
        <script src="{{ asset('js/popUpDelete.js') }}"></script>
    </x-app-layout>
@else
    <?php
    return redirect()->route('login');
    ?>
@endcan
