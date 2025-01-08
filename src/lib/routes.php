<?php

require 'vendor/autoload.php';

$router = new \Bramus\Router\Router();

$router->get('/', function() {
    echo 'Home';
});

$router->get('/login', function() {

});

$outer->get('/register', function() {

});

$router->run();