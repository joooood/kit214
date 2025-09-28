<?php
include __DIR__ . '/../session.php';
require_once __DIR__ . "/../models/db.php";
require_once __DIR__ . "/../services/thesaurus__service.php";
require_once __DIR__ . "/../services/jokes__service.php";
require_once __DIR__ . '/../services/logging__service.php';

if (!isset($_SESSION['user'])) {
    $logger->log($_SESSION['user'] ?? null, true);
    header('Location: /index.php');
    exit;
}
$logger->log($_SESSION['user'] ?? null, false);

$user = $_SESSION['user'];

$thesaurus = new ThesaurusService();
$synonyms = $thesaurus->getSynonyms($user['thesaurus']);

$joke_generator = new JokeService();
$joke = $joke_generator->getRandomJoke();

?>