<?php
require_once __DIR__ . "/../models/db.php";

$email = $_POST['email'];
$password = $_POST['password'];
$favourite_movies = $_POST['favourite_movies'];
$thesaurus = $_POST['thesaurus'];

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

$insertion = $mysqli->prepare("INSERT INTO users (email, password, favourite_movies, thesaurus) VALUES (?, ?, ?, ?)");
$insertion->bind_param("ssss", $email, $hashed, $favourite_movies, $thesaurus);

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