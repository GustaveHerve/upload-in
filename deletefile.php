<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);

deleteFile();

header('Location: userspace.php');
exit();
function deleteFile()
{
    if ($_SERVER['REQUEST_METHOD'] == 'POST')
    {
        $fileToDelete = $_POST['filetodelete'];
        $userID = $_SESSION['userID'];
        $query = "DELETE FROM Data
        WHERE fileName = '$fileToDelete' AND userID = $userID";
        $filePath = "uploads/" . $fileToDelete;
        unlink($filePath);
        $conn = new mysqli("localhost", "root", "", "users");
        $conn->query($query);
        $conn->close();
    }
}
?>