<?php
function connectDB($server, $username, $password, $db)
{
    $sqli= new mysqli($server, $username, $password, $db);

    if ($sqli->connect_error)
        die("Connection failed: " . $sqli->connect_error);

    return $sqli;
}

function addUser($sqli, $email, $passwd)
{
    $query = "INSERT INTO MyGuests (email, passwd)
    VALUES ('$email', '$passwd')";

    $sqli->query($query);
    $query = "SELECT id FROM MyGuests
    WHERE email = '$email'";
    $id = $sqli->query($query);
    return $id->fetch_column();
}
?>