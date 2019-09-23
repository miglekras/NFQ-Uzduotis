<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style/main.css">
    <link rel="stylesheet" href="style/specialist.css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Specialistas</title>
</head>
<?php
include 'dbconn.php';
include 'server.php';
include 'includes/navbar.php';
include 'includes/file-end.html';
header("refresh: 10;");
$sql = 'SELECT * FROM specialist';
$specialists = $conn->query($sql);
?>

<body>
    <?php
    foreach ($specialists as $specialist) :
        ?>
        
        <table class="spec-table">
                <h3><?= $specialist['title'] ?></h3>
            <tr class="table-header">
                <th>Id numeris</th>
                <th>Vardas</th>
                <th>Pavardė</th>
                <th>Statusas</th>
            </tr>
            <?php
                $sql = "SELECT * FROM clients WHERE specialist='$specialist[id]' LIMIT 5";
                $clients = $conn->query($sql);
                foreach ($clients as $client) :
                    ?>
                <tr>
                    <td><?= $client['id'] ?></td>
                    <td><?= $client['firstname'] ?></td>
                    <td><?= $client['lastname'] ?></td>
                    <td>
                        <form action='specialist.php' method='post'>
                            <input type='hidden' name='delete' value=' <?= $client['id'] ?>'>
                            <input type='submit' class='submit-btn' value='Aptarnauta(s)'>
                        </form>
                    </td>
                </tr>
        <?php
            endforeach;
        endforeach; 
        
        
        
        ?>
