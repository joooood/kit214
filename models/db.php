<?php

$host = "localhost";
$username = "kit214";
$password = "O98TRGKgat4fkxNT";
$db = "kit214";

$mysqli = new mysqli($host, $username, $password, $db);
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}

?>