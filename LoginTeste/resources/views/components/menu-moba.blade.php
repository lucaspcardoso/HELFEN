<nav class="menuTop" id="menuMobaTop">
    <div class="menu-visible">
        <button id="showMenu" onclick="showMenu()" class="buttonShowMenu">
            <i class="bi bi-list burger"></i>
        </button>
        <div class="container-icon-menu">
            <img src="{{ asset('imgs/logo.png') }}" alt="" class="logoMoba" />
        </div>
    </div>

    <ul class="menu-invisible" id="menuMoba">
        <div>
            <a href="{{ route('dashboard') }}" class="mb-2">
                <li class="li-container">
                    <img src="{{ asset('imgs/svg/botao-home.svg') }}" alt="" class="icon-menu me-2">
                    <span class="arimo text-menu" id="text-menu">Home</span>
                </li>
            </a>

            <a href="/dashboard/cat" class="mb-2 alignment">
                <li class="li-container">
                    <img src="{{ asset('imgs/svg/icon-categoria.svg') }}" alt="" class="icon-menu me-2">
                    <span class="arimo text-menu" id="text-menu">Categoria</span>
                </li>
            </a>

            <a href="/dashboard/portfolio" class="mb-2">
                <li class="li-container">
                    <img src="{{ asset('imgs/svg/person-fill.svg') }}" alt="" class="icon-menu me-2">
                    <span class="arimo text-menu" id="text-menu">Perfil</span>
                </li>
            </a>
        </div>
        <ul class="alignment config">
            <a href="{{ route('profile.show') }}" class="mb-2">
                <li class="li-container">
                    <img src="{{ asset('imgs/svg/gear-fill.svg') }}" alt="" class="icon-menu me-2">
                    <span class="arimo text-menu" id="text-menu">Configurações</span>
                </li>
            </a>
        </ul>
    </ul>

    <div class="block-ocult" id="blocoOculto" onclick="closeMenu()"></div>
</nav>

<nav class="menuBottom" id="menuMobaBottom">
    <div>
        <a href="{{ route('dashboard') }}">
            <img src="{{ asset('imgs/svg/botao-home.svg') }}" alt="" class="icon-menu me-2">
        </a>
    </div>

    <div>
        <a href="/dashboard/message">
            <img src="{{ asset('imgs/svg/chat-left-dots-fill.svg') }}" alt="" class="icon-menu me-2">
        </a>
    </div>

    <div class="searchButton">
        <a href="">
            <i class="bi bi-search"></i>
        </a>
    </div>

    <div>
        <a href="/dashboard/notificaion">
            <img src="{{ asset('imgs/svg/bell-fill.svg') }}" alt="" class="icon-menu me-2">
        </a>
    </div>

    <div>
        <a href="{{ route('profile.show') }}">
            <img src="{{ asset('imgs/svg/gear-fill.svg') }}" alt="" class="icon-menu me-2">
        </a>
    </div>
</nav>

<script src="{{ asset('js/menuMoba.js') }}"></script>
