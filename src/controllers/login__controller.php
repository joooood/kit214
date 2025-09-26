<?php
require_once __DIR__ . "/../models/db.php";

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
        error_log("User logged in: " . $user['email']);
        error_log("Session user data: " . print_r($_SESSION['user'], true));
        header('Location: /dashboard.php');
        exit;
    }
}

$_SESSION['error'] = 'Invalid email or password';
header('Location: /index.php');
exit;

?>