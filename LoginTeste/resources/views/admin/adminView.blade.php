<?php
$text = 'Vizualizar Adminstrador';
?>

@extends('layouts.layout_admin') @section('admin')
    <main class="">
        <section class="containerCardsInfos">
            <span class="bold top">Estatística</span>
            <div class="containerCardSection top">
                <div class="containerCard">
                    <div class="containerIcon user">
                        <img src="{{ asset('admin/imgs/user.svg') }}" alt="">
                    </div>
                    <div class="containerContent">
                        <div class="bold">{{ $count['users'] }}</div>
                        <div class="gray">Usuários</div>
                    </div>
                </div>

                <div class="containerCard">
                    <div class="containerIcon star">
                        <img src="{{ asset('admin/imgs/star.svg') }}" alt="">
                    </div>
                    <div class="containerContent">
                        <div class="bold">{{ $count['prof'] }}</div>
                        <div class="gray">Profissionais</div>
                    </div>
                </div>

                <div class="containerCard">
                    <div class="containerIcon work">
                        <img src="{{ asset('admin/imgs/work.svg') }}" alt="">
                    </div>
                    <div class="containerContent">
                        <div class="bold">{{ $count['work'] }}</div>
                        <div class="gray">Trabalhos</div>
                    </div>
                </div>
        </section>

        <section class="filter">
            {{-- colocar para trocar ser versatil --}}
            <span class="bold">
                @if ($rota == 'user')
                    Usuário
                @elseif ($rota == 'admin')
                    Administrador
                @else
                    {{ $filtro }}
                @endif
            </span>
            <div>
                <span class="gray" id="filter">
                    Filtro <img src="{{ asset('admin/imgs/filter.svg') }}" alt="">
                </span>

                <div class="ContainerFormFilter filtro" id="ContainerFormFilter">
                    <form action="">
                        <input type="text" name="search" id="search" placeholder="id">
                        <input type="text" name="name" id="name" placeholder="{{ $filtro }}">

                        @if ($rota == 'user')
                            <select name="position" id="position">
                                <option value="todos">Todos</option>
                                <option value="profissional">Profissional</option>
                                <option value="usuario">Usuário</option>
                            </select>
                        @elseif ($rota == 'subCat')
                            <select name="position" id="position">
                                <option value="todos">Todos</option>
                                @foreach ($dados['categoria'] as $categoria)
                                    <option value="{{ $categoria->nm_categoria }}">{{ $categoria->nm_categoria }}
                                    </option>
                                @endforeach
                            </select>
                        @endif

                    </form>
                </div>
            </div>
        </section>



        <div class="containerTableTop" ignore-search>
            <div class="containerTableFirtBlock">
                <div class="bold">id</div>
                @if ($rota == 'user' || $rota == 'admin')
                    <div class="bold">Nome</div>
                @elseif($rota == 'cat')
                    <div class="bold">Categoria</div>
                @elseif ($rota == 'subCat')
                    <div class="bold">Sub-Categoria</div>
                @endif

                @if ($rota == 'user')
                    <div class="bold">Cargo</div>
                @elseif ($rota == 'subCat')
                    <div class="bold">Categoria</div>
                @elseif ($rota == 'admin')
                    <div class="bold">Login</div>
                @endif
            </div>

            <div class="containerTableSecondBlock">
                <div class="bold">Ações</div>
            </div>

        </div>

        @if ($rota == 'subCat')
            @foreach ($dados['dados'] as $info)
                <div class="containerTableTop">
                    <div class="containerTableFirtBlock">
                        <div>#{{ $info->id }}</div>
                        <div>{{ $info->$campo }}</div>
                        @if ($rota == 'user')
                            @if ($info->role == 'profissional')
                                <div>Profissional</div>
                            @elseif($info->role == 'user')
                                <div>Usuário</div>
                            @endif
                        @elseif($rota == 'subCat')
                            @if (isset($info->subCat))
                                <div>{{ $info->subCat->nm_categoria }}</div>
                            @else
                                <div>Sem categoria</div>
                            @endif
                        @elseif($rota == 'admin')
                            <div>{{ $info->email }}</div>
                        @endif
                    </div>

                    <div class="containerTableSecondBlock">
                        <div class="bold containerIconsAction">
                            <a class="edit" href="/adminHome/{{ $rota }}/{{ $info->id }}/edit"><img
                                    src="{{ asset('imgs/svg/pencil-square.svg') }}" alt=""></a>
                            <div class="delete" id="popUpDelete_{{ $info->id }}" data-admin-id="{{ $info->id }}">
                                <img src="{{ asset('imgs/svg/trash.svg') }}" alt="">
                            </div>
                        </div>
                    </div>

                </div>
            @endforeach
        @else
            @foreach ($dados as $info)
                <div class="containerTableTop">
                    <div class="containerTableFirtBlock">
                        <div>#{{ $info->id }}</div>
                        <div>{{ $info->$campo }}</div>
                        @if ($rota == 'user')
                            @if ($info->role == 'profissional')
                                <div>Profissional</div>
                            @elseif($info->role == 'user')
                                <div>Usuário</div>
                            @endif
                        @elseif($rota == 'subCat')
                            <div>{{ $info->subCat->nm_categoria }}</div>
                        @elseif($rota == 'admin')
                            <div>{{ $info->email }}</div>
                        @endif
                    </div>

                    <div class="containerTableSecondBlock">
                        <div class="bold containerIconsAction">
                            @if ($rota != 'user')
                                <a class="edit" href="/adminHome/{{ $rota }}/{{ $info->id }}/edit"><img
                                        src="{{ asset('imgs/svg/pencil-square.svg') }}" alt=""></a>
                            @endif
                            <div class="delete" id="popUpDelete_{{ $info->id }}" data-admin-id="{{ $info->id }}">
                                <img src="{{ asset('imgs/svg/trash.svg') }}" alt="">
                            </div>
                        </div>
                    </div>

                </div>
            @endforeach
        @endif

        <div>
            @if ($rota == 'subCat')
                {{ $dados['dados']->links('pagination::bootstrap-4') }}
            @else
                {{ $dados->links('pagination::bootstrap-4') }}
            @endif

        </div>

    </main>

    <div id="popUpDelete" class="popUpContainer">
        <div class="popUpPortifolio">
            <div>
                <h1 id="titleDelete text-warning">Excluir Registro</h1>
                <p>Você tem certeza que quer apagar o registro?</p>
            </div>
            <!--formulário-->
            <form method="POST" action="" id="deleteFormAdmin" name="formXpFormacao">
                @csrf
                @method('delete')
                <div class="Cflex">
                    <!--botão-->
                    <div class="containerButtons">
                        <button type="button" id="closeDelete" class="button-fecha">Fechar</button>
                        <button type="submit" class="button-envia apagar">Excluir</button>
                    </div>

                </div>
            </form>
        </div>
    </div>

    <script>
        const popUpDelete = document.getElementById("popUpDelete");
        const formDelete = document.getElementById("deleteFormAdmin");
        const closeDelete = document.getElementById("closeDelete");

        var deleteUsu = document.querySelectorAll(".delete");
        deleteUsu.forEach((button) => {
            button.addEventListener("click", () => {
                const adminCard = button.closest(".containerTableSecondBlock");
                var id = adminCard
                    .querySelector("[data-admin-id]")
                    .getAttribute("data-admin-id");
                formDelete.action = "/register/delete/{{ $rota }}/" + id;
                popUpDelete.classList.add("showPop");
            });
        });

        closeDelete.addEventListener("click", () => {
            popUpDelete.classList.remove("showPop");
        });
    </script>

@endsection
