// Adicione este código no seu arquivo JavaScript
const fileInput = document.getElementById("imagem");
const imagePreview = document.getElementById("imagePreview");
const btnLimpar = document.getElementById("btnClear");

const nSelecionada = "http://127.0.0.1:8000/admin/imgs/imgNSelecionada.png";
const invalida = "http://127.0.0.1:8000/admin/imgs/imgInvalida.png";

fileInput.addEventListener("change", function () {
    const selectedFile = fileInput.files[0];

    if (selectedFile && selectedFile.type.startsWith("image/")) {
        const reader = new FileReader();

        reader.onload = function (e) {
            imagePreview.src = e.target.result;
        };

        reader.readAsDataURL(selectedFile);

        btnLimpar.addEventListener("click", function () {
            imagePreview.src = nSelecionada;
        });
    } else {
        // Limpar a área de visualização se o arquivo não for uma imagem válida
        imagePreview.src = invalida;
    }
});
