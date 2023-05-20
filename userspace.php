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
    <link rel="stylesheet" href="styles/userspace.css">
</head>
<body>
    <header>
        <h1 id="logo"><a href="index.php">Upload'<span style="color:rgb(138, 145, 229);">in</span></a></h1>
        <div class="profil">
            <p><?php echo $_SESSION["user"];?></p>
            <form action="userspace.php" method="post">
                <button type="submit">Log out</button>
            </form>
        </div>
    </header>
    <h2>My storage space</h2>
    
    <form action="fileupload.php" method="post" enctype="multipart/form-data">
        <input type="file" id="fileupload" name="filename">
        <button type="submit">Upload</button>
    </form>
    <div id="file-space">
        <div id="column-description">
            <ul>
                <li>Name</li>
                <li>Last modification</li>
                <li>Size</li>
                <li>Actions</li>
            </ul>
        </div>

        <div id="file-list">
        <?php
        require 'filelist.php';
        error_reporting(E_ALL);
        ini_set('display_errors', 1);
        $conn = new mysqli("localhost", "root", "", "users");
        $userID = $_SESSION['userID'];
        $query = "SELECT * FROM Data
        WHERE userID = $userID";
        $res = $conn->query($query);
        while ($row = $res->fetch_assoc())
            addToFileList($row);
        ?>
        </div>
    </div>
</body>
</html>