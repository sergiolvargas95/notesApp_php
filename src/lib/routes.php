<?php

use Redhood\NotesApp\controllers\AuthController;

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

    if(!isset($_SESSION['user_id'])) {
        header('Location: /login');
        exit();
    }
};

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

//Protected routes (apply middleware)
$router->before('GET|POST', '/.*', $authMiddleware);

$router->get('/', function() {
    echo 'Home';
});

$router->get('/logout', function() {
    $controller = new AuthController;
    $controller->logout();
});

$router->run();