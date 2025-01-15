<?php

namespace Redhood\NotesApp\lib;

use PDO;
use PDOException;

class Database {
    private string $host;
    private string $db;
    private string $username;
    private string $password;
    private string $charset;

    public function __construct()
    {
        $this->host = $_ENV['HOST'];
        $this->db = $_ENV['DB'];
        $this->username = $_ENV['DBUSER'];
        $this->password = $_ENV['PASSWORD'];
        $this->charset = $_ENV['CHARSET'];
    }

    public function connect(): PDO {
        try {
            $dsn = "mysql:host=" . $this->host . ";dbname=" . $this->db . ";charset=" . $this->charset;
            $options = [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
            ];

            $pdo = new PDO($dsn, $this->username, $this->password, $options);

            return $pdo;
        } catch (PDOException $e) {
            throw $e;
        }
    }
}