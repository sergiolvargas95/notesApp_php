<?php

use Redhood\NotesApp\controllers\AuthController;

require 'vendor/autoload.php';

$router = new \Bramus\Router\Router();

//session_start();

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ .'/../config');
$dotenv->load();

$router->get('/', function() {
    echo 'Home';
});

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


$router->get('/register', function() {

});

$router->run();