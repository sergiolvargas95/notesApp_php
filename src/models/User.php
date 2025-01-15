<?php

namespace Redhood\NotesApp\models;

use PDO;
use Redhood\NotesApp\lib\Database;
use Redhood\NotesApp\lib\Model;

class User extends Model {
    private string $username;
    private string $email;
    private string $password;

    public function __construct() {
        parent::__construct();
    }

    public function getUsername(): string {
        return $this->username;
    }

    public function setUsername(string $username): self {
        $this->username = $username;

        return $this;
    }

    public function getEmail(): string {
        return $this->email;
    }

    public function setEmail(string $email): self {
        $this->email = $email;

        return $this;
    }

    public function getPassword(): string {
        return $this->password;
    }

    public function setPassword(string $password): self {
        $this->password = $password;

        return $this;
    }

    public function create(string $username, string $email, string $password): bool {
        $query = $this->prepare("INSERT INTO users (username, email, password, created_at)
                                    VALUES(:username, :email, :password, Now())");

        return $query->execute([
            'username' => $username,
            'email' => $email,
            'password' =>$password
        ]);
    }

    public function findByEmail(string $email):User {
        $query = $this->prepare("SELECT * FROM users WHERE email = :email");

        $query->execute(['email' => $this->email]);

        return $query->fetch(PDO::FETCH_ASSOC);
    }
}