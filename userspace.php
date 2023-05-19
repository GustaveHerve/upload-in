<?php 
session_start();

if (!isset($_SESSION["user"]))
{
    session_destroy();
    header('Location: index.php');
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST")
{
    session_unset();
    session_destroy();
    header('Location: index.php');
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
    <h1>Upload'in</h1>
    <p><?php echo $_SESSION["user"];?></p>
    <form action="userspace.php" method="post">
        <button type="submit">Log out</button>
    </form>

    <form action="fileupload.php" method="post" enctype="multipart/form-data">
        <input type="file" id="fileupload" name="filename">
        <button type="submit">Upload</button>
    </form>
    <ul>
        <li>This is a file</li>
    </ul>
</body>
</html>