<section class="filter">
    {{-- colocar para trocar ser versatil --}}
    <span class="bold">Usuários</span>
    <div>
        <span class="gray">
            Filtro <img src="{{ asset('admin/imgs/filter.svg') }}" alt="">
        </span>

        <div class="ContainerFormFilter">
            <form action="">
                <input type="text" name="id" id="id" placeholder="id">

                <input type="text" name="name" id="name" placeholder="Nome">

                <select name="position" id="position">
                    <option value="" selected disabled>Selecione um Cargo</option>
                    <option value="prof">Profissional</option>
                    <option value="user">Usuário</option>
                </select>
            </form>
        </div>
    </div>
</section>



<div class="containerTableTop">
    <div class="containerTableFirtBlock">
        <div class="bold">id</div>
        <div class="bold">Nome</div>
        <div class="bold">Cargo</div>
    </div>

    <div class="containerTableSecondBlock">
        <div class="bold">Ações</div>
    </div>

</div>

@foreach ($dados as $info)
    <div class="containerTableTop select">
        <div class="containerTableFirtBlock">
            <div>#{{ $info->id }}</div>
            <div>Lucas Pugliesi Cardoso</div>
            <div>Profissional</div>
        </div>

        <div class="containerTableSecondBlock">
            <div class="bold">Ações</div>
        </div>

    </div>
@endforeach
