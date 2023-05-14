function validateInput()
{
    let emailInput = document.getElementById("email").value;
    let passwdInput = document.getElementById("passwd").value;
    var isValid = true;
    if (emailInput == "")
    {
        isValid = false;
        displayErr("emailErr", "Please enter your email address");
    }
    else
        clearErr("emailErr");
    if (passwdInput == "")
    {
        isValid = false;
        displayErr("passwdErr", "Please enter your password");
    }
    else
        clearErr("passwdErr");

    if (isValid)
        document.getElementById("loginForm").submit();
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