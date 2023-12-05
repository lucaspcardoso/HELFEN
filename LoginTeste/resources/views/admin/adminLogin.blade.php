<?php
$text = 'Administrador';
$title = 'Login';
?>

@extends('layouts\layout_login_cad') @section('form')
    <div class="login_block">
        <h1 class="titulo"><?= $title ?></h1>

        <form action="/ad/login" method="POST">
            @csrf
            <div class="input_block">
                <input id="inEmail" placeholder="Email" class="input" type="text" name="email" :value="old('email')"
                    required autofocus autocomplete="username" />
                <input id="inSenha" placeholder="Senha" class="input input_baixo" type="password" name="password" required
                    autocomplete="current-password" />

                <label for="remember_me" class="checkbox_remember">
                    <x-checkbox id="remember_me" name="remember" />
                    <span class="check">{{ __('Salvar Informações de Login') }}</span>
                </label>

            </div>

            <div class="button_block">
                <button type="submit" class="botao_entrar">
                    Entrar
                </button>
            </div>
        </form>
    </div>
@endsection
