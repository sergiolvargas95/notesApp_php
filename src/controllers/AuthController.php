<?php

namespace Redhood\NotesApp\controllers;

use Redhood\NotesApp\lib\Controller;
use Redhood\NotesApp\models\User;

class AuthController extends Controller {
    private User $user;

    public function __construct() {
        parent::__construct();
        $this->user = new User();
    }

    public function logIn():void {
        session_start();

        $email = $this->post('email');
        $password = $this->post('password');

        $user = $this->user->findByEmail($email);

        if($user && password_verify($password, $user['password'])) {
            $_SESSION['user_id'] = $user['id'];
            header('Location: /');
        } else {
            $_SESSION['error'] = 'Invalid email or password';
            header('Location: /login');
        }
    }

    public function register() {
        $username = $this->post('username');
        $email = $this->post('email');
        $password = $this->post('password');
        $password2 = $this->post('password2');

        if($password === $password2) {
            $hashedPassword = password_hash($password2, PASSWORD_DEFAULT);

            if ($this->user->create($username, $email, $hashedPassword)) {
                header('Location: /');
            } else {
                echo "Error registering user.";
            }
        } else {
            echo "Passwords must match";
        }
    }

    public function logout() {
        session_start();
        session_destroy();
        header('Location: /');
    }
}
