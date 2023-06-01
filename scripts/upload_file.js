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

/*
//Drag and drop file handler inspired by Mozilla MDN Documentation
//https://developer.mozilla.org/en-US/docs/Web/API/HTML_Drag_and_Drop_API/File_drag_and_drop

function dragOverHandler(e) {
    e.preventDefault();
}

function dropHandler(e) {
    e.preventDefault();

    if (e.dataTransfer.items){
        [...e.dataTransfer.items].forEach((item, i)=> {
            if (item.kind == "file") {
                const file = item.getAsFile();
                console.log(file.name);
            }
        });
    }
    else {
        [...e.dataTransfer.files].forEach((file, i) => {
            console.log(file.name);
        })
    }
}
*/