<?php
include __DIR__ . '/../src/session.php';
require_once __DIR__ . "/../src/controllers/dashboard__controller.php";
require_once __DIR__. '/../src/services/logging__service.php';

if (!isset($_SESSION['user'])) {
    $logger->log($_SESSION['user'] ?? null, true);
    header("Location: index.php");
    exit;
}
$logger->log($_SESSION['user'] ?? null, false);

if (isset($_POST['action']) && $_POST['action'] === 'logout') {
    require_once __DIR__ . "/../src/controllers/logout__controller.php";
}
?>
.
<main id="dashboard">
    <h1>Dashboard</h1>
    <p>Welcome, you're UUID is: <?= htmlspecialchars($user['id']) ?> </p>
    <a href="/access.php">Access Logs</a>

    <?php include __DIR__ . "/../src/views/thesaurus__view.php" ?>
    <?php include __DIR__ . "/./src/views/jokes__view.php" ?>

    <?php include __DIR__ . "/../src/views/access_log__view.php" ?>
    <?php include __DIR__ . '/../src/views/logout__view.php' ?>
</main>