<title>Configurações / Helfen</title>
<x-app-layout>
    <main class="mt-4">
        <div>
            <div class="search">
                <h3 class="title arimo">Configurações</h3>
                <div class="">
                    <a href="{{ route('dashboard') }}">
                        <x-icon-search />
                    </a>
                </div>
            </div>

            <div class="config">
                <nav class="nav-config">
                    <a href="{{ route('profile.show') }}">Informações pessoais</a>
                    <a href="">Segurança</a>
                    <a href="">Personalizar</a>
                    <a href="">Verificação de Duas Etapas</a>
                    <a href="">Histórico</a>

                    <form method="POST" action="{{ route('logout') }}" x-data>
                        @csrf

                        <x-dropdown-link href="{{ route('logout') }}" @click.prevent="$root.submit();">
                            {{ __('Log Out') }}
                        </x-dropdown-link>
                    </form>
                </nav>

                <div class="configs">
                    <x-info-pessoal />
                    <x-info-cont />
                    <x-info-end />
                    <x-update-pass />
                    <x-security />
                    <x-delete />
                </div>
            </div>
    </main>


</x-app-layout>