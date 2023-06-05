<?php
session_start();
if (isset($_SESSION["user"]))
{
    header('Location: userspace.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="styles/form.css">
</head>
<body>
<?php
    require 'formvalidation.php';

    $accountErr = "";
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        $email = $passwd = "";
        if (!empty($_POST["email"]))
            $email = test_input($_POST["email"]);

        if (!empty($_POST["passwd"]))
            $passwd = test_input($_POST["passwd"]);

        $conn = new mysqli("localhost", "root", "", "users");

        if ($conn->connect_error)
            die("Connection failed: " . $conn->connect_error);

        if (!check_login($conn, $email, $passwd))
            $accountErr = "No account with this email/password combination were found";
        else
        {
            $query = "SELECT * FROM User
            WHERE email='$email'";
            $res = $conn->query($query);

            $_SESSION['user'] = $email;
            $_SESSION['userID'] = $res->fetch_column();
            $conn->close();
            header('Location: userspace.php');
            exit();
        }

        $conn->close();
    }
?>

    <script src="scripts/login_validation.js"></script>
    <header>
        <h1><a href=index.php>Upload'<span style="color: rgb(98, 109, 227);">in</span></a></h1>
    </header>
    <div class="formbox">
        <h1>Login</h1>
        <form id="loginForm" action="login.php" method="post" onsubmit="return validateInput();">
            <div>
                <label for="email">Email address:</label><br>
                <input type="email" id="email" name="email" placeholder="Enter your email address" <?php if (isset($_POST['email'])) echo 'value="'.$_POST['email'].'"'; ?>)>
                <span id="emailErr"><?php echo $accountErr ?></span><br>
            </div>
            <div>
                <label for="passwd">Password:</label><br>
                <input type="password" id="passwd" name="passwd" placeholder="Enter your password">
                <span id="passwdErr"></span><br>
            </div>
            <div class="buttons">
                <button type="submit">Login</button>
            </div>
        </form>
    </div>
</body>
</html>