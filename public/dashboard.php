<?php
session_start();
if (!isset($_SESSION['users'])) {
    header("Location: index.php");
}
?>

<main id="dashboard">
    <?php include __DIR__ . '/../src/views/logout__view.php' ?>
</main>