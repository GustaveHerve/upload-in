<?php
//Retrieve session information and enable error message
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);

addFile();

header('Location: userspace.php');
exit();
function addFile()
{
    $userid = $_SESSION['userID'];
    $target_dir = '/Applications/XAMPP/xamppfiles/htdocs/project/uploads/';
    $target_file = $target_dir . basename($_FILES['filename']['name']);

    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    move_uploaded_file($_FILES["filename"]["tmp_name"], $target_file);

    $filename = $_FILES['filename']['name'];
    $filesize = $_FILES['filename']['size'];
    $filetype = explode('.', $_FILES['filename']['name'])[1];
    $insert = "INSERT INTO Data (userID, fileName, fileType, fileSize)
    VALUES ($userid, '$filename', '$filetype', '$filesize')";

    $conn = new mysqli("localhost", "root", "", "users");
    $conn->query($insert);
    $conn->close();
}

?>