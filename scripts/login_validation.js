function validateInput()
{
    let emailInput = document.getElementById("email").value;
    let passwdInput = document.getElementById("passwd").value;
    var isValid = true;
    if (emailInput == "")
    {
        isValid = false;
        displayErr("emailErr", "Please enter your email address");
        document.getElementById("email").style.borderColor = "red";
    }
    else
        clearErr("emailErr");
    if (passwdInput == "")
    {
        isValid = false;
        displayErr("passwdErr", "Please enter your password");
        document.getElementById("passwd").style.borderColor = "red";
    }
    else
        clearErr("passwdErr");

    return isValid;
}

function displayErr(id, message)
{
    let element = document.getElementById(id);
    element.innerText = message;
}

function clearErr(id)
{
    document.getElementById(id).innerText = "";
}