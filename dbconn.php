<?php
$dbServername = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName = "registration";

$conn = new mysqli($dbServername, $dbUsername, $dbPassword,  $dbName);

if ($conn->connect_error) {
    die("Conection failed:" . $conn->connect_error);
}

$conn->set_charset("utf8");