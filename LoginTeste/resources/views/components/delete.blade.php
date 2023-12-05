<div class="card-config">
    <h3 class="title arimo">Apagar conta</h3>

    <div href="#" class=" inputs-config-container">
        <div>
            <div class="mt-10 sm:mt-0">
                <p>Depois que sua conta for excluída, todos os seus recursos e dados serão excluídos permanentemente. Antes de excluir sua conta, faça o download de todos os dados ou informações que deseja reter.</p>
                <form action="/user/profile/{{auth()->user()->id}}" method="post">
                    @csrf
                    @method("delete")
                    <button class="btn btn-outline-danger" type="submit">Apagar Conta</button>
                </form>
            </div>
        </div>
    </div>
</div>