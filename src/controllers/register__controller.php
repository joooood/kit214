<?php
require_once __DIR__ . "/../models/db.php";

$username = $_POST['username'];
$password = $_POST['password'];
$favourite_movies = $_POST['favourite_movies'];
$thesaurus = $_POST['thesaurus'];

$pepper = getenv('PEPPER');
$hashed = password_hash($password . $pepper, PASSWORD_BCRYPT);

$does_user_exist = $mysqli->prepare("SELECT * FROM users WHERE username=? LIMIT 1");
$does_user_exist->bind_param("s", $username);
$does_user_exist->execute();
$existing_users = $does_user_exist->get_result();

if ($existing_users->num_rows > 0) {
    $_SESSION['error'] = "Username already exists.";
    header("Location: /index.php");
    exit();
}

$insertion = $mysqli->prepare("INSERT INTO users (username, password, favourite_movies, thesaurus) VALUES (?, ?, ?, ?)");
$insertion->bind_param("ssss", $username, $hashed, $favourite_movies, $thesaurus);

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