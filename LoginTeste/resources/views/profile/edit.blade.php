<!DOCTYPE html>
<html lang="pt-br">


<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/edit.css') }}">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <title>{{ $tipo }} / Helfen</title>
</head>

<body>
    <div class="container-menu">
        <nav>
            <x-icon-search />

            <a href="{{ route('dashboard') }}">
                <img src="{{ auth()->user()->profile_photo_path }}" alt="" class="photo-user">
            </a>
        </nav>

        <div class="top-bar">
            <img src="{{ asset('imgs/svg/arrow-left-short.svg') }}" class="arrow" id="back">
            <span class="edit-text arimo">{{ $tipo }}</span>
        </div>

    </div>

    <!-- Fazer por foreach os dados de informações básicas por exemplo -->
    <main>
        <div class="card">
            <span class="title">{{ $tipo }}</span>
            <form action="/user/{{ auth()->user()->id }}/{{ $tipo }}" method="POST"
                enctype="multipart/form-data">
                @csrf
                @method('put')
                @foreach ($dados as $key => $infos)
                    @if ($key === 'Foto de Perfil')
                        <fieldset class="container-inputs" style="justify-content: space-between">
                        @else
                            <fieldset class="container-inputs">
                    @endif

                    <legend class="label">{{ $key }}</legend>

                    @if ($key === 'Sexo')
                        <select class="input" name="genero_usu">
                            @if ($infos === 'Masculino')
                                <option value="Masculino" selected>Masculino</option>
                                <option value="Feminino">Feminino</option>
                                <option value="Outro">Outro</option>
                            @elseif ($infos === 'Feminino')
                                <option value="Masculino">Masculino</option>
                                <option value="Feminino" selected>Feminino</option>
                                <option value="Outro">Outro</option>
                            @elseif ($infos === 'Outro')
                                <option value="Masculino">Masculino</option>
                                <option value="Feminino">Feminino</option>
                                <option value="Outro" selected>Outro</option>
                            @endif
                        </select>
                    @elseif ($key === 'CEP')
                        <input class="input" type="text" value="{{ $infos }}" id="inCep" name="cep"
                            onkeyup="formatarCEP(this)" />
                    @elseif ($key === 'Telefone/Celular')
                        <input type="text" value="{{ $infos }}" class="input" name="inCelTel" id="inCelTel"
                            oninput="formatarInputTelefone()">
                    @elseif ($key === 'Data de Nascimento')
                        <input class="input" type="date" value="{{ $infos }}" name="dt_nasc_usu" />
                    @elseif($key === 'Confirmar Senha')
                        <input class="input" type="text" value="{{ $infos }}" name="c_senha" />
                    @elseif($key === 'Foto de Perfil')
                        <label for="inputPhoto" class="photoLabel">Escolher Imagem</label>
                        <input type="file" class="photo" value="{{ $infos }}" name="inputPhoto"
                            id="inputPhoto">
                        <div>
                            <img src="{{ auth()->user()->profile_photo_path }}" alt="" id="photo1"
                                class="photoView">
                        </div>
                    @elseif ($key === 'CPF' && auth()->user()->cpf_usu != 0)
                        <input class="input" type="text" value="{{ $infos }}" name="inCPF" id="inCPF"
                            oninput="formatarInputDocumento()" />
                    @elseif ($key === 'CNPJ' && auth()->user()->cnpj_usu != 0)
                        <input class="input" type="text" value="{{ $infos }}" name="inCNPJ" id="inCNPJ"
                            oninput="formatarInputDocumento()" />
                    @else
                        <input type="text" value="{{ $infos }}" class="input" name="{{ $key }}">
                    @endif
                    </fieldset>
                @endforeach

                <div class="container-button">
                    <button type="submit" class="button">Salvar</button>
                </div>
            </form>
        </div>
    </main>
</body>

<script src="{{ asset('js/edit.js') }}"></script>
<script src="{{ asset('js/mascara.js') }}"></script>

</html>
