<?php
session_start();

deleteFile();

header('Location: userspace.php');
exit();
function deleteFile()
{
    if ($_SERVER['REQUEST_METHOD'] == 'POST')
    {
        $conn = new mysqli("localhost", "root", "", "users");
        $fileToDelete = $_POST['filetodelete'];
        $fileToDelete_esc = $conn->real_escape_string($fileToDelete);
        $userID = $_SESSION['userID'];
        $query = "DELETE FROM Data
        WHERE fileName = '$fileToDelete_esc' AND userID = $userID";
        $filePath = ".uploads/$userID/" . $fileToDelete;
        unlink($filePath);
        $conn->query($query);
        $conn->close();
    }
}
?>