<?php

session_start();
require_once __DIR__ . "/../src/models/db.php";

$email = $_POST['email'];
$password = $_POST['password'];

$pepper = getenv('PEPPER');
$hashed = password_hash($password . $pepper, PASSWORD_BCRYPT);

$does_user_exist = $mysqli->prepare("SELECT * FROM users WHERE email=? LIMIT 1");
$does_user_exist->bind_param("s", $email);
$does_user_exist->execute();
$existing_users = $does_user_exist->get_result();

if ($existing_users->num_rows > 0) {
    $_SESSION['error'] = "Email already exists.";
    header("Location: /index.php");
    exit();
}

$insertion = $mysqli->prepare("INSERT INTO users (email, password) VALUES (?, ?)");
$insertion->bind_param("ss", $email, $hashed);

if ($insertion->execute()) {
    $_SESSION['success'] = "Registration successful. Please log in.";
    header("Location: /index.php");
    exit();
} else {
    $_SESSION['error'] = "Error:" . $mysqli->error;
    header("Location: /index.php");
    exit();
}
?>