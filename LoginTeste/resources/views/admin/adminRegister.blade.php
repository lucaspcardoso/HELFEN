<?php
$text = 'Register Administrador';
$NSelecionada = 'admin/imgs/imagem não selecionada.png';
$invalida = "asset('admin/imgs/imagem invalida.png')";
?>

@extends('layouts.layout_admin') @section('admin')
    <main class="viewRegister">
        <div class="containerAllRegister">
            <div class="containerTitle">
                <h3 style="margin-top: 100px">Cadastrar {{ $name }}</h3>
            </div>

            <div class="linha">
                @if ($rota == 'cat')
                    <div class="coluna">
                        <div class="containerImgView">
                            <img src=" {{ $type->img ?? asset('admin/imgs/imgNSelecionada.png') }} " alt=""
                                id="imagePreview">
                        </div>
                    </div>
                @endif

                <div class="containerInput">
                    @if (empty($type))
                        <form action="/register/{{ $rota }}" method="POST"
                            class="containerInput  @if ($rota != 'subCat') ajustePosiotion @endif"
                            enctype="multipart/form-data">
                            @csrf
                        @else
                            <form action="/register/update/{{ $rota }}/{{ $type->id }}" method="POST"
                                class="containerInput  @if ($rota != 'subCat') ajustePosiotion @endif"
                                enctype="multipart/form-data">
                                @csrf
                                @method('put')
                    @endif

                    {{-- cuidado desativar o texto por conta do espaços --}}
                    <input type="text" class="input" id="name" name="name"
                        placeholder="Insira o nome da {{ $name }}"
                        value=@if ($rota == 'cat') {{ $type->nm_categoria ?? null }}
                        @elseif($rota == 'subCat'){{ $type->nm_subCat ?? null }}
                        @elseif($rota == 'admin'){{ $type->name ?? null }} @endif>
                    @if ($rota == 'subCat')
                        <select name="categoria" id="categoria" class="input">
                            <option value="" disabled selected>Associar Categoria</option>
                            @foreach ($dados['categoria'] as $cat)
                                @if (request()->url() != 'http://127.0.0.1:8000/adminHome/register/subCat' && $cat->id == $categoriaAssociadaId)
                                    <option value="{{ $cat->id }}" selected>{{ $cat->nm_categoria }}</option>
                                @endif
                                <option value="{{ $cat->id }}">{{ $cat->nm_categoria }}</option>
                            @endforeach
                        </select>
                    @elseif($rota == 'cat')
                        <input type="file" name="imagem" id="imagem" class="photoInput">
                        <label for="imagem" class="photoLabel" id="imagem">Escolher Imagem</label>
                    @elseif($rota == 'admin')
                        <input class="input" type="text" name="email" id="email"
                            placeholder="Insira um email para o administrador" value="{{ $type->email ?? null }}">
                        <input class="input" type="password" name="senhaAdmin" id="senhaAdmin"
                            placeholder="Insira uma senha para o administrador">
                        <input class="input" type="password" name="confirmSenha" id="confirmSenha"
                            placeholder="Confirme a senha para o administrador">
                    @endif

                    <div class="containerButton @if ($rota != 'subCat') containerButtonAjuste @endif">
                        <button type="submit"
                            class="btnSubmit @if ($rota != 'subCat') buttonDistance @endif ">Salvar
                            {{ $name }}</button>
                        <button type="reset" class="btnClear" id="btnClear">Limpar Campos</button>
                    </div>


                    </form>
                </div>




            </div>

        </div>

        </div>

    </main>

    <script src="{{ asset('admin/registerAdmin.js') }}"></script>
@endsection
