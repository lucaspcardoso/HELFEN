<?php
use App\Models\Categoria;

$categoria = Categoria::all();
?>

<nav class="menu" id="menu">

    <div>
        <ul>
            <li class="li-container" id="contain-img">
                <button class="hamburger-btn" id="btn-burger">&#9776;</button>
                <a href="/">
                    <x-icon-search />
                </a>
            </li>
        </ul>
    </div>

    <ul class="" id="containerComponentsMenu">

        <a href="{{ route('dashboard') }}" class="mb-2">
            <li class="li-container">
                @php
                    $url = request()->url();
                    $pattern = '/\/dashboard\/portfolio\/\d+$/'; // \d+ significa um ou mais dígitos
                @endphp
                <img src="{{ asset('imgs/svg/botao-home.svg') }}" alt="" class="icon-menu me-2"
                    @if (preg_match($pattern, $url)) style="transform: translateX(0)" @endif>
                <span class="arimo text-menu" id="text-menu">Home</span>
            </li>
        </a>

        <a class="mb-2" href="/dashboard/cat">
            <li class=" li-container">
                <img src="{{ asset('imgs/svg/icon-categoria.svg') }}" alt=""
                    class="icon-menu me-2"@if (preg_match($pattern, $url)) style="transform: translateX(0)" @endif>
                <span class="arimo text-menu" id="text-menu">Categoria</span>
            </li>
        </a>

        <a href="/dashboard/portfolio/{{ auth()->user()->id }}" class="mb-2">
            <li class="li-container">
                <img src="{{ asset('imgs/svg/person-fill.svg') }}" alt="" class="icon-menu me-2"
                    @if (preg_match($pattern, $url)) style="transform: translateX(0)" @endif>
                <span class="arimo text-menu" id="text-menu">Perfil</span>
            </li>
        </a>

        <a href="/dashboard/message" class="mb-2">
            <li class="li-container">
                <img src="{{ asset('imgs/svg/chat-left-dots-fill.svg') }}" alt="" class="icon-menu me-2"
                    @if (preg_match($pattern, $url)) style="transform: translateX(0)" @endif>
                <span class="arimo text-menu" id="text-menu">Mensagem</span>
            </li>
        </a>

        @if (auth()->user()->role == 'profissional')
            <a href="/dashboard/notificaion" class="mb-2">
                <li class="li-container">
                    <img src="{{ asset('imgs/svg/bell-fill.svg') }}" alt="" class="icon-menu me-2"
                        @if (preg_match($pattern, $url)) style="transform: translateX(0)" @endif>
                    <span class="arimo text-menu" id="text-menu">Notificações</span>
                </li>
            </a>

            <a href="/profissional/calender/{{ auth()->user()->id }}" class="mb-2">
                <li class="li-container">
                    <img src="{{ asset('imgs/svg/calendar.svg') }}" alt=""
                        class="icon-menu me-2"@if (preg_match($pattern, $url)) style="transform: translateX(0)" @endif>
                    <span class="arimo text-menu" id="text-menu">Calendário</span>
                </li>
            </a>
        @endif



    </ul>



    <ul class="alignment">
        <a href="{{ route('profile.show') }}" class="mb-2">
            <li class="li-container">
                <img src="{{ asset('imgs/svg/gear-fill.svg') }}" alt="" class="icon-menu me-2"
                    @if (preg_match($pattern, $url)) style="transform: translateX(0)" @endif>
                <span class="arimo text-menu" id="text-menu">Configurações</span>
            </li>
        </a>
    </ul>

</nav>

<x-menu-moba />

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="{{ asset('js/menu.js') }}"></script>
