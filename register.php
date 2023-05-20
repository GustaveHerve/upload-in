<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create an account</title>
    <link rel="stylesheet" href="styles/form.css">
</head>
<body>
<?php
    require 'formvalidation.php';
    require 'sql.php';
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
    $email = $passwd = $accountErr = "";
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        if (!empty($_POST["email"]))
            $email = test_input($_POST["email"]);
        
        if (!empty($_POST["passwd"]))
            $passwd = test_input($_POST["passwd"]);
        
        $conn = new mysqli("localhost", "root", "", "users");

        if ($conn->connect_error)
            die("Connection failed: " . $conn->connect_error);
        if (!user_alreadyexists($conn, $email))
            addUser($conn, $email, $passwd);
        else
            $accountErr = "This email is associated to an existing account.";

        $conn->close();
    }
?>

    <script src="scripts/register_validation.js"></script>
    <header>
        <h1><a href=index.php>Upload'<span style="color: rgb(98, 109, 227);">in</span></a></h1>
    </header>
    <div class="formbox">
        <h1>Create an account</h1>
        <form id="registerForm" action="register.php" method="post" onsubmit="return validateInput();">
            <div>
                <label for="email">Email address:</label><br>
                <input type="email" id="email" name="email" placeholder="Enter your email address" required>
                <span id="emailErr"><?php echo $accountErr ?></span><br>
            </div>
            <div>
                <label for="passwd">Password:</label><br>
                <input type="password" id="passwd" name="passwd" placeholder="Enter your password">
                <span id="passwdErr"></span><br>
            </div>
            <div class="buttons">
                <button type="submit">Register</button>
            </div>
        </form>
    </div>
</body>
</html>