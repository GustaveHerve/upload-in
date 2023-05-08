<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create an account</title>
    <style>
        form label, form input, form button {
            display: block;
        }
        .error {
            color: red;
        }
    </style>
</head>
<body>
<?php
    $email = $passwd = "";
    $emailErr = $passwdErr = "";

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

    if (empty($_POST["email"]))
    {
        $nameErr = "Email is required";
    }
    else
    {
        $name = test_input($_POST["name"]);
    }
    
    if (empty($_POST["passwd"]))
    {
        $passwdErr = "Password is required";
    }
    else
    {
        $passwd = test_input($_POST["passwd"]);
    }
?>

    <h1>Create an account</h1>
    <form action="register.php" method="post">
        <label for="email">Email address:</label>
        <input type="email" id="email" name="email" placeholder="Enter your email address" required>
        <span class="error">* <?php echo $emailErr;?></span>
        <label for="passwd">Password:</label>
        <input type="password" id="passwd" name="passwd" placeholder="Enter your password">
        <span class="error">* <?php echo $passwdErr;?></span>
        <button name="submit" value="Submit" type="submit">Register</button>
    </form>
</body>
</html>