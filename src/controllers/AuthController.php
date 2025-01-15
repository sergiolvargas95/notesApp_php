<?php

namespace Redhood\NotesApp\controllers;

use Exception;
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

    public function register(): void {
        $username = $this->post('username');
        $email = $this->post('email');
        $password = $this->post('password');
        $password2 = $this->post('password2');


        if ($password !== $password2) {
            echo "Passwords must match";
            return;
        }

        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        try {
            $userModel = new User();
            if ($userModel->create($username, $email, $hashedPassword)) {
                header('Location: /');
            } else {
                echo "Error registering user.";
            }
        } catch (Exception $e) {
            echo "An error occurred: " . $e->getMessage();
        }
    }

    public function logout() {
        session_start();
        session_destroy();
        header('Location: /');
    }
}
