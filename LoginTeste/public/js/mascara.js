$(document).ready(function () {
    $("#inCep").on("blur", function () {
        var cep = $(this).val();

        $.ajax({
            url: "https://viacep.com.br/ws/" + cep + "/json/",
            type: "GET",
            dataType: "json",
            success: function (response) {
                $("#inCidade").val(response.localidade);
                $("#inBairro").val(response.bairro);
                $("#inRua").val(response.logradouro);
            },
        });
    });
});

function formatarCEP(input) {
    var cep = input.value.replace(/\D/g, "");

    if (cep.length === 8) {
        cep = cep.substring(0, 5) + "-" + cep.substring(5);
    }

    input.value = cep;
}

var form = document.getElementById("formRegister");

form.addEventListener("submit", function () {
    var inputCep = document.getElementById("inCep");
    var cep = inputCep.value.replace(/\D/g, "");

    inputCepcep.value = cep;
});

function formatarTelefone(telefone) {
    telefone = telefone.replace(/\D/g, "");
    if (telefone.length === 11) {
        return telefone.replace(/(\d{2})(\d{5})(\d{4})/, "($1) $2-$3");
    } else {
        return telefone;
    }
}

function formatarInputTelefone() {
    var inputTelefone = document.getElementById("inCelTel");
    var telefoneFormatado = formatarTelefone(inputTelefone.value);
    inputTelefone.value = telefoneFormatado;
}

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
