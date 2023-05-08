<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create an account</title>
    <style>
        #passwdErr, #emailErr {
            color: red;
        }
        div {
            margin-bottom: 15px;
        }
    </style>
</head>
<body>
<?php
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
    $email = $passwd = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        $email = test_input($email);
        $passwd = test_input($passwd);
    }

    function test_input($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    if (!empty($_POST["email"]))
    {
        $email = test_input($_POST["email"]);
    }
    
    if (!empty($_POST["passwd"]))
    {
        $passwd = test_input($_POST["passwd"]);
    }
    
    $servername = "localhost";
    $username = "root";
    $password = "";
    $db = "users";
    $conn = new mysqli($servername, $username, $password, $db);

    if ($conn->connect_error)
    {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "INSERT INTO MyGuests (email, passwd)
    VALUES ('oui@hotmail.fr', '$passwd')";

    $conn->query($sql);

    $conn->close();
?>

    <script src="register_validation.js"></script>
    <h1>Create an account</h1>
    <form id="registerForm" action="register.php" method="post">
        <div>
            <label for="email">Email address:</label><br>
            <input type="email" id="email" name="email" placeholder="Enter your email address" required>
            <span id="emailErr"></span><br>
        </div>
        <div>
            <label for="passwd">Password:</label><br>
            <input type="password" id="passwd" name="passwd" placeholder="Enter your password">
            <span id="passwdErr"></span><br>
        </div>
        <button type="button" onclick="validateInput()">Register</button>
    </form>
</body>
</html>