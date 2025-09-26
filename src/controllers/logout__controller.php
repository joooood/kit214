<?php
include __DIR__ . '/../session.php';
session_destroy();
header('Location: index.php');
exit();
?>