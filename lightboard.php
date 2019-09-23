<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style/main.css">
    <link rel="stylesheet" href="style/lightboard.css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Švieslentė</title>
</head>
<?php
include 'dbconn.php';
include 'server.php';
include 'includes/navbar.php';
include 'includes/file-end.html';
header("refresh: 3;");
$sql = 'SELECT * FROM specialist';
$specialists = $conn->query($sql);
?>

<body>
    <?php

    foreach ($specialists as $specialist) : ?>
        <table class="table-spec">
            <tr>
                <th><?= $specialist['title'] ?> </th>
            </tr>

            <?php

                $sql = "SELECT * FROM clients WHERE specialist='$specialist[id]' LIMIT 5";
                $clients = $conn->query($sql);
                foreach ($clients as $client) :
                    ?>
                <tr>
                    <td><?= $client['id'] ?></td>
                </tr>
            <?php endforeach; ?>
        <?php endforeach; ?>
        </table>