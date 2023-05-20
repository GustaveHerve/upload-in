<?php
function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

//Checks if user is already registered
function user_alreadyexists($sqli, $email)
{
    $query = "SELECT * FROM MyGuests
    WHERE email='$email'";

    $res = $sqli->query($query);
    return $res->num_rows != 0;
}

//Checks if user exists and his password is correct. Returns false if either user doesn't exist or wrong password.
function check_login($sqli, $email, $passwd)
{
    $query = "SELECT * FROM MyGuests
    WHERE email='$email'";

    $res = $sqli->query($query);
    return $res->num_rows != 0 && $res->fetch_column(2) == $passwd;
}
?>