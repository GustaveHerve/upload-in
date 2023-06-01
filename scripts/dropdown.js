var drop = document.getElementById("profil-dropdown");

function toggleDropdown() {
    if (drop.style.display == "block")
    {
        drop.style.display = "none";
        drop.style.zIndex = "0";
    }
    else
    {
        drop.style.zIndex = "1";
        drop.style.display = "block";
    }
}