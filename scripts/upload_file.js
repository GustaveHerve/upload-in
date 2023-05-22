//Modal windows inspired by w3 tutorial: https://www.w3schools.com/howto/howto_css_modals.asp

let uploadmodal = document.getElementById("upload-file-modal");

window.onclick = function(event) {
    if (event.target == uploadmodal)
        uploadmodal.style.display = "none";
}

function uploadFile() {
    uploadmodal.style.display = "block";
}

function closeUploadModal() {
    uploadmodal.style.display = "none";
}