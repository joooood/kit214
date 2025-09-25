<?php
session_start();
include "models/db.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homepage</title>
</head>

<body>
    <main id="homepage">
        <div id="card__login" class="wrapper">
            <?php include "views/login__view.php" ?>
        </div>
        <div id="card__register" class="wrapper">
            <?php include "views/register__view.php" ?>
        </div>
    </main>
</body>

</html>