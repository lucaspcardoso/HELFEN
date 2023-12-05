<title>Configurações / Helfen</title>
<link rel="stylesheet" href="{{asset('css/popUp.css')}}">
<x-app-layout>
    <main class="mt-4 ">
        <div>
            <div class="search">
                <h3 class="title arimo">Configurações</h3>
                <div class="">
                    <a href="{{ route('dashboard') }}">
                        <x-icon-search />
                    </a>
                </div>
            </div>

            <div class="main-config">
                <div class="config">
                    <nav class="nav-config">
                        <a href="#info_pessoal">Informações pessoais</a>
                        <a href="#security">Segurança</a>
                        <a href="">Personalizar</a>
                        <a href="">Verificação de Duas Etapas</a>
                        <a href="">Histórico</a>

                        <form method="POST" action="{{ route('logout') }}" x-data>
                            @csrf
                            <x-dropdown-link href="{{ route('logout') }}" onclick="event.preventDefault();
        this.closest('form').submit();">
                                {{ __('Logout') }}
                            </x-dropdown-link>
                        </form>
                    </nav>

                    <div class="configs">
                        <x-info-pessoal />
                        <x-info-cont />
                        <x-info-end />
                        <x-update-pass />
                        @livewire('profile.logout-other-browser-sessions-form')
                        <x-delete />
                    </div>
                </div>
            </div>
    </main>


</x-app-layout>