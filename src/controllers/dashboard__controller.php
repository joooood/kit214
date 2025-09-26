<?php
include __DIR__ .
    require_once __DIR__ . "/../models/db.php";
require_once __DIR__ . "/../services/thesaurus__service.php";
require_once __DIR__ . "/../services/jokes__service.php";

if (!isset($_SESSION['user'])) {
    header('Location: /index.php');
    exit;
}

$user = $_SESSION['user'];

$thesaurus = new ThesaurusService();
$synonyms = $thesaurus->getSynonyms($user['thesaurus']);

$joke_generator = new JokeService();
$joke = $joke_generator->getRandomJoke();

?>