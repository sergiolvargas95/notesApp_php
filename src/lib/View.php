<?php

namespace Redhood\NotesApp\lib;

class View {
    private array $data;

    public function render(string $name, array $data = []): void {
        $this->data = $data;
        require 'src/views/' . $name . '.php';
    }
}