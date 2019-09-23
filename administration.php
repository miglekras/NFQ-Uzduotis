<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style/main.css">
    <link rel="stylesheet" href="style/administration.css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Registracija</title>
</head>
<?php
include 'server.php';
include 'includes/navbar.php';
include 'includes/file-end.html';
$sql = 'SELECT * FROM specialist';
$specialists = $conn->query($sql);
?>

<body>

    <h1 class="header">Pasirinkite specialistą</h1>
    <div class="buttons-container">
        <?php
        foreach ($specialists as $specialist) :
            ?>
            <button type="button" class="btn buttons" data-toggle="modal" data-target="#specialist-<?= $specialist['id'] ?>"><?= $specialist['title'] ?></button>
            <div class="modal fade" id="specialist-<?= $specialist['id'] ?>" role="dialog">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title"><?= $specialist['title'] ?></h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>
                        <div class="modal-body">
                            <form action="administration.php" autocomplete="off" method="post">
                                <input type="text" class="modal-input" name="name" placeholder="First name" required>
                                <input type="text" class="modal-input" name="surname" placeholder="Last name">
                                <input name="register-client" class="submit-btn" type="submit" value="Submit">
                                <input type="hidden" name="specialist" value="<?= $specialist['id'] ?>">

                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>


    </div>


