//Modal windows inspired by w3 tutorial: https://www.w3schools.com/howto/howto_css_modals.asp

let modal = document.getElementById("delete-file-modal");
let prompt = document.getElementById("prompt");
let invisibleInput = document.getElementById("invisibleinput");

window.onclick = function(event) {
    if (event.target == modal)
        modal.style.display = "none";
}

function deleteFile(fileToDelete) {
    var fileNode = fileToDelete.parentNode.parentNode;
    var fileName = fileNode.firstChild.firstChild.innerText;
    prompt.innerText = "Are you sure you want to delete " + fileName + "?";
    invisibleInput.value = fileName;
    modal.style.display = "block";
}

function closeModal() {
    modal.style.display = "none";
}