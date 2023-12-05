const botao = document.getElementById("back");

botao.addEventListener("click", function () {
    window.location.href = "/user/profile";
});


const edit = "https://res.cloudinary.com/duirjecnu/image/upload/v1699453992/aqrbbtskxvvuweha3mx0.png";
const invalida = "http://127.0.0.1:8000/admin/imgs/imgInvalida.png";

const fileInput1 = document.getElementById("inputPhoto");
const imagePreview1 = document.getElementById("photo1");

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
            imagePreview1.src = edit;
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
