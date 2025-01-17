<?php

namespace Redhood\NotesApp\models;

use Redhood\NotesApp\lib\Model;

class Note extends Model {
    private string $title;
    private string $content;
    private int $idUser;
}