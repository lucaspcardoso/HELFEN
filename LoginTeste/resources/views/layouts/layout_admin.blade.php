<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('admin/admin.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/defalt.css') }}">
    <title>
        <?= $text ?> / Helfen
    </title>
</head>

<body>
    <nav class="navMenuAdmin">
        <ul class="menu">
            <div>
                <li class="containerImgLI">
                    <a class="containerImg">
                        <img src="{{ asset('imgs/logo.png') }}" alt="">
                        <div>
                            <p>Helfen</p>
                        </div>
                    </a>
                </li>

                <li class="container-drop">

                </li>

                <li class="container-drop" id="dropdown">
                    <div class="containerElementsDrop">
                        <div>
                            <img src="{{ asset('admin/imgs/cad.svg') }}" alt="">
                            <span>Visualizar</span>
                        </div>
                        <img src="{{ asset('admin/imgs/arrowDown.svg') }}" alt="">
                    </div>


                    <ul class="submenu" id="submenu1">
                        <li @if ($rota=='user' && $view=='view' ) class="active" @endif><a
                                href="/adminHome/view/user">Usuário</a></li>
                        <li @if ($rota=='cat' && $view=='view' ) class="active" @endif><a
                                href="/adminHome/view/cat">Categoria</a></li>
                        <li @if ($rota=='subCat' && $view=='view' ) class="active" @endif><a
                                href="/adminHome/view/subCat">Sub
                                Categoria</a></li>
                        <li @if ($rota=='admin' && $view=='view' ) class="active" @endif><a
                                href="/adminHome/view/admin">Administrador</a></li>
                    </ul>
                </li>


                <li class="container-drop" id="drop2">
                    <div class="containerElementsDrop">
                        <div>
                            <img src="{{ asset('admin/imgs/view.svg') }}" alt="">
                            <span>Registrar</span>
                        </div>
                        <img src="{{ asset('admin/imgs/arrowDown.svg') }}" alt="">
                    </div>
                </li>


                <ul class="submenu" id="submenu2">
                    <li @if ($rota=='cat' && $view=='register' ) class="active" @endif><a
                            href="/adminHome/register/cat">Categoria</a></li>
                    <li @if ($rota=='subCat' && $view=='register' ) class="active" @endif><a
                            href="/adminHome/register/subCat">Sub
                            Categoria</a>
                    </li>
                    <li @if ($rota=='admin' && $view=='register' ) class="active" @endif><a
                            href="/adminHome/register/admin">Administrador</a>
                    </li>
                </ul>
                </li>

                <li class="container-drop" id="sup">
                    <div class="containerElementsDrop">
                        <div>
                            <img src="{{ asset('admin/imgs/sup.svg') }}" alt="">
                            <span>Suporte</span>
                        </div>
                    </div>
                </li>
            </div>


            <li class="container-drop" id="sup">
                <div class="containerElementsDrop">
                    <div style="display: flex">
                        <img src="{{ asset('admin/imgs/congi.svg') }}" alt="">
                        <span>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST">
                                @csrf
                                <button type="submit" class="logout">LogOut</button>
                            </form>
                        </span>
                    </div>
                </div>
            </li>

        </ul>


    </nav>

    <div>
        @yield('admin')
    </div>

    <script src="{{ asset('admin/admin.js') }}"></script>
</body>