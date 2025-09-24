<?php
session_start();
include "../models/db.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';

    $sql = "SELECT * FROM users WHERE email='$email' AND password='$password' LIMIT 1";
    $result = $mysqli->query($sql);

    if ($result && $result->num_rows > 0) {
        $user = $result->fetch_assoc();
        $_SESSION['user'] = $user;
        header('Location: /index.php');
        exit;
    } else {
        $_SESSION['error'] = 'Invalid email or password';
        header('Location: /index.php');
        exit;
    }
} else {
    header('Location: /index.php');
    exit;
}

?>