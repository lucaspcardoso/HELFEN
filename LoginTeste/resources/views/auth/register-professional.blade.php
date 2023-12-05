<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="{{ asset('css/defalt.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/registerProf.css') }}" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous" />
    <title>Cadastro Profissional / Helfen</title>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

<body>
    <div class="wave_container">
        <img src="{{ asset('imgs/wave2.png') }}" alt="" class="wave" />
    </div>
    <main class="container-components">
        <div>
            <img src="{{ asset('imgs/registerProfSimple.svg') }}" alt="" class="imagem" />
        </div>

        <div class="block">
            <div class="container-stage">
                <div id="btnVoltar1">
                    <img src="{{ asset('imgs/svg/arrow-left-short.svg') }}" alt="" class="arrow" />
                </div>

                <div id="btnVoltar2">
                    <img src="{{ asset('imgs/svg/arrow-left-short.svg') }}" alt="" class="arrow" />
                </div>
                <div class="stage">Etapa <span id="i"></span> de 3</div>
            </div>

            <div class="container-title">
                <p class="titulo">Cadastrar-se</p>
            </div>

            <form action="/registerp" method="POST" class="form-block" id="formRegister">
                @csrf
                <div id="bloco1">
                    <input placeholder="Nome" id="inNome" class="input" type="text" name="nm_prof"
                        :value="old('name')" required autofocus autocomplete="name" />
                    <input placeholder="Email" id="inEmail" class="input" type="email" name="email"
                        :value="old('email')" required autocomplete="username" />
                    <div class="infos_extras" id="infos-extras">
                        <input id="inDtNasc" class="inputs input" type="date" name="dt_nasc_prof" required
                            autocomplete="bday" />
                        <select class="input inputs" name="genero_prof" id="inGenero" autocomplete="sex">
                            <option value="d" disabled selected>
                                Gênero
                            </option>
                            <option value="Masculino">Masculino</option>
                            <option value="Feminino">Feminino</option>
                            <option value="Outro">Outro</option>
                        </select>
                    </div>
                    <input placeholder="Senha" id="inSenha" class="input" type="password" name="password" required
                        autocomplete="new-password" />
                    <input placeholder="Confirme a sua Senha" id="inSenhaC" class="input" type="password"
                        name="password_confirmation" required autocomplete="new-password" />
                </div>

                <div id="bloco2">
                    <input type="text" placeholder="CEP" class="input" id="inCep" name="cep_end_prof" required
                        autocomplete="cep" onkeyup="formatarCEP(this)" />
                    <input type="text" placeholder="Cidade" class="input" id="inCidade" name="cdd_end_prof"
                        required autocomplete="city" />
                    <input type="text" placeholder="Bairro" class="input" id="inBairro" name="bairro_end_prof"
                        required autocomplete="neighborhood" />
                    <input type="text" placeholder="Rua" class="input" id="inRua" name="rua_end_prof"
                        required autocomplete="street" />
                    <input type="text" placeholder="Nº" class="input" id="inNumero" name="num_end_prof"
                        required autocomplete="number_house" />
                </div>

                <div id="bloco3">
                    <input type="text" placeholder="Telefone/Celular" class="input" id="inCelTel"
                        name="cel_prof" required autocomplete="number_cell" oninput="formatarInputTelefone()" />
                    <input type="text" placeholder="CPF/CNPJ" class="input" id="inCPF" name="cpf_prof"
                        required autocomplete="cpf" oninput="formatarInputDocumento()" />
                </div>

                <div class="container-buttom">
                    <a class="botao_entrar" id="btnAvancar1">Avançar</a>
                    <a class="botao_entrar" id="btnAvancar2">Avançar</a>
                    <button class="botao_entrar" id="btnAvancarB" type="submit">
                        Avançar
                    </button>
                </div>
            </form>
        </div>
    </main>

    <div id="popup" class="popup">
        <div class="popup-content">
            <div onclick="closePopup()" class="buttom-popup">
                <img src="{{ asset('imgs/svg/x.svg') }}" alt="Close" class="image" />
            </div>
            <h2>Atenção</h2>
            <p id="campo"></p>
        </div>
    </div>
</body>

<script src="{{ asset('js/stage.js') }}"></script>
<script src="{{ asset('js/mascara.js') }}"></script>

</html>
