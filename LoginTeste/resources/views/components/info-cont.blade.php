<div>
    <div class="card-config">
        <h3 class="title arimo">Informações de Contato.</h3>

        <a href="profile/edit/infos-contact" class="inputs-config-container">
            <div class="inputs-config">
                <p class="context-title input-basic">E-mail</p>
                <p class="context">{{ auth()->user()->email}}</p>
                <div><i class="bi bi-chevron-right"></i></div>
            </div>
        </a>


        <?php
        $telefone = auth()->user()->cell_usu;
        $maskedTelefone = '(' . substr($telefone, 0, 2) . ') ' . substr($telefone, 2, 5) . '-' . substr($telefone, 7, 4);
        ?>
        <a href="profile/edit/infos-contact" class="inputs-config-container">
            <div class="inputs-config">
                <p class="context-title input-basic">Telefone/Celular</p>
                <p class="context">{{ $maskedTelefone}}</p>
                <div><i class="bi bi-chevron-right"></i></div>
            </div>
        </a>

    </div>


</div>
