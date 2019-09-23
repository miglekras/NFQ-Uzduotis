<?php
include 'dbconn.php';
// Duomenų įvedimas į database
if (isset($_POST['register-client'])) {
    $name = mysqli_real_escape_string($conn,  $_POST['name']);
    $surname = mysqli_real_escape_string($conn,  $_POST['surname']);
    $specialist = mysqli_real_escape_string($conn,  $_POST['specialist']);

    $sql = "INSERT INTO clients(firstname, lastname, specialist) VALUES (?,?,?);";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('ssi', $name, $surname, $specialist);
    $stmt->execute();
}
// Ištrina aptarnautus žmones
if (isset($_POST['delete'])) {
    $id = $_POST['delete'];
    $sql = "DELETE FROM clients WHERE id='$id'";
    $conn->query($sql);
}
