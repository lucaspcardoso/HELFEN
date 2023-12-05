function myFunction() {
    document.getElementById("myDropdown").classList.toggle("show");
}

function toggleButton() {
    var btn = document.querySelector(".toggle-btn");
    btn.classList.toggle("active");

    if (btn.classList.contains("active")) {
        var popupOverlay = document.getElementById("popupOverlay");
        popupOverlay.style.display = "flex";
    } else {
        var popupOverlay = document.getElementById("popupOverlay");

        popupOverlay.style.display = "flex";
    }

    if (!btn.classList.contains("active")) {
        const form = document.getElementById("formProfMake");
        const title = document.getElementById("text-warning");
        title.textContent = "Virar Usuário";
        const textCpfSobre = document.getElementById("textCpfSobre");
        textCpfSobre.innerHTML = "Você tem certeza que quer virar usuário?";
        const inputProf = document.querySelectorAll(".inputProf");
        inputProf.forEach((e) => {
            e.disabled = true;
            e.style.display = "none";
        });

        var id = document.querySelector("[data-id]").getAttribute("data-id");

        const btnVirar = document.getElementById("btnConfirmar");
        btnVirar.innerHTML = "Se torne Usuário";

        form.action = "/make/" + id + "/user";
    }
}

function cancelAction() {
    var popupOverlay = document.getElementById("popupOverlay");
    var toggle = document.querySelector(".toggle-btn");

    if (toggle.classList.contains("active")) {
        toggle.classList.remove("active");
        popupOverlay.style.display = "none";
    } else {
        toggle.classList.add("active");
        popupOverlay.style.display = "none";
    }
}

var btnLogoutSession = document.getElementById("btnLogoutSession");
btnLogoutSession.addEventListener("click", function () {
    var popup = document.getElementById("popup");
    popup.classList.add("showSession");
});

var btnFechar = document.getElementById("btnCancelar");
btnFechar.addEventListener("click", function () {
    var popup = document.getElementById("popup");
    popup.classList.remove("showSession");
});

// RESPONSIVO MENU
