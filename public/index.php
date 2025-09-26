<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();
require_once __DIR__ . "/../src/models/db.php";

if (isset($_SESSION['user'])) {
    header('Location: dashboard.php');
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action = $_POST['action'];

    switch ($action) {
        case 'login':
            require_once __DIR__ . "/../src/controllers/login__controller.php";
            exit;
        case 'logout':
            require_once __DIR__ . "/../src/controllers/logout__controller.php";
            exit;
        case 'register':
            require_once __DIR__ . "/../src/controllers/register__controller.php";
            exit;
    }
}
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
            <?php include __DIR__ . "/../src/views/login__view.php" ?>
        </div>
        <div id="card__register" class="wrapper">
            <?php include __DIR__ . "/../src/views/register__view.php" ?>
        </div>
        <div id="button__logout" class="wrapper">
            <?php include __DIR__ . "/../src/views/logout__view.php" ?>
        </div>
    </main>
</body>

</html>