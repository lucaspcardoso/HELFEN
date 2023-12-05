

function showMenu() {
    var menuTop = document.getElementById("menuMoba");
    menuTop.classList.toggle("show-menu");
    var bloco = document.getElementById("blocoOculto");
    bloco.classList.toggle("show-block");
}

function closeMenu() {
    if (document.getElementById("menuMoba").classList.contains("show-menu")) {
        document.getElementById("menuMoba").classList.remove("show-menu");
        document.getElementById("blocoOculto").classList.remove("show-block");
    }
}
