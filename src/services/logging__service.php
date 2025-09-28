<?php
require_once __DIR__ . "/../models/db.php";

class LoggingService
{
    private $db;

    public function __construct(mysqli $db)
    {
        $this->db = $db;
    }

    public function log($user, $blocked = false)
    {
        $insertion = $this->db->prepare("INSERT INTO access_logs (username, ip, page_accessed, blocked) VALUES (?, ?, ?, ?)");

        $ip = $_SERVER['REMOTE_ADDR'];
        $page_accessed = $_SERVER['REQUEST_URI'];
        $username = $user['email'];
        $blocked_int = $blocked ? 1 : 0;

        $insertion->bind_param("sssi", $username, $ip, $page_accessed, $blocked_int);
        $insertion->execute();
    }

    public function getLogs($filter)
    {

    }
}

?>