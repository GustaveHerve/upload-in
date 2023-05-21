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
    <link rel="stylesheet" href="styles/deletemodal.css">
</head>
<body>
    <header>
        <h1 id="logo"><a href="index.php">Upload'<span style="color:rgb(98, 109, 227);">in</span></a></h1>
        <div class="profil">
            <p><?php echo $_SESSION["user"];?></p>
            <form action="userspace.php" method="post">
                <button type="submit">Log out</button>
            </form>
        </div>
    </header>
    <h2>My storage space</h2>
   
    <div id="upload-button">
        <img src="images/plus.png">
        <a>Upload a file</a>
    </div>

    <form action="fileupload.php" method="post" enctype="multipart/form-data">
        <input type="file" id="fileupload" name="filename">
        <button type="submit">Upload</button>
    </form>

    <div id="column-description">
        <div class="file-name">Name</div>
        <div class="file-lastmodified">Last modification</div>
        <div class="file-size">File size</div>
        <div class="actions">Actions</div>
    </div>

    <div id="file-space">
        <div id="file-list">
        <?php
        require 'filelist.php';
        error_reporting(E_ALL);
        ini_set('display_errors', 1);
        $conn = new mysqli("localhost", "root", "", "users");
        $userID = $_SESSION['userID'];
        $query = "SELECT * FROM Data
        WHERE userID = $userID
        ORDER BY fileName";
        $res = $conn->query($query);
        if($res->num_rows == 0)
            echo "<p class='nofiles'>No files uploaded yet. Start uploading!</p>";
        while ($row = $res->fetch_assoc())
            addToFileList($row);
        ?>
        </div>
    </div>

    <div id="delete-file-modal" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeModal()">&times;</span>
            <p id="prompt"></p><br />
            <form action="deletefile.php" method="post">
                <input id="invisibleinput" name="filetodelete" type="text" style="display: none;" value="">
                <button type="submit">Delete</button>
            </form>
        </div>
    </div>

    <script src="scripts/delete_file.js"></script>
</body>
</html>