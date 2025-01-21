<?php

use Redhood\NotesApp\controllers\AuthController;
use Redhood\NotesApp\controllers\NoteController;

require 'vendor/autoload.php';

$router = new \Bramus\Router\Router();

session_start();

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ .'/../config');
$dotenv->load();

$authMiddleware = function() {
    $publicRoutes = ['/login', '/register', '/loginUser', '/registerUser'];

    if(in_array($_SERVER['REQUEST_URI'], $publicRoutes)) {
        return;
    }

    if(!AuthController::isAuthenticated()) {
        header('Location: /login');
        exit();
    }
};

//(apply middleware)
$router->before('GET|POST', '/.*', $authMiddleware);

//public routes
$router->get('/register', function() {
    $controller = new AuthController;
    $controller->render('Register', 'register/index');
});

$router->post('/registerUser', function() {
    $controller = new AuthController;
    $controller->register();
});

$router->get('/login', function() {
    $controller = new AuthController;
    $controller->render('Login', 'login/index');
});

$router->post('/loginUser', function() {
    $controller = new AuthController;
    $controller->logIn();
});

//protected routes
$router->get('/', function() {
    $useriId = $_SESSION['user_id'];

    $controller = new NoteController;
    $notes = $controller->getAllNotes($useriId);

    if(!is_null($notes)) {
        $controller->render('Home', 'home/index', $notes);
    } else {
        $controller->render('Home', 'home/index');
    }
});

$router->get('/logout', function() {
    $controller = new AuthController;
    $controller->logout();
});

$router->run();