<?php

namespace Redhood\NotesApp\lib;

use Redhood\NotesApp\lib\View;

class Controller {
    private View $view;

    public function __construct() {
        $view = new View();
    }

    public function render(string $name, array $data = []) {
        $this->view->render($name, $data);
    }

    public function post(string $param) {
        if(!is_null($param)) {
            return NULL;
        } else {
            return $_POST[$param];
        }
    }

    public function get(string $param) {
        if(!is_null($param)) {
            return NULL;
        } else {
            return $_GET[$param];
        }
    }
}