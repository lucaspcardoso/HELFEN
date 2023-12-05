<div id="info_pessoal">
    <div class="config-container-title">
        <h3 class="title arimo">Informações pessoais.</h3>
        <p class="sub-config">Informações sobre você e suas preferencias no Helfen</p>
    </div>

    <div class="config-description">
        <h3 class="title arimo">Informações pessoais do seu perfil no Helfen.</h3>
        <p class="sub-config">Disponibilizamos uma edição para adição de informações ou correções para seu site, podendo
            mudar a forma de contato, foto de perfil.</p>
    </div>

    <div class="card-config">
        <h3 class="title arimo">Informações básicas.</h3>
        <p class="sub-config">Informações básicas e essencias para o seu cadastro no serviço.</p>
        <div>
            <div class="inputs-config">
                <p class="context-title">Foto de Perfil</p>
                <p class="context">Uma foto de perfil a ajudar a personalizar a sua conta</p>
                <div>
                    <a href="profile/edit/infos-basic" class="link-image">
                        <img src="{{ auth()->user()->profile_photo_path }}" alt="" class="image">
                    </a>
                </div>
            </div>
        </div>


        <a href="profile/edit/infos-basic" class=" inputs-config-container">
            <div class="inputs-config">
                <p class="context-title input-basic">Nome</p>
                <p class="context">{{ auth()->user()->name }}</p>
                <div><i class="bi bi-chevron-right"></i></div>
            </div>
        </a>

        <a href="profile/edit/infos-basic" class="inputs-config-container">
            <div>
                <div class="inputs-config">
                    <p class="context-title input-basic">Data de Nascimento</p>

                    <?php
                    
                    use Carbon\Carbon;
                    $data = Carbon::createFromFormat('Y-m-d', auth()->user()->dt_nasc_usu);
                    $formatedData = $data->locale('pt-BR')->isoFormat('LL');
                    ?>
                    <p class="context">{{ $formatedData }}</p>
                    <div><i class="bi bi-chevron-right"></i></div>
                </div>
            </div>
        </a>

        <a href="profile/edit/infos-basic" class="inputs-config-container">
            <div>
                <div class="inputs-config">
                    <p class="context-title input-basic">Sexo</p>
                    <p class="context">{{ auth()->user()->sexo_usu }}</p>
                    <div><i class="bi bi-chevron-right"></i></div>
                </div>
            </div>
        </a>

        <div class="inputs-config-container">
            <div>
                <div class="inputs-config">
                    <p class="context-title input-basic">Transformar conta em Profissional</p>
                    @if (auth()->user()->role == 'profissional')
                        <div class="toggle-btn active" onclick="toggleButton()">
                        @else
                            <div class="toggle-btn" onclick="toggleButton()">
                    @endif
                    <div class="circle"></div>

                </div>

                <div class="popup-overlay" id="popupOverlay">
                    <div id="makeProf" class="popup-content">
                        <div class="">
                            <div>
                                <h1 id="text-warning">Virar Profissional</h1>
                                <p id="textCpfSobre">Insira o seu CPF ou CNPJ para se tornar um profissional, e insira
                                    uma
                                    breve
                                    informação sobre
                                    você.</p>
                            </div>
                            <!--formulário-->
                            <form action="/make/{{ auth()->user()->id }}/prof" method="POST" id="formProfMake"
                                data-id="{{ auth()->user()->id }}">
                                @method('put')
                                @csrf

                                <div class="containerFormProfiAll" id="CpfInput">
                                    <input type="text" placeholder="CPF/CNPJ" name="inCPF" class="inputProf"
                                        id="inCPF" oninput="formatarInputDocumento()">
                                </div>

                                <div class="containerFormProfiAll">
                                    <textarea class="estilo_form inputProf" id="inSobre" name="inSobre" rows="4" cols="40"
                                        placeholder="Sobre você"></textarea>
                                </div>

                                <div class="containerButton">
                                    <button type="button" onclick="cancelAction()"
                                        class="button-cancel">Fechar</button>
                                    <button type="submit" class="button-accept" id="btnConfirmar">Se
                                        torne
                                        profissional</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    @if (auth()->user()->cpf_usu && auth()->user()->cpf_usu != 0)
        <?php
        $cpf = auth()->user()->cpf_usu;
        $maskedCpf = substr($cpf, 0, 3) . '.' . substr($cpf, 3, 3) . '.' . substr($cpf, 6, 3) . '-' . substr($cpf, 9, 2);
        ?>
        <a href="profile/edit/infos-basic" class="inputs-config-container">
            <div>
                <div class="inputs-config">
                    <p class="context-title input-basic">CPF</p>
                    <p class="context">{{ $maskedCpf }}</p>
                </div>
            </div>
        </a>
    @elseif (auth()->user()->cnpj_usu && auth()->user()->cnpj_usu != 0)
        <?php
        $cnpj = auth()->user()->cnpj_usu;
        $maskedCnpj = substr($cnpj, 0, 2) . '.' . substr($cnpj, 2, 3) . '.' . substr($cnpj, 5, 3) . '/' . substr($cnpj, 8, 4) . '-' . substr($cnpj, 12, 2);
        ?>
        <a href="profile/edit/infos-basic" class="inputs-config-container">
            <div>
                <div class="inputs-config">
                    <p class="context-title input-basic">CNPJ</p>
                    <p class="context">{{ $maskedCnpj }}</p>
                </div>
            </div>
        </a>
    @endif
</div>



</div>
