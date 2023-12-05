function verificar() {
    var inEmail = document.getElementById("inEmail");
    var inSenha = document.getElementById("inSenha");

    var email = inEmail.value;
    var senha = inSenha.value;

    if (email == "" || senha == "") {
        alert("Informe corretamente os dados");
        email.focus();
        return;
    }
}

var btEntrar = document.getElementById("btEntrar");
btEntrar.addEventListener("click", verificar);
