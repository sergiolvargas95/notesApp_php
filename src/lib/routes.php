<?php

use Redhood\NotesApp\controllers\AuthController;
use Redhood\NotesApp\controllers\NoteController;
use Redhood\NotesApp\lib\SessionManager;
use Redhood\NotesApp\models\Note;

require 'vendor/autoload.php';

$router = new \Bramus\Router\Router();

SessionManager::init();

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
    $userId = SessionManager::getUserId();

    $controller = new NoteController;
    $notes = $controller->getAllNotes($userId);

    if(!is_null($notes)) {
        $controller->render('Home', 'home/index', $notes);
    } else {
        $controller->render('Home', 'home/index');
    }
});

$router->get('/notes/create', function() {
    $controller = new NoteController;
    $controller->render('Create Note', 'create/index');
});

$router->post('/note/createNote', function(){
    $userId = SessionManager::getUserId();

    $controller = new NoteController;
    $controller->create($userId);
});

$router->get('/note/view', function(){
    $controller = new NoteController;

    $idUser = SessionManager::getUserId();

    $note = $controller->getNote($idUser);

    if(isset($note)) {
        $nota[] = $note;
        $controller->render('Edit Note', 'create/index', $nota);
    } else {
        //TODO: set errors views
    }

});

$router->post('/note/updateNote', function() {
    $userId = SessionManager::getUserId();

    $controller = new NoteController;
    $controller->update($userId);
});

$router->get('/logout', function() {
    $controller = new AuthController;
    $controller->logout();
});

$router->post('/note/delete', function() {
    $idUser = SessionManager::getUserId();

    $note = new NoteController;
    $note->deleteNote($idUser);
});

$router->run();