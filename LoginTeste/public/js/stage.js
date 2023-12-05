document.getElementById("i").textContent = "1";

var senha = document.getElementById("inSenha");

const fechar = "http://127.0.0.1:8000/imgs/close.png";
const check = "http://127.0.0.1:8000/imgs/check-mark.png";

function possuiMaiuscula(str) {
    return /[A-Z]/.test(str);
}

function possuiCaracterEspecial(str) {
    return /[\p{P}]/u.test(str);
}

senha.addEventListener('input', () => {
    var in8Cara = document.getElementById("in8Cara");
    var inLetraMaiuscula = document.getElementById('inLetraMaiuscula');
    var inCaracteresEspecial = document.getElementById("inCaracteresEspecial");
    var img1 = document.getElementById("img1");
    var img2 = document.getElementById("img2");
    var img3 = document.getElementById("img3");

    if (senha.value.length < 8) {
        in8Cara.style.color = "red";
        img1.classList.remove("green");
        img1.classList.add("red");
        img1.src = fechar;
    } else {
        in8Cara.style.color = "green";
        img1.classList.add("green");
        img1.classList.remove("red");
        img1.src = check;
    }

    if (possuiMaiuscula(senha.value)) {
        inLetraMaiuscula.style.color = "green";
        img2.classList.add("green");
        img2.classList.remove("red");
        img2.src = check;
    } else {
        inLetraMaiuscula.style.color = "red";
        img2.classList.remove("green");
        img2.classList.add("red");
        img2.src = fechar;
    }

    if (possuiCaracterEspecial(senha.value)) {
        inCaracteresEspecial.style.color = "green";
        img3.classList.add("green");
        img3.classList.remove("red");
        img3.src = check;
    } else {
        inCaracteresEspecial.style.color = "red";
        img3.classList.remove("green");
        img3.classList.add("red");
        img3.src = fechar;
    }
});

function popup(texto) {
    var popup = document.getElementById("popup");
    popup.style.display = "block";
    document.getElementById("campo").textContent = texto;
}

function closePopup() {
    var popup = document.getElementById("popup");
    popup.style.display = "none";
}

function go() {
    var name = document.getElementById("inNome").value;
    var email = document.getElementById("inEmail").value;
    var dtNasc = new Date(document.getElementById("inDtNasc").value);
    var gener = document.getElementById("inGenero").value;
    var senha1 = document.getElementById("inSenha").value;
    var senha2 = document.getElementById("inSenhaC").value;
    var dataAtual = new Date();
    var diferenca = dataAtual - dtNasc;
    var idade = Math.floor(diferenca / (365.25 * 24 * 60 * 60 * 1000));


    if (name == "" || email == "" || dtNasc == "" || gener == "") {
        popup("Preencha os campos corretamente!");
    } else if (idade < 18) {
        popup("A sua idade não é o suficiente para a utlização da aplicação");
    } else if (senha1 != senha2) {
        popup("As senhas são diferentes");
    } else if (senha1.length < 8) {
        popup("A senha tem que ter no minimo 8 caracteres.");
    } else {
        document.getElementById("bloco2").style.display = "flex";
        document.getElementById("bloco1").style.display = "none";

        document.getElementById("i").textContent = "2";
        var btnA2 = document.getElementById("btnAvancar2");

        if (btnA2) {
            document.getElementById("btnAvancar2").style.display = "block";
            document.getElementById("btnAvancar1").style.display = "none";
        }
    }
}

var btnAvancar1 = document.getElementById("btnAvancar1");
btnAvancar1.addEventListener("click", go);

function back1() {
    document.getElementById("bloco2").style.display = "none";
    document.getElementById("bloco1").style.display = "flex";

    document.getElementById("i").textContent = "1";
    var btnA2 = document.getElementById("btnAvancar2");
    if (btnA2) {
        document.getElementById("btnAvancar2").style.display = "none";
        document.getElementById("btnAvancar1").style.display = "block";
    }
}

var btnVoltar1 = document.getElementById("btnVoltar1");
btnVoltar1.addEventListener("click", back1);

function go2() {
    var cep = document.getElementById("inCep").value;
    var cdd = document.getElementById("inCidade").value;
    var bairro = document.getElementById("inBairro").value;
    var rua = document.getElementById("inRua").value;
    var numeroCasa = document.getElementById("inNumero").value;

    if (
        cep == "" ||
        cdd == "" ||
        bairro == "" ||
        rua == "" ||
        numeroCasa == ""
    ) {
        popup("Preencha os campos corretamente!");
    } else {
        document.getElementById("bloco3").style.display = "flex";
        document.getElementById("bloco2").style.display = "none";
        document.getElementById("btnVoltar1").style.display = "none";
        document.getElementById("btnVoltar2").style.display = "block";

        document.getElementById("i").textContent = "3";

        document.getElementById("btnAvancarB").style.display = "block";
        document.getElementById("btnAvancar2").style.display = "none";
    }
}

var btnAvancar2 = document.getElementById("btnAvancar2");
btnAvancar2.addEventListener("click", go2);

function back2() {
    document.getElementById("bloco3").style.display = "none";
    document.getElementById("btnVoltar1").style.display = "block";
    document.getElementById("btnVoltar2").style.display = "none";
    document.getElementById("bloco2").style.display = "flex";
    document.getElementById("btnVoltar1").style.display = "block";

    document.getElementById("i").textContent = "2";
    document.getElementById("btnAvancarB").style.display = "none";
    document.getElementById("btnAvancar2").style.display = "block";
}

var btnVoltar2 = document.getElementById("btnVoltar2");
btnVoltar2.addEventListener("click", back2);
