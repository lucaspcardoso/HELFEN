function menuResponsivo() {
    var menu = document.getElementById("menu");
    menu.classList.add("animacao");

    var btnHam = document.getElementById("btn-burger");
    var sumirPalavras = document.querySelectorAll(".text-menu");
    var realocarImgs = document.querySelectorAll(".icon-menu");
    var logo = document.getElementById("logo");
    var containLogo = document.getElementById("contain-img");
    // var scroll = document.getElementById("scroll");

    containLogo.classList.add("img-contain-resp");
    logo.classList.add("icon-resp");
    // scroll.classList.add("margin-left");
    sumirPalavras.forEach((item) => {
        item.classList.add("none");
    });

    realocarImgs.forEach((item) => {
        item.classList.add("realoc-img");
    });

    btnHam.addEventListener("click", function () {
        if (menu.classList.contains("animacao")) {
            menu.classList.toggle("animacao");
            sumirPalavras.forEach((item) => {
                item.classList.remove("none");
            });
            realocarImgs.forEach((item) => {
                item.classList.remove("realoc-img");
            });
            logo.classList.remove("icon-resp");
            containLogo.classList.remove("img-contain-resp");
            // scroll.classList.remove("margin-left");
        } else {
            menu.classList.add("animacao");
            sumirPalavras.forEach((item) => {
                item.classList.add("none");
            });
            realocarImgs.forEach((item) => {
                item.classList.add("realoc-img");
            });
            logo.classList.add("icon-resp");
            containLogo.classList.add("img-contain-resp");
            scroll.classList.add("margin-left");
        }
    });
}

var btnHam = document.getElementById("btn-burger");
btnHam.addEventListener("click", menuResponsivo);
