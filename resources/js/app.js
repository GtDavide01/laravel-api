import "./bootstrap";
import "~resources/scss/app.scss";
import * as bootstrap from "bootstrap";
import.meta.glob(["../img/**"]);

// Gestione della preview delle immagini caricate
const imageInput = document.getElementById("image");
const imagePreview = document.getElementById("image_preview");

if (imageInput && imagePreview) {
    imageInput.addEventListener("change", function () {
        const uploadedFile = this.files[0];
        if (uploadedFile) {
            const reader = new FileReader();
            reader.addEventListener("load", function () {
                imagePreview.src = reader.result;
            });
            reader.readAsDataURL(uploadedFile);
        }
    });
}
