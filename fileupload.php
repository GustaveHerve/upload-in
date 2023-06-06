<?php
session_start();

addFile();

header('Location: userspace.php'); //Redirect back to userspace page when done
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
    $temp = explode('.', $_FILES['filename']['name'][0]);
    $name = $temp[0];
    $name_esc = $conn->real_escape_string($name);

    $fullname = $_FILES['filename']['name'][0];
    $fullname_esc = $conn->real_escape_string($fullname);

    $query = "SELECT * FROM Data
    WHERE fileName = '$fullname_esc' AND userID = $userid";
    $res = $conn->query($query);
    $i = 0;
    while ($res->num_rows > 0)
    {
        $i += 1;
        $name = $temp[0] . "($i)";
        $name_esc = $conn->real_escape_string($name);
        if (sizeof($temp) > 0)
            $full = $name . '.' . $temp[1];
        else
            $full = $name;
        $full_esc = $conn->real_escape_string($full);
        $query = "SELECT * FROM Data
        WHERE fileName = '$full_esc' AND userID = $userid";
        $res = $conn->query($query);
    }

    //If there is a file extension, restore it
    if (sizeof($temp) > 1)
    {
        $name = $name . '.' . $temp[1];
        $name_esc = $conn->real_escape_string($name);
    }

    $target_file = $target_dir . $name;

    //Move file to upload folder
    move_uploaded_file($_FILES["filename"]["tmp_name"][0], $target_file);

    $filename = $name_esc;
    $filesize = $_FILES['filename']['size'][0];
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