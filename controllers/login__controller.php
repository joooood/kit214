<?php
session_start();
include "../models/db.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $select_user_by_email = $mysqli->prepare("SELECT * FROM users WHERE email=? LIMIT 1");
    $select_user_by_email->bind_param('s', $email);
    $select_user_by_email->execute();
    $selected_user = $select_user_by_email->get_result();

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