<?php
session_start();

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
        $filePath = ".uploads/$userID/" . $fileToDelete;
        unlink($filePath);
        $conn = new mysqli("localhost", "root", "", "users");
        $conn->query($query);
        $conn->close();
    }
}
?>