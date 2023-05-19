<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
$target_dir = '/Applications/XAMPP/xamppfiles/htdocs/project/uploads/';
$target_file = $target_dir . basename($_FILES['filename']['name']);
$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

move_uploaded_file($_FILES["filename"]["tmp_name"], $target_file);
?>