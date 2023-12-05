// Delete
const popUpDelete = document.getElementById("popUpDelete");
const DeleteformXpFormacao = document.getElementById("DeleteformXpFormacao");
const closeDelete = document.getElementById("closeDelete");

var deleteXp = document.querySelectorAll(".delete");
deleteXp.forEach((button) => {
    button.addEventListener("click", () => {
        const xpCard = button.closest(".card-local-word-line");
        var id = xpCard
            .querySelector("[data-xp-id]")
            .getAttribute("data-xp-id");
        DeleteformXpFormacao.action = "/dashboard/portfolio/xp/delete/" + id;
        popUpDelete.classList.add("showPop");
    });
});

var deleteLang = document.querySelectorAll(".deleteLang");
deleteLang.forEach((button) => {
    button.addEventListener("click", () => {
        const xpCard = button.closest(".card-local-word-line");
        var id = xpCard
            .querySelector("[data-xp-id]")
            .getAttribute("data-xp-id");
        DeleteformXpFormacao.action = "/dashboard/portfolio/lang/delete/" + id;
        popUpDelete.classList.add("showPop");
    });
});

var deleteFormacao = document.querySelectorAll(".deleteFormacao");
deleteFormacao.forEach((button) => {
    button.addEventListener("click", () => {
        const xpCard = button.closest(".card-local-word-line");
        var id = xpCard
            .querySelector("[data-xp-id]")
            .getAttribute("data-xp-id");
        DeleteformXpFormacao.action =
            "/dashboard/portfolio/formacao/delete/" + id;
        popUpDelete.classList.add("showPop");
    });
});

var deleteWork = document.querySelectorAll(".deleteWork");
deleteWork.forEach((button) => {
    button.addEventListener("click", () => {
        const xpCard = button.closest(".content-user");
        var id = xpCard
            .querySelector("[data-work-id]")
            .getAttribute("data-work-id");
        DeleteformXpFormacao.action = "/dashboard/add-service/delete/" + id;
        popUpDelete.classList.add("showPop");
    });
});

closeDelete.addEventListener("click", () => {
    popUpDelete.classList.remove("showPop");
});
