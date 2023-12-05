// Botões
const xp = document.getElementById("xp");
const formacaoAcademica = document.getElementById("forAcademica");
const language = document.getElementById("language");
const descUsu = document.getElementById("descUsu");
const editProffile = document.getElementById("editProfille");
const modal_container = document.getElementById("popUpContainer");

const modal_containerUpdate = document.getElementById("UppopUpContainer");

const close = document.getElementById("close");
const inputColor = document.querySelectorAll(".colorInput1");
const containerInputs = document.querySelectorAll(".containerInput");

// Textos e inputs
const title = document.getElementById("title");
const input1 = document.getElementById("input1");
const input2 = document.getElementById("input2");
const input3 = document.getElementById("input3");
const input4 = document.getElementById("input4");
const descricao = document.getElementById("descricao");
const selectCurso = document.getElementById("selectCurso");
const selectLanguage = document.getElementById("selectNivel");
const selectIdioma = document.getElementById("selectIdioma");

const placeHolder1 = document.getElementById("cargo");
const placeHolder2 = document.getElementById("empresa");
const placeHolder3 = document.getElementById("desc");
const selectValue = document.getElementById("SelectCursoValue");
const divInput1 = document.getElementById("divInput1");
const divInput2 = document.getElementById("divInput2");
const containerAllPopUp = document.getElementById("containerAllPopUp");

const btnCpf = document.getElementById("vireProfi");

const form = document.getElementById("formXpFormacao");
if (btnCpf == null) {
    language.addEventListener("click", () => {
        containerInputs.forEach((e) => {
            e.style.display = "none";
        });

        inputColor.forEach((e) => {
            e.style.display = "none";
        });

        // Texts
        title.textContent = "Idioma";
        selectLanguage.style.display = "flex";
        selectIdioma.style.display = "flex";
        selectCurso.style.display = "none";
        document.getElementById("colorInput1").style.display = "none";

        form.action = "/dashboard/portfolio/lang";

        // Disposição e vizualização
        descricao.style.display = "none";
        modal_container.classList.add("showPop");
    });
}

if (btnCpf == null) {
    xp.addEventListener("click", () => {
        containerInputs.forEach((e) => {
            e.style.display = "flex";
        });

        inputColor.forEach((e) => {
            e.style.display = "none";
        });

        // Texts
        title.textContent = "Experiência";
        input1.textContent = "Cargo";
        input2.textContent = "Empresa";
        input3.textContent = "Descrição Experiência";
        input4.style.display = "flex";
        selectLanguage.style.display = "none";
        selectCurso.style.display = "none";
        selectIdioma.style.display = "none";
        document.getElementById("colorInput1").style.display = "none";

        // Placeholders
        placeHolder1.placeholder = "Cargo";
        placeHolder2.placeholder = "Empresa";
        placeHolder3.placeholder = "Descrição da sua Experiência";

        // Values
        placeHolder1.name = "cargo";
        placeHolder2.name = "empresa";
        placeHolder3.name = "desc";
        form.action = "/dashboard/portfolio/xp";

        // Disposição e vizualização
        descricao.style.display = "flex";
        modal_container.classList.add("showPop");
    });
}

if (btnCpf == null) {
    formacaoAcademica.addEventListener("click", () => {
        // Select
        selectCurso.style.display = "flex";
        divInput1.style.display = "flex";
        descricao.style.display = "flex";
        placeHolder1.placeholder = "Curso";
        placeHolder3.placeholder = "Descrição do Curso";
        selectValue.addEventListener("change", () => {
            if (selectValue.value == "curso") {
                placeHolder1.placeholder = "Curso";
                placeHolder3.placeholder = "Descrição do Curso";
                input1.textContent = "Curso";
                input3.textContent = "Descrição do Curso";
                placeHolder1.name = "curso";
            } else if (selectValue.value == "uni") {
                placeHolder1.placeholder = "Universidade";
                placeHolder3.placeholder = "Descrição da Universidade";
                input1.textContent = "Universidade";
                input3.textContent = "Descrição da Universidade";
                placeHolder1.name = "universidade";
            }
        });

        inputColor.forEach((e) => {
            e.style.display = "none";
        });

        // Texts
        title.textContent = "Formação Acadêmica";
        input1.textContent = "Curso";
        input3.textContent = "Descrição do Curso";
        divInput2.style.display = "none";
        input4.style.display = "none";
        document.getElementById("colorInput1").style.display = "none";
        placeHolder3.name = "descUni";
        placeHolder1.name = "curso";
        selectLanguage.style.display = "none";
        selectIdioma.style.display = "none";

        form.action = "/dashboard/portfolio/formacao";

        // Disposição e vizualização
        modal_container.classList.add("showPop");
    });
}

const closeUp = document.getElementById("closeUp");
closeUp.addEventListener("click", () => {
    modal_containerUpdate.classList.remove("showPop");
    placeHolder3.textContent = "";
});

close.addEventListener("click", () => {
    modal_container.classList.remove("showPop");
    placeHolder1.value = "";
    placeHolder2.value = "";
    placeHolder3.textContent = "";
    selectValue.value = "dis";
    selectLanguage.value = "dis";
});

// Update

const inputColorUpdate = document.querySelectorAll(".ColorUp");
const containerInputsUp = document.querySelectorAll(".Up");

const titleUp = document.getElementById("Uptitle");
const input1Up = document.getElementById("Upinput1");
const input2Up = document.getElementById("Upinput2");
const input3Up = document.getElementById("Upinput3");
const input4Up = document.getElementById("Upinput4");
const descricaoUp = document.getElementById("Updescricao");
const selectCursoUp = document.getElementById("UpselectCurso");
const selectLanguageUp = document.getElementById("UpselectNivel");
const selectIdiomaUp = document.getElementById("UpselectIdioma");

const formUp = document.getElementById("UpformXpFormacao");

// Data
const dataInicioUp = document.getElementById("dataInicialUp");
const dataFinalUp = document.getElementById("dataFinalUp");

const placeHolder1Up = document.getElementById("Upcargo");
const placeHolder2Up = document.getElementById("Upempresa");
const placeHolder3Up = document.getElementById("Updesc");
const selectValueUp = document.getElementById("UpSelectCursoValue");
const divInput2Up = document.getElementById("UpdivInput2");
const divInput1Up = document.getElementById("UpdivInput1");
const checkBox = document.getElementById("ckeck");
const containerAllPopUpUp = document.getElementById("UpcontainerAllPopUp");

var editLanguage = document.querySelectorAll(".editLang");
var editFormacao = document.querySelectorAll(".editFormacao");

if (descUsu == null) {
    editProffile.addEventListener("click", () => {
        var id = document
            .querySelector("[data-user-id]")
            .getAttribute("data-user-id");

        selectCursoUp.style.display = "none";
        selectLanguageUp.style.display = "none";
        selectIdiomaUp.style.display = "none";

        titleUp.textContent = "Descrição Usuario";
        containerInputsUp.forEach((e) => {
            e.style.display = "none";
        });

        inputColorUpdate.forEach((e) => {
            e.style.display = "flex";
        });

        const color1 = document.getElementById("color1Up");
        const faixa1 = document.getElementById("range1");

        color1.addEventListener("input", () => {
            var corSelecionada = color1.value;
            faixa1.style.backgroundColor = corSelecionada;
        });

        const color2 = document.getElementById("color2Up");
        const faixa2 = document.getElementById("range2");

        color2.addEventListener("input", () => {
            var corSelecionada = color2.value;
            faixa2.style.backgroundColor = corSelecionada;
        });

        const color3 = document.getElementById("color3Up");
        const faixa3 = document.getElementById("range3");

        color3.addEventListener("input", () => {
            var corSelecionada = color3.value;
            faixa3.style.backgroundColor = corSelecionada;
        });

        const desc = document.getElementById("descricaoUsuario").innerHTML;
        // Placeholders
        input3Up.textContent = "Descrição do Perfil:";
        placeHolder3Up.innerHTML = desc;

        // Values
        placeHolder3Up.name = "descUsu";
        checkBox.style.display = "flex";

        checkBox.addEventListener("change", () => {
            const faixa = document.querySelectorAll(".range");
            if ($("#checkBoxInput").is(":checked")) {
                faixa.forEach((e) => {
                    window.localStorage.setItem("coior", "no");
                    e.style.display = "none";
                });
            } else {
                faixa.forEach((e) => {
                    window.localStorage.setItem("coior", "yes");
                    e.style.display = "block";
                });
            }
        });
        formUp.action = "/dashboard/portfolio/descUsu/update/" + id;

        // Disposição e vizualização
        descricaoUp.style.display = "flex";

        modal_containerUpdate.classList.add("showPop");
    });
}

editFormacao.forEach(function (button) {
    button.addEventListener("click", function () {
        const xpCard = button.closest(".card-local-word-line"); // Encontre o elemento do card

        const cargo = xpCard
            .querySelector("[data-cargo]")
            .getAttribute("data-cargo");

        var id = xpCard
            .querySelector("[data-xp-id]")
            .getAttribute("data-xp-id");

        const descricaoUP = xpCard
            .querySelector("[data-descricao]")
            .getAttribute("data-descricao");

        placeHolder1Up.value = cargo;
        placeHolder3Up.value = descricaoUP;

        if (
            xpCard.querySelector("[data-curso]").getAttribute("data-curso") ==
            "curso"
        ) {
            selectValueUp.value = "curso";
            placeHolder1Up.placeholder = "Curso";
            placeHolder3Up.placeholder = "Descrição do Curso";
            input1Up.textContent = "Curso";
            input3Up.textContent = "Descrição do Curso";
            placeHolder1Up.name = "curso";
        } else {
            selectValueUp.value = "uni";
            placeHolder1Up.placeholder = "Universidade";
            placeHolder3Up.placeholder = "Descrição da Universidade";
            input1Up.textContent = "Universidade";
            input3Up.textContent = "Descrição da Universidade";
            placeHolder1Up.name = "universidade";
        }

        inputColorUpdate.forEach((e) => {
            e.style.display = "none";
        });

        selectLanguageUp.style.display = "none";
        selectIdiomaUp.style.display = "none";

        selectCursoUp.style.display = "flex";
        selectValueUp.addEventListener("change", () => {
            if (selectValueUp.value == "curso") {
                placeHolder1Up.placeholder = "Curso";
                placeHolder3Up.placeholder = "Descrição do Curso";
                input1Up.textContent = "Curso";
                input3Up.textContent = "Descrição do Curso";
                placeHolder1Up.name = "curso";
            } else if (selectValueUp.value == "uni") {
                placeHolder1Up.placeholder = "Universidade";
                placeHolder3Up.placeholder = "Descrição da Universidade";
                input1Up.textContent = "Universidade";
                input3Up.textContent = "Descrição da Universidade";
                placeHolder1Up.name = "universidade";
            }
        });

        // Texts
        divInput2Up.style.display = "none";
        input4Up.style.display = "none";
        checkBox.style.display = "none";
        document.getElementById("colorInput1").style.display = "none";
        placeHolder3Up.name = "descUni";

        formUp.action = "/dashboard/portfolio/formacao/update/" + id;

        // Disposição e vizualização
        modal_containerUpdate.classList.add("showPop");
    });
});

editLanguage.forEach(function (button) {
    button.addEventListener("click", function () {
        const xpCard = button.closest(".card-local-word-line"); // Encontre o elemento do card

        const nivel = xpCard
            .querySelector("[data-nivel]")
            .getAttribute("data-nivel");

        const idioma = xpCard
            .querySelector("[data-idioma]")
            .getAttribute("data-idioma");

        var id = xpCard
            .querySelector("[data-xp-id]")
            .getAttribute("data-xp-id");

        var valueIdioma = document.getElementById("UpSelectIdiomaValue");
        var valueNivel = document.getElementById("UpSelectNivelValue");
        valueIdioma.value = idioma;
        valueNivel.value = nivel;

        inputColorUpdate.forEach((e) => {
            e.style.display = "none";
        });

        containerInputsUp.forEach((e) => {
            e.style.display = "none";
        });
        selectCursoUp.style.display = "none";

        // Texts
        checkBox.style.display = "none";
        document.getElementById("colorInput1").style.display = "none";
        placeHolder3Up.name = "descUni";

        formUp.action = "/dashboard/portfolio/lang/update/" + id;
        modal_containerUpdate.classList.add("showPop");
    });
});

var editButtons = document.querySelectorAll(".edit");
editButtons.forEach(function (button) {
    button.addEventListener("click", function () {
        const xpCard = button.closest(".card-local-word-line"); // Encontre o elemento do card

        const cargo = xpCard
            .querySelector("[data-cargo]")
            .getAttribute("data-cargo");

        const empresa = xpCard
            .querySelector("[data-empresa]")
            .getAttribute("data-empresa");
        const inicio = xpCard
            .querySelector("[data-inicio]")
            .getAttribute("data-inicio");
        const fim = xpCard.querySelector("[data-fim]").getAttribute("data-fim");
        const descricaoUP = xpCard
            .querySelector("[data-descricao]")
            .getAttribute("data-descricao");

        var id = xpCard
            .querySelector("[data-xp-id]")
            .getAttribute("data-xp-id");

        placeHolder1Up.value = cargo;
        placeHolder2Up.value = empresa;
        placeHolder3Up.value = descricaoUP;
        dataInicioUp.value = inicio;
        dataFinalUp.value = fim;

        inputColorUpdate.forEach((e) => {
            e.style.display = "none";
        });

        // Texts
        titleUp.textContent = "Experiência";
        input1Up.textContent = "Cargo";
        input2Up.textContent = "Empresa";
        input3Up.textContent = "Descrição Experiência";
        input4Up.style.display = "flex";
        selectCursoUp.style.display = "none";
        selectLanguageUp.style.display = "none";
        selectIdiomaUp.style.display = "none";
        document.getElementById("colorInput1").style.display = "none";

        // Placeholders
        placeHolder1Up.placeholder = "Cargo";
        placeHolder2Up.placeholder = "Empresa";
        placeHolder3Up.placeholder = "Descrição da sua Experiência";

        // Values
        placeHolder1Up.name = "cargo";
        placeHolder2Up.name = "empresa";
        placeHolder3Up.name = "desc";

        formUp.action = "/dashboard/portfolio/xp/update/" + id;

        // Disposição e vizualização
        descricao.style.display = "flex";
        checkBox.style.display = "none";
        divInput2Up.style.display = "flex";
        divInput1Up.style.display = "flex";
        modal_containerUpdate.classList.add("showPop");
    });
});

if (editProffile == null) {
    descUsu.addEventListener("click", () => {
        title.textContent = "Descrição Usuario";
        containerInputs.forEach((e) => {
            e.style.display = "none";
        });

        // Placeholders
        input3.textContent = "Descrição:";
        placeHolder3.placeholder = "Descrição do seu Perfil";

        // Values
        placeHolder3.name = "descUsu";
        form.action = "/dashboard/portfolio/descUsu";
        selectLanguageUp.style.display = "none";
        selectIdiomaUp.style.display = "none";

        // Disposição e vizualização
        descricao.style.display = "flex";
        modal_container.classList.add("showPop");
    });
}

const cpfPopUp = document.getElementById("makeProf");
const btnClose = document.getElementById("fecharBotaoCPF");
const inputCpf = document.getElementById("CpfInput");

function formatarDocumento(documento) {
    documento = documento.replace(/\D/g, "");

    if (documento.length === 11) {
        // Formata CPF: XXX.XXX.XXX-XX
        return documento.replace(/(\d{3})(\d{3})(\d{3})(\d{2})/, "$1.$2.$3-$4");
    } else if (documento.length === 14) {
        // Formata CNPJ: XX.XXX.XXX/XXXX-XX
        return documento.replace(
            /(\d{2})(\d{3})(\d{3})(\d{4})(\d{2})/,
            "$1.$2.$3/$4-$5"
        );
    } else {
        // Retorna o documento sem formatação
        return documento;
    }
}

function formatarInputDocumento() {
    var inputDocumento = document.getElementById("inCPF");
    var documentoFormatado = formatarDocumento(inputDocumento.value);
    inputDocumento.value = documentoFormatado;
}

const editbtnSobre = document.getElementById("editbtnSobre");
const textSobre = document.getElementById("outSobre");
const inputSobre = document.getElementById("inSobre");
const btnMakeProf = document.getElementById("btnMakeProf");
const textCpfSobre = document.getElementById("textCpfSobre");

if (btnCpf != null) {
    btnCpf.addEventListener("click", () => {
        cpfPopUp.classList.add("showPop");
        inputCpf.style.display = "flex";
        textCpfSobre.textContent =
            "Insira o seu CPF ou CNPJ para se tornar um profissional, e insira uma breve informação sobre você.";
        btnMakeProf.textContent = "Se torne um Profissional";
    });
}

btnClose.addEventListener("click", () => {
    cpfPopUp.classList.remove("showPop");
});

editbtnSobre.addEventListener("click", () => {
    cpfPopUp.classList.add("showPop");
    inputSobre.textContent = textSobre.textContent;
    textCpfSobre.textContent =
        "Atualize e insira uma breve informação sobre você.";

    btnMakeProf.textContent = "Salvar";
    inputCpf.style.display = "none";
});

function toggleCustomDropdown() {
    var dropdown = document.getElementById("myCustomDropdown");
    dropdown.style.display =
        dropdown.style.display === "block" ? "none" : "block";
}

// Fechar o dropdown se o usuário clicar fora dele
window.onclick = function (event) {
    if (!event.target.matches(".custom-dropdown button")) {
        var dropdowns = document.getElementsByClassName(
            "custom-dropdown-content"
        );
        for (var i = 0; i < dropdowns.length; i++) {
            var openDropdown = dropdowns[i];
            if (openDropdown.style.display === "block") {
                openDropdown.style.display = "none";
            }
        }
    }
};
