<?php
session_start();
include "../models/db.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $select_user = $mysqli->prepare("SELECT * FROM users WHERE email=? LIMIT 1");
    $select_user->bind_param('s', $email);
    $select_user->execute();
    $selected_user = $select_user->get_result();

    if ($selected_user && $selected_user->num_rows > 0) {
        $user = $selected_user->fetch_assoc();
        $pepper = getenv('PEPPER');
        if (password_verify($password . $pepper, $user['password'])) {
            unset($user['password']);
            $_SESSION['user'] = $user;
            header('Location: /index.php');
            exit;
        } else {
            $_SESSION['error'] = 'Invalid email or password';
            header('Location: /index.php');
            exit;
        }
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