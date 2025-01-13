<?php

namespace Redhood\NotesApp\lib;

class View {
    private array $data;
    private string $title;
    private string $viewPath;

    public function render(string $title, string $name, array $data = []): void {
        $this->data = $data;
        $this->title = $title;
        $this->viewPath = 'src/views/' . $name . '.php';

        require 'src/views/layout.php';
    }
}