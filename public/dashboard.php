<?php
include __DIR__ . '/../src/session.php';
require_once __DIR__ . "/../src/controllers/dashboard__controller.php";

if (!isset($_SESSION['user'])) {
    header("Location: index.php");
}

if (isset($_POST['action']) && $_POST['action'] === 'logout') {
    require_once __DIR__ . "/../src/controllers/logout__controller.php";
}
?>
.
<main id="dashboard">
    <h1>Dashboard</h1>
    <p>Welcome, you're UUID is: <?= htmlspecialchars($user['id']) ?> </p>
    <?php include __DIR__ . "/../src/views/thesaurus__view.php" ?>
    <?php include __DIR__ . "/./src/views/jokes__view.php" ?>

    <?php include __DIR__ . "/../src/views/access_log__view.php" ?>

    <?php include __DIR__ . '/../src/views/logout__view.php' ?>
</main>