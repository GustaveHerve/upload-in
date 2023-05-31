<?php
session_start();

addFile();

header('Location: userspace.php');
exit();
function addFile()
{
    $userid = $_SESSION['userID'];
    //form the path with unique userID as a folder
    $target_dir = '/Applications/XAMPP/xamppfiles/htdocs/project/.uploads/' . $userid . '/';

    //Checks if .uploads/(userID) folders exist, if not create them
    if (!is_dir($target_dir))
        mkdir($target_dir, 0777, true);

    $conn = new mysqli("localhost", "root", "", "users");

    //This section handles file duplication by adding (i) at the end of the filename
    //Remove temporarly file extension if there is one
    $temp = explode('.', $_FILES['filename']['name']);
    $name = $temp[0];
    $fullname = $_FILES['filename']['name'];

    $query = "SELECT * FROM Data
    WHERE fileName = '$fullname'";
    $res = $conn->query($query);
    $i = 0;
    while ($res->num_rows > 0)
    {
        $i += 1;
        $name = $temp[0] . "($i)";
        $query = "SELECT * FROM Data
        WHERE fileName = '$name'";
        $res = $conn->query($query);
    }

    //If there is a file extension, restore it
    if (sizeof($temp) > 1)
        $name = $name . '.' . $temp[1];

    $target_file = $target_dir . $name;

    //Move file to upload folder
    move_uploaded_file($_FILES["filename"]["tmp_name"], $target_file);

    $filename = $name;
    $filesize = $_FILES['filename']['size'];
    if (sizeof($temp) > 1)
        $filetype = $temp[1];
    else
        $filetype = "no_extension";

    $insert = "INSERT INTO Data (userID, fileName, fileType, fileSize)
    VALUES ($userid, '$filename', '$filetype', '$filesize')";

    $conn->query($insert);
    $conn->close();
}

?>