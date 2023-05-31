<?php
$db = new mysqli("localhost", "root", "");
$db->query("CREATE DATABASE IF NOT EXISTS users");
$db->select_db("users");
$query = 'CREATE TABLE Data(
    fileIndex INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
    userID INTEGER UNSIGNED NOT NULL,
    fileName VARCHAR(255) NOT NULL,
    fileType VARCHAR(20) NOT NULL,
    lastModified TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    fileSize DOUBLE UNSIGNED NOT NULL,
    PRIMARY KEY (fileIndex)
    )';
$db->query($query);

$query = 'CREATE TABLE User(
    id INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
    email VARCHAR(100) NOT NULL,
    passwd VARCHAR(100) NOT NULL,
    PRIMARY KEY (id)
    )';
$db->query($query);

$db->close();
?>