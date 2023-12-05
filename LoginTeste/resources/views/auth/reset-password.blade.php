<head>
    <title>Redefinir Senha / Helfen</title>
</head>
<x-guest-layout>
    <nav class="navbar menu-pass">
        <div class="container">
            <div class="flex-start">
                <a class="navbar-brand" href="/">
                    <img src="{{ asset('imgs/logo.png') }}" alt="Helfen" class="image" /><span
                        class="bebas title">Helfen</span>
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
        <div class="teste">
            <x-validation-errors class="mb-4" />

            <form method="POST" action="{{ route('password.update') }}">
                @csrf

                <input type="hidden" name="token" value="{{ $request->route('token') }}">

                <div class="input-email pass-container-elements new-pass">
                    <x-label for="email" value="{{ __('Email:') }}" />
                    <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email', $request->email)"
                        required autofocus autocomplete="username" />
                </div>

                <div class="mt-4 pass-container-elements new-pass input-email">
                    <x-label for="password" value="{{ __('Nova Senha:') }}" />
                    <x-input id="password" class="block mt-1 w-full" type="password" name="password" required
                        autocomplete="new-password" />
                </div>

                <div class="mt-4 pass-container-elements new-pass input-email">
                    <x-label for="password_confirmation" value="{{ __('Confirme a Senha nova:') }}" />
                    <x-input id="password_confirmation" class="block mt-1 w-full" type="password"
                        name="password_confirmation" required autocomplete="new-password" />
                </div>

                <div class="flex items-center justify-end mt-4">
                    <x-button>
                        {{ __('Redefinir Senha') }}
                    </x-button>
                </div>
            </form>
        </div>
    </div>
</x-guest-layout>

{{-- <x-guest-layout>
        <x-authentication-card>
            <x-slot name="logo">
                <x-authentication-card-logo />
            </x-slot>

            <x-validation-errors class="mb-4" />


        </x-authentication-card>
    </x-guest-layout> --}}
