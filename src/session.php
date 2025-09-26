<?php

$limit = 1800;

ini_set('session.gc_maxlifetime', $limit);
session_set_cookie_params([
    'lifetime' => $limit,
    'path' => '/',
    'secure' => true,
    'httponly' => true,
    'samesite' => 'Strict'
]);

ini_set('session.use_strict_mode', 1);
ini_set('session.hash_function', '1');
ini_set('session.hash_bits_per_character', '6');
ini_set('session.save_path', '/var/lib/php/sessions');

session_start();

if (!isset($_SESSION['initiated'])) {
    session_regenerate_id(true);
    $_SESSION['initiated'] = true;
}

if (isset($_SESSION['last_activity'])) {
    if (time() - $_SESSION['last_activity'] > $limit) {
        logout();
        header('Location: index.php');
        exit();
    }
}
$_SESSION['last_activity'] = time();


if (!isset($_SESSION['last_regen'])) {
    $_SESSION['last_regen'] = time();
} elseif (time() - $_SESSION['last_regen'] > 300) {
    session_regenerate_id(true);
    $_SESSION['last_regen'] = time();
}

?>