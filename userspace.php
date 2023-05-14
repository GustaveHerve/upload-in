<?php 
session_start();

if (!isset($_SESSION["user"]))
{
    session_destroy();
    header('Location: index.html');
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST")
{
    session_unset();
    session_destroy();
    header('Location: index.html');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload'in - Your space</title>
</head>
<body>
    <h1>Account email: <?php echo $_SESSION["user"];?></h1>

    <form action="userspace.php" method="post">
        <button type="submit">Log out</button>
    </form>
</body>
</html>