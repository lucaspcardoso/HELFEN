const select = document.getElementById("typeService");
const selectCategoria = document.getElementById("category");
const selectSubCategoria = document.getElementById("subCategory");

const optionCategoria = document.querySelector(".optionCat");
const options = document.querySelectorAll(".optionSubCat");

selectCategoria.addEventListener("change", () => {
    const selectedCategoryName = selectCategoria.value;

    options.forEach((option) => {
        const categoryName = option
            .querySelector("[data-category-id]")
            .getAttribute("data-category-id");

        if (categoryName === selectedCategoryName) {
            option.style.display = "flex";
        } else {
            option.style.display = "none";
        }
    });
});

const inputsExtras = document.getElementById("inputsEndereço");
const rua = document.getElementById("rua");
const bairro = document.getElementById("bairro");
const numero = document.getElementById("numero");

rua.disabled = true;
bairro.disabled = true;
numero.disabled = true;

if (select.value === "local") {
    inputsExtras.style.opacity = "1";
    rua.disabled = false;
    bairro.disabled = false;
    numero.disabled = false;
} else {
    inputsExtras.style.opacity = "0";
    rua.disabled = true;
    bairro.disabled = true;
    numero.disabled = true;
}

select.addEventListener("change", function () {
    if (select.value === "local") {
        inputsExtras.style.opacity = "1";
        rua.disabled = false;
        bairro.disabled = false;
        numero.disabled = false;
    } else {
        inputsExtras.style.opacity = "0";
        rua.disabled = true;
        bairro.disabled = true;
        numero.disabled = true;
    }
});

// Adicione este código no seu arquivo JavaScript
const overlay = document.querySelectorAll(".overlay");
const icon = document.querySelectorAll(".icon");

const nSelecionada = "http://127.0.0.1:8000/admin/imgs/imgNSelecionada.png";
const invalida = "http://127.0.0.1:8000/admin/imgs/imgInvalida.png";

const fileInput1 = document.getElementById("img1");
const imagePreview1 = document.getElementById("photo1");

const fileInput2 = document.getElementById("img2");
const imagePreview2 = document.getElementById("photo2");
const container2 = document.getElementById("container2");

const fileInput3 = document.getElementById("img3");
const imagePreview3 = document.getElementById("photo3");
const container3 = document.getElementById("container3");

const btnAdd = document.getElementById("btnAdd");
const btnLimpar = document.getElementById("btnClear");

fileInput2.disabled = true;
fileInput2.style.cursor = "default";
fileInput3.disabled = true;
fileInput3.style.cursor = "default";

fileInput1.addEventListener("change", function () {
    const selectedFile = fileInput1.files[0];

    if (selectedFile && selectedFile.type.startsWith("image/")) {
        const reader = new FileReader();

        reader.onload = function (e) {
            imagePreview1.src = e.target.result;
        };

        reader.readAsDataURL(selectedFile);

        containerImg1.addEventListener("mouseenter", () => {
            overlay[0].style.opacity = 1;
            icon[0].style.opacity = 1;
        });

        containerImg1.addEventListener("mouseleave", () => {
            overlay[0].style.opacity = 0;
            icon[0].style.opacity = 0;
        });

        overlay[0].addEventListener("click", () => {
            // Adicione sua lógica para excluir a imagem aqui
            imagePreview1.src = nSelecionada;
            overlay[0].style.opacity = 0;
            icon[0].style.opacity = 0;
        });

        btnAdd.addEventListener("click", function () {
            container2.style.display = "flex";
            fileInput2.disabled = false;
        });
    } else {
        imagePreview1.src = invalida;
        overlay[0].style.opacity = 0;
        icon[0].style.opacity = 0;
    }
});

fileInput2.addEventListener("change", function () {
    const selectedFile2 = fileInput2.files[0];

    if (selectedFile2 && selectedFile2.type.startsWith("image/")) {
        const reader = new FileReader();

        reader.onload = function (e) {
            imagePreview2.src = e.target.result;
        };

        reader.readAsDataURL(selectedFile2);

        containerImg2.addEventListener("mouseenter", () => {
            overlay[1].style.opacity = 1;
            icon[1].style.opacity = 1;
        });

        containerImg2.addEventListener("mouseleave", () => {
            overlay[1].style.opacity = 0;
            icon[1].style.opacity = 0;
        });

        overlay[1].addEventListener("click", () => {
            // Adicione sua lógica para excluir a imagem aqui
            imagePreview2.src = nSelecionada;
            overlay[1].style.opacity = 0;
            icon[1].style.opacity = 0;
        });

        btnAdd.style.display = "none";
        container3.style.display = "flex";
        fileInput3.disabled = false;
    } else {
        imagePreview2.src = invalida;
        overlay[1].style.opacity = 0;
        icon[1].style.opacity = 0;
    }
});

fileInput3.addEventListener("change", function () {
    const selectedFile3 = fileInput3.files[0];

    if (selectedFile3 && selectedFile3.type.startsWith("image/")) {
        const reader = new FileReader();

        reader.onload = function (e) {
            imagePreview3.src = e.target.result;
        };

        reader.readAsDataURL(selectedFile3);

        containerImg3.addEventListener("mouseenter", () => {
            overlay[2].style.opacity = 1;
            icon[2].style.opacity = 1;
        });

        containerImg3.addEventListener("mouseleave", () => {
            overlay[2].style.opacity = 0;
            icon[2].style.opacity = 0;
        });

        overlay[2].addEventListener("click", () => {
            // Adicione sua lógica para excluir a imagem aqui
            imagePreview3.src = nSelecionada;
            overlay[2].style.opacity = 0;
            icon[2].style.opacity = 0;
        });
    } else {
        imagePreview3.src = invalida;
        overlay[2].style.opacity = 0;
        icon[2].style.opacity = 0;
    }
});

btnLimpar.addEventListener("click", function () {
    imagePreview1.src = nSelecionada;
    imagePreview2.src = nSelecionada;
    imagePreview3.src = nSelecionada;
    btnAdd.style.display = "flex";

    fileInput2.disabled = true;
    fileInput3.disabled = true;
    container2.style.display = "none";
    container3.style.display = "none";
});

// Jquery Dependency

$("input[data-type='currency']").on({
    keyup: function () {
        formatCurrency($(this));
    },
    blur: function () {
        formatCurrency($(this), "blur");
    },
});

function formatNumber(n) {
    // format number 1000000 to 1,234,567
    return n.replace(/\D/g, "").replace(/\B(?=(\d{3})+(?!\d))/g, ",");
}

function formatCurrency(input, blur) {
    // appends $ to value, validates decimal side
    // and puts cursor back in right position.

    // get input value
    var input_val = input.val();

    // don't validate empty input
    if (input_val === "") {
        return;
    }

    // original length
    var original_len = input_val.length;

    // initial caret position
    var caret_pos = input.prop("selectionStart");

    // check for decimal
    if (input_val.indexOf(".") >= 0) {
        // get position of first decimal
        // this prevents multiple decimals from
        // being entered
        var decimal_pos = input_val.indexOf(".");

        // split number by decimal point
        var left_side = input_val.substring(0, decimal_pos);
        var right_side = input_val.substring(decimal_pos);

        // add commas to left side of number
        left_side = formatNumber(left_side);

        // validate right side
        right_side = formatNumber(right_side);

        // On blur make sure 2 numbers after decimal
        if (blur === "blur") {
            right_side += "00";
        }

        // Limit decimal to only 2 digits
        right_side = right_side.substring(0, 2);

        // join number by .
        input_val = "$" + left_side + "." + right_side;
    } else {
        // no decimal entered
        // add commas to number
        // remove all non-digits
        input_val = formatNumber(input_val);
        input_val = "$" + input_val;

        // final formatting
        if (blur === "blur") {
            input_val += ".00";
        }
    }

    // send updated string to input
    input.val(input_val);

    // put caret back in the right position
    var updated_len = input_val.length;
    caret_pos = updated_len - original_len + caret_pos;
    input[0].setSelectionRange(caret_pos, caret_pos);
}
