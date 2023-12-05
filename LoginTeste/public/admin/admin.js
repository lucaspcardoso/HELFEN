var dropdown = document.getElementById("dropdown");
dropdown.addEventListener("click", function () {
    var submenu = document.getElementById("submenu1");

    submenu.classList.toggle("open");
});

var dropdown2 = document.getElementById("drop2");
dropdown2.addEventListener("click", function () {
    var submenu2 = document.getElementById("submenu2");

    submenu2.classList.toggle("open");
});

var inputs = document.querySelectorAll("div.ContainerFormFilter input");
var select = document.getElementById("position");

if (select !== null) {
    select.disabled = true;
}

inputs.forEach((item) => {
    item.disabled = true;
});

var filter = document.getElementById("filter");
filter.addEventListener("click", function () {
    var filtro = document.getElementById("ContainerFormFilter");
    var inputs = document.querySelectorAll("div.ContainerFormFilter input");

    inputs.forEach((item) => {
        item.disabled = false;
    });

    if (select !== null) {
        select.disabled = false;
    }

    filtro.classList.toggle("openFilter");
});

const containerBlocks = document.querySelectorAll(".containerTableTop");
const search = document.getElementById("search");

search.addEventListener("input", function () {
    const searchTerm = search.value.toLowerCase();

    containerBlocks.forEach(function (block, index) {
        if (index === 0) {
            return; // Ignora o primeiro elemento (tabela de cabeçalho)
        }

        const idElement = block.querySelector("div:first-child");

        const idText = idElement.textContent.toLowerCase();

        if (idText.includes(searchTerm)) {
            block.style.display = "flex";
        } else {
            block.style.display = "none";
        }
    });
});

const nome = document.getElementById("name");

nome.addEventListener("input", function () {
    const searchTerm = nome.value.toLowerCase();

    containerBlocks.forEach(function (block, index) {
        if (index === 0) {
            return; // Ignora o primeiro elemento (tabela de cabeçalho)
        }

        const idElement = block.querySelector("div:nth-child(2)");
        const idText = idElement.textContent.toLowerCase();

        if (idText.includes(searchTerm)) {
            block.style.display = "flex";
        } else {
            block.style.display = "none";
        }
    });
});

const positionSelect = document.getElementById("position");

positionSelect.addEventListener("change", function () {
    const selectedValue = positionSelect.value.toLowerCase();

    containerBlocks.forEach(function (block, index) {
        if (index === 0) {
            return; // Ignora o primeiro elemento (tabela de cabeçalho)
        }

        const positionElement = block.querySelector(
            ".containerTableFirtBlock div:nth-child(3)"
        ); // Seleciona a terceira div dentro do bloco (Cargo)
        const positionText = positionElement.textContent.toLowerCase();

        if (selectedValue === "todos" || positionText === selectedValue) {
            block.style.display = "flex";
        } else {
            block.style.display = "none";
        }
    });
});
