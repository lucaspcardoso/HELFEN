    <head>
        <title>Redefinir Senha / Helfen</title>
    </head>
    <x-guest-layout>


        <nav class="navbar menu-pass">
            <div class="container">
                <div class="flex-start">
                    <a class="navbar-brand" href="/">
                        <img src="{{ asset('imgs/logo.png') }}" alt="Helfen" class="image" /><span class="bebas title">Helfen</span>
                    </a>
                </div>

                @guest
                <div class="flex-center">
                    <a href="/login" class="buttom-login">Login</a>
                </div>
                @endguest @auth
                <div class="flex-center">
                    <a href="/login" class="buttom-login">Entrar</a>
                </div>
                @endauth
            </div>
            </div>
        </nav>

        <div class="pass-container">
            <div class="pass-container-elements">
                <div class="mb-4 text-sm text-gray-600 text-center">
                    {{ __('Esqueceu sua senha? Sem problemas. Basta nos informar seu endereço de e-mail e enviaremos por e-mail um link de redefinição de senha que permitirá que você escolha uma nova.') }}
                </div>
                @if (session('status'))
                <div class="mb-4 font-medium text-sm text-green-600">
                    {{ session('status') }}
                </div>
                @endif

                <x-validation-errors class="mb-4" />

                <form method="POST" action="{{ route('password.email') }}">
                    @csrf

                    <div class="input-email">
                        <x-label for="email" value="{{ __('Email:') }}" style="color: #ccc" />
                        <x-input id="email" class="block mt-1 w-full input-pass" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                    </div>

                    <div class="flex items-center justify-end mt-4">
                        <button type="submit" class="button-device inline-flex items-center px-4 py-2 bg-76cad4 border border-gray-300 rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 disabled:opacity-25 transition ease-in-out duration-150">
                            Redefinir Senha
                        </button>
                    </div>
                </form>
            </div>
        </div>

    </x-guest-layout>