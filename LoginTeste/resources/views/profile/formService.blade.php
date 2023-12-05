<?php
$name = ucwords(strtolower(auth()->user()->name));
?>
@if (auth()->user())

    <head>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
        <link rel="stylesheet" href="{{ asset('css/formServices.css') }}">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
        <link rel="stylesheet"
            href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
        <title>Adicionar Serviço / Helfen</title>
    </head>


    <x-app-layout>
        <div>
            <h4 class="title">Criar Serviço</h4>
        </div>

        @if (empty($work))
            <form action="/dashboard/add-service/store" method="POST" class="containerForm" id="serviceForm"
                enctype="multipart/form-data">
                @csrf
            @else
                <form action="/dashboard/add-service/update/{{ $work->id }}" method="POST" class="containerForm"
                    id="serviceForm" enctype="multipart/form-data">
                    @csrf
                    @method('put')
        @endif
        <form action="/dashboard/add-service/store" method="POST" class="containerForm" id="serviceForm"
            enctype="multipart/form-data">
            @csrf
            <div class="containerAll">
                <div class="left">
                    <div>
                        <div class="containerInput">
                            <input type="text" id="name_work" name="name_work" placeholder="Nome do Serviço" required
                                value={{ $work->name_work ?? null }}>
                        </div>

                        <div class="containerInput">
                            <input type="text" name="priceWork" id="priceWork" pattern="^\$\d{1,3}(,\d{3})*(\.\d+)?$"
                                data-type="currency" placeholder="Insira o preço do serviço" required
                                value={{ $work->price_work ?? null }}>
                        </div>
                        <div class="containerInput">
                            <select id="category" name="category" required class="input">
                                <option selected disabled>Selecione uma Categoria</option>
                                @foreach ($dados['cat'] as $cat)
                                    @if (request()->url() != 'http://127.0.0.1:8000/dashboard/add-service' && $cat->id == $work->fk_id_cat)
                                        <option id="{{ $cat->nm_categoria }}" class="optionCat"
                                            name="{{ $cat->nm_categoria }}" value="{{ $cat->id }}" selected>
                                            {{ $cat->nm_categoria }}</option>
                                    @endif
                                    <option id="{{ $cat->nm_categoria }}" class="optionCat"
                                        name="{{ $cat->nm_categoria }}" value="{{ $cat->id }}">
                                        {{ $cat->nm_categoria }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="containerInput">
                            <select id="subCategory" name="subCat" required class="input">
                                <option selected disabled>Selecione uma Sub Categoria</option>
                                @foreach ($dados['cat'] as $cat)
                                    <optgroup id="{{ $cat->nm_categoria }}" name="{{ $cat->nm_categoria }}"
                                        class="optionSubCat" label="{{ $cat->nm_categoria }}">
                                        @foreach ($cat->cat as $subCat)
                                            @if (request()->url() != 'http://127.0.0.1:8000/dashboard/add-service' && $subCat->id == $work->fk_id_subCat)
                                                <option data-category-id="{{ $cat->id }}"
                                                    id="{{ $subCat->nm_subCat }}" name="{{ $subCat->nm_subCat }}"
                                                    value="{{ $subCat->id }}" selected>
                                                    {{ $subCat->nm_subCat }}</option>
                                            @endif
                                            <option data-category-id="{{ $cat->id }}"
                                                id="{{ $subCat->nm_subCat }}" name="{{ $subCat->nm_subCat }}"
                                                value="{{ $subCat->id }}">
                                                {{ $subCat->nm_subCat }}</option>
                                        @endforeach
                                    </optgroup>
                                @endforeach
                            </select>
                        </div>

                    </div>

                    <div>
                        <div class="containerInput">
                            <select id="duration" name="duration" required class="input">
                                <option selected disabled>Duração</option>
                                <option value="15" @if (request()->url() != 'http://127.0.0.1:8000/dashboard/add-service' && $work->duracao_work == 15) selected @endif>15 min</option>
                                <option value="30" @if (request()->url() != 'http://127.0.0.1:8000/dashboard/add-service' && $work->duracao_work == 30) selected @endif>30 min</option>
                                <option value="45" @if (request()->url() != 'http://127.0.0.1:8000/dashboard/add-service' && $work->duracao_work == 45) selected @endif>45 min</option>
                                <option value="60" @if (request()->url() != 'http://127.0.0.1:8000/dashboard/add-service' && $work->duracao_work == 60) selected @endif>1 hora</option>
                                <option value="90" @if (request()->url() != 'http://127.0.0.1:8000/dashboard/add-service' && $work->duracao_work == 90) selected @endif>1 hora 30 min
                                </option>
                                <option value="120" @if (request()->url() != 'http://127.0.0.1:8000/dashboard/add-service' && $work->duracao_work == 120) selected @endif>2 horas
                                </option>
                                <option value="150" @if (request()->url() != 'http://127.0.0.1:8000/dashboard/add-service' && $work->duracao_work == 150) selected @endif>2 horas 30 min
                                </option>
                                <option value="180" @if (request()->url() != 'http://127.0.0.1:8000/dashboard/add-service' && $work->duracao_work == 180) selected @endif>3 horas
                                </option>
                                <option value="181" @if (request()->url() != 'http://127.0.0.1:8000/dashboard/add-service' && $work->duracao_work == 181) selected @endif>Mais de 3
                                    horas</option>
                            </select>
                        </div>
                    </div>

                    <div>
                        <div class="containerInput">
                            <select id="typeService" class="input" name="typeService" required>
                                <option selected disabled>Selecione um Tipo de Serviço</option>
                                <option value="local" @if (request()->url() != 'http://127.0.0.1:8000/dashboard/add-service' && $work->type_work == 'local') selected @endif>Local</option>
                                <option value="remoto" @if (request()->url() != 'http://127.0.0.1:8000/dashboard/add-service' && $work->type_work == 'remoto') selected @endif>Remoto
                                </option>
                                <option value="domicilio" @if (request()->url() != 'http://127.0.0.1:8000/dashboard/add-service' && $work->type_work == 'domicilio') selected @endif>Domicilio
                                </option>
                            </select>
                        </div>

                        <div id="inputsEndereço">

                            <div class="containerInput">
                                <input type="text" id="rua" name="rua" placeholder="Rua"
                                    value={{ $work->rua_end_work ?? null }}>
                            </div>

                            <div class="containerInput">
                                <input type="text" id="bairro" name="bairro" placeholder="Bairro"
                                    value={{ $work->bairro_end_work ?? null }}>
                            </div>

                            <div class="containerInput">
                                <input type="text" id="numero" name="numero" placeholder="Número"
                                    value={{ $work->num_end_work ?? null }}>
                            </div>

                        </div>
                    </div>
                </div>

                <div class="right">
                    <div>
                        <div class="containerInput">
                            <label for="descr_work">Descrição do Serviço</label>
                            <textarea name="descr_work" id="desc" rows="5" cols="35" placeholder="Digite aqui">{{ $work->descr_work ?? null }}</textarea>
                        </div>

                        <div class="containerAllPhoto">
                            <div class="containerPhoto" id="container1">
                                <label for="img1" class="photoLabel">Escolher Imagem</label>
                                <input type="file" id="img1" name="img1" class="none">
                                <div class="containerImg" id="containerImg1">
                                    <div class="overlay">
                                        <img class="icon" src="{{ asset('imgs/svg/trash.svg') }}" alt="">
                                    </div>
                                    <img src="{{ $work->image1 ?? 'http://127.0.0.1:8000/admin/imgs/imgNSelecionada.png' }}"
                                        alt="" id="photo1">
                                </div>
                            </div>

                            <div class="containerPhoto noView" id="container2">
                                <label for="img2" class="photoLabel">Escolher Imagem</label>
                                <input type="file" id="img2" name="img2" class="none">
                                <div class="containerImg" id="containerImg2">
                                    <div class="overlay">
                                        <img class="icon" src="{{ asset('imgs/svg/trash.svg') }}" alt="">
                                    </div>
                                    <img src="{{ $work->image2 ?? 'http://127.0.0.1:8000/admin/imgs/imgNSelecionada.png' }}"
                                        alt="" id="photo2">
                                </div>
                            </div>

                            <div class="containerPhoto noView" id="container3">
                                <label for="img3" class="photoLabel">Escolher Imagem</label>
                                <input type="file" id="img3" name="img3" class="none">
                                <div class="containerImg" id="containerImg3">
                                    <div class="overlay">
                                        <img class="icon" src="{{ asset('imgs/svg/trash.svg') }}" alt="">
                                    </div>
                                    <img src="{{ $work->image3 ?? 'http://127.0.0.1:8000/admin/imgs/imgNSelecionada.png' }}"
                                        alt="" id="photo3">
                                </div>
                            </div>

                            <div class="containerPhoto">
                                <div class="containerImg" id="btnAdd">
                                    <img src="{{ asset('imgs/svg/add.svg') }}" alt="">
                                </div>
                            </div>
                        </div>

                        <div class="containerInput">
                            <input type="number" id="desconto" name="desconto" placeholder="Desconto(Ex:20%)"
                                value={{ $work->desconto_work ?? null }}>
                        </div>
                        {{--
                <div class="containerCheckbox">
                    <p class="fontCheckbox">Dias da semana com o serviço disponível</p>
                    <span>
                        <input type="checkbox" id="seg" name="seg" value="seg">
                        <label for="seg">Segunda-Feira</label>
                    </span>

                    <span>
                        <input type="checkbox" id="ter" name="ter" value="ter">
                        <label for="ter">Terça-Feira</label>
                    </span>

                    <span>
                        <input type="checkbox" id="quar" name="quar" value="quar">
                        <label for="quar">Quarta-Feira</label>
                    </span>

                    <span>
                        <input type="checkbox" id="qui" name="qui" value="qui">
                        <label for="qui">Quinta-Feira</label>
                    </span>

                    <span>
                        <input type="checkbox" id="sex" name="sex" value="sex">
                        <label for="sex">Sexta-Feira</label>
                    </span>
                </div> --}}
                    </div>
                </div>
            </div>

            <div class="containerButton">
                <div>
                    <a href="/dashboard/portfolio/{{ auth()->user()->id }}">Cancelar</a>
                </div>

                <div class="containerButtonRight">
                    <button type="reset" id="btnClear">Limpar Campos</button>
                    <button type="submit" class="next">Avançar</button>
                </div>
            </div>
        </form>


        <script src="{{ asset('js/formServices.js') }}"></script>
    </x-app-layout>
@else
    <?php
    return redirect()->route('login');
    ?>
@endcan
