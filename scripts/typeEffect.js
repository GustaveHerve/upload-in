//Typewriter effect inspired by this w3 schools tutorial : https://www.w3schools.com/howto/howto_js_typewriter.asp
const arr = 
        ["files", "memories", "photos", "documents", "videos", "work",
         "homework", "drawings", "papers", "essays", "artworks", "texts",
         "presentations", "projects", "pictures"];

var i = 0
var word = arr[Math.floor(Math.random() * arr.length)];
var lastword = word;
const speed = 70;

setInterval(cursorBlink, 500);
typingCycle();

function typingEffect() {
    if (i < word.length) {
        document.getElementById("catchphrase").innerText += word.charAt(i);
        i++;
        setTimeout(typingEffect, speed);
    }
    else
        setTimeout(deleteEffect, 2000);
}

function deleteEffect() {
    let e = document.getElementById("catchphrase");
    if (e.innerHTML.length > 0) {
        e.innerHTML = e.innerHTML.slice(0, -1);
        setTimeout(deleteEffect, speed);
    }
    else
        setTimeout(typingCycle, 50);
}

function typingCycle() {
    i = 0;
    while (word == lastword)
        word = arr[Math.floor(Math.random() * arr.length)];
    lastword = word;

    typingEffect();
}

function cursorBlink() {
    let cursor = document.getElementById("cursor");
    /*
    if (cursor.innerText.length != 0)
        cursor.innerText = "";
    else
        cursor.innerText = "_";
        */
    if (cursor.style.color != "rgb(246, 246, 246)")
        cursor.style.color = "rgb(246, 246, 246)";
    else
        cursor.style.color = "#626DE3";
}