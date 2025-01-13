<?php

use Redhood\NotesApp\controllers\AuthController;

require 'vendor/autoload.php';

$router = new \Bramus\Router\Router();

session_start();

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ .'/../config');
$dotenv->load();

$router->get('/', function() {
    echo 'Home';
});

$router->get('/login', function() {
    $controller = new AuthController;
    $controller->render('Login', 'login/index');
});

$router->get('/register', function() {

});

$router->run();