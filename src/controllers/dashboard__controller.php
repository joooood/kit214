<?php
session_start();
require_once __DIR__ . "/../models/db.php";
require_once __DIR__ . "/../services/thesaurus__service.php";

if (!isset($_SESSION['user'])) {
    header('Location: /index.php');
    exit;
}

$user = $_SESSION['user'];

$select_user = $mysqli->prepare("SELECT * FROM users WHERE email=? LIMIT 1");
$select_user->bind_param("s", $user['email']);
$select_user->execute();
$selected_user = $select_user->get_result();
$selected_user = $selected_user->fetch_assoc();

$thesaurus = new ThesaurusService();
$synonyms = $thesaurus->getSynonyms($selected_user['thesaurus']);

?>