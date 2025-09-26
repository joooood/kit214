<?php
include __DIR__ . "/../session.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $_POST['action'] === 'logout') {
    require_once __DIR__ . '/../src/controllers/logout__controller.php';
    exit;
}

include __DIR__ . "/../src/views/logout__view.php";