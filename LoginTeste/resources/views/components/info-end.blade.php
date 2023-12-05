<div>
    <div class="card-config">
        <h3 class="title arimo">Endereço.</h3>
        @if (auth()->user()->work_usu == 1)
        <p class="sub-config">Informações sobre o seu endereço e local de trabalho</p>
        @else
        <p class="sub-config">Informações sobre o seu endereço para informar você sobre os serviços proximos.</p>
        @endif

        <a href="profile/edit/infos-end" class="inputs-config-container">
            <div class="inputs-config">

                <?php

                use Illuminate\Support\Str;


                $cep = auth()->user()->cep_end_usu;
                $formatCEP = Str::substr($cep, 0, 5) . "-" . Str::substr($cep, 5);

                ?>
                <p class="context-title input-basic">CEP</p>
                <p class="context" id="cep">{{ $formatCEP}}</p>
                <div><i class="bi bi-chevron-right"></i></div>
            </div>
        </a>

        <a href="profile/edit/infos-end" class="inputs-config-container">
            <div class="inputs-config">
                <p class="context-title input-basic">Rua</p>
                <p class="context">{{ auth()->user()->rua_end_usu}}</p>
                <div><i class="bi bi-chevron-right"></i></div>
            </div>
        </a>

        <a href="profile/edit/infos-end" class="inputs-config-container">
            <div class="inputs-config">
                <p class="context-title input-basic">Bairro</p>
                <p class="context">{{ auth()->user()->bairro_end_usu}}</p>
                <div><i class="bi bi-chevron-right"></i></div>
            </div>
        </a>

        <a href="profile/edit/infos-end" class="inputs-config-container">
            <div class="inputs-config">
                <p class="context-title input-basic">Cidade</p>
                <p class="context">{{ auth()->user()->cdd_end_usu}}</p>
                <div><i class="bi bi-chevron-right"></i></div>
            </div>
        </a>

        <a href="profile/edit/infos-end" class="inputs-config-container">
            <div class="inputs-config">
                <p class="context-title input-basic">Número</p>
                <p class="context">{{ auth()->user()->num_end_usu}}</p>
                <div><i class="bi bi-chevron-right"></i></div>
            </div>
        </a>

    </div>


</div>