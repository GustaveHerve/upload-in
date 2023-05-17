<?php
session_start();
if (isset($_SESSION["user"]))
    header('Location: userspace.php');
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
    error_reporting(E_ALL);
    ini_set('display_errors', 1);

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

        $sql = "SELECT * FROM MyGuests
        WHERE email='$email'";

        $res = $conn->query($sql);
        if (!check_login($conn, $email, $passwd))
            $accountErr = "No account with this email/password combination were found";
        else
        {
            $_SESSION['user'] = $email;
            $conn->close();
            header('Location: userspace.php');
            exit();
        }

        $conn->close();
    }
?>

    <script src="scripts/login_validation.js"></script>
    <header>
        <h1><a href=index.html>Upload'<span style="color: rgb(98, 109, 227);">in</span></a></h1>
    </header>
    <div class="formbox">
        <h1>Login</h1>
        <form id="loginForm" action="login.php" method="post">
            <div>
                <label for="email">Email address:</label><br>
                <input type="email" id="email" name="email" placeholder="Enter your email address" <?php if (isset($_POST['email'])) echo 'value="'.$_POST['email'].'"'; ?>) required>
                <span id="emailErr"><?php echo $accountErr ?></span><br>
            </div>
            <div>
                <label for="passwd">Password:</label><br>
                <input type="password" id="passwd" name="passwd" placeholder="Enter your password">
                <span id="passwdErr"></span><br>
            </div>
            <div class="buttons">
                <button type="button" onclick="validateInput()">Login</button>
            </div>
        </form>
    </div>
</body>
</html>