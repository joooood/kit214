<?php

session_start();
include "../models/db.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $does_user_exist = $mysqli->prepare("SELECT * FROM users WHERE email=?");
    if (!$does_user_exist)
        die("Failed to prepare statement: " . $mysqli->error);
    $does_user_exist->bind_param("s", $email);
    $does_user_exist->execute();
    $existing_users = $does_user_exist->get_result();

    if ($existing_users->num_rows > 0) {
        $_SESSION['error'] = "Email already exists.";
        header("Location: ../index.php");
        exit();
    } else {
        $pepper = getenv('PEPPER');
        $hashed = password_hash($password . $pepper, PASSWORD_BCRYPT);

        $insertion = $mysqli->prepare("INSERT INTO users (email, password) VALUES (?, ?)");
        $insertion->bind_param("ss", $email, $hashed);

        if ($insertion->execute()) {
            $_SESSION['success'] = "Registration successful. Please log in.";
            header("Location: ../index.php");
            exit();
        } else {
            $_SESSION['error'] = "Error:" . $mysqli->error;
            header("Location: ../index.php");
            exit();
        }
    }
}
?>