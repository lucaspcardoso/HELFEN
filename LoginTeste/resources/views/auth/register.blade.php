<?php $text = 'Cadastro';
$etapa = 'Avançar';
?>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


@extends('layouts\layout_login_cad') @section('form')
    <div class="login_block">

        <div class="container-stage">
            <div id="btnVoltar1"><img src="{{ asset('imgs/svg/arrow-left-short.svg') }}" alt="" class="arrow"></div>
            <div class="stage"> Etapa <span id="i"></span> de 3</div>
        </div>
        <h1 class="titulo"><?= $text ?></h1>

        {{-- colocar seta --}}
        <form action="{{ route('register') }}" method="POST" id="formRegister">
            @csrf
            <div class="input_block">



                <div id="bloco1">
                    <input placeholder="Nome" id="inNome" class="input" type="text" name="name"
                        :value="old('name')" required autofocus autocomplete="name" />
                    <input placeholder="Email" id="inEmail" class="input" type="email" name="email"
                        :value="old('email')" required autocomplete="username" />
                    <div class="infos_extras" id="infos-extras">
                        <input id="inDtNasc" class="input inputDT" type="date" name="dt_nasc_usu" required />
                        <select class="input" name="genero_usu" id="inGenero">
                            <option value="d" disabled selected>Gênero</option>
                            <option value="Masculino">Masculino</option>
                            <option value="Feminino">Feminino</option>
                            <option value="Outro">Outro</option>
                        </select>
                    </div>

                    <input placeholder="Senha" id="inSenha" class="input" type="password" name="password" required
                        autocomplete="new-password" style="margin-bottom:0 " />
                    <span class="containerHintSenha">
                        <span id="in8Cara"><img src="{{ asset('imgs/close.png') }}" class="hintImg red"
                                id="img1">Minimo
                            de 8
                            caracteres</span>
                        <span id="inLetraMaiuscula"> <img src="{{ asset('imgs/close.png') }}" class="hintImg red"
                                id="img2">Ter no
                            minimo
                            uma letra maiuscula</span>
                        <span id="inCaracteresEspecial"> <img src="{{ asset('imgs/close.png') }}" class="hintImg red    "
                                id="img3">Possui caracteres
                            especiais.</span>
                    </span>
                    <input placeholder="Confirme a sua Senha" id="inSenhaC" class="input" type="password"
                        name="password_confirmation" required autocomplete="new-password" />

                    @error('email')
                        <p class="textRed">{{ $message }}</p>
                    @enderror
                </div>

                <div id="bloco2">
                    <input type="text" placeholder="CEP" class="input" id="inCep" name="cep_end_usu" required
                        autocomplete="cep" onkeyup="formatarCEP(this)" />
                    <input type="text" placeholder="Cidade" class="input" id="inCidade" name="cdd_end_usu" required
                        autocomplete="city" />
                    <input type="text" placeholder="Bairro" class="input" id="inBairro" name="bairro_end_usu" required
                        autocomplete="neighborhood" />
                    <input type="text" placeholder="Rua" class=" input" id="inRua" name="rua_end_usu" required
                        autocomplete="street" />
                    <input type="text" placeholder="Nº" class=" input" id="inNumero" name="num_end_usu" required
                        autocomplete="number_house" />
                    <input type="text" placeholder="Telefone/Celular" class="input" id="inCelTel" name="cell_usu"
                        required autocomplete="number_cell" oninput="formatarInputTelefone()" />
                </div>


                @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                    <div class="mt-4">
                        <x-label for="terms">
                            <div class="flex items-center">
                                <x-checkbox name="terms" id="terms" required />

                                <div class="ml-2">
                                    {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                        'terms_of_service' =>
                                            '<a target="_blank" href="' .
                                            route('terms.show') .
                                            '" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">' .
                                            __('Terms of Service') .
                                            '</a>',
                                        'privacy_policy' =>
                                            '<a target="_blank" href="' .
                                            route('policy.show') .
                                            '" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">' .
                                            __('Privacy Policy') .
                                            '</a>',
                                    ]) !!}
                                </div>
                            </div>
                        </x-label>
                    </div>
                @endif
            </div>



            <div class="button_block">
                <a class="botao_entrar" id="btnAvancar1">Avançar</a>
                <button class="botao_entrar" id="btnAvancar2" type="submit" style="display: none;">Avançar</button>
            </div>

            <div class="cadastre">
                Já possui conta?
                <span><a href="{{ route('login') }}" class="link_cadastre">Login.</a></span>
            </div>

        </form>

    </div>

    <div id="popup" class="popup">
        <div class="popup-content">
            <div onclick="closePopup()" class="buttom-popup">
                <img src="{{ asset('imgs/svg/x.svg') }}" alt="Close" class="image">
            </div>
            <h2>Atenção</h2>
            <p id="campo"></p>
        </div>
    </div>

    <script src="{{ asset('js/stage.js') }}"></script>
    <script src="{{ asset('js/mascara.js') }}"></script>
@endsection
