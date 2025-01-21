<?php

namespace Redhood\NotesApp\controllers;

use Redhood\NotesApp\lib\Controller;
use Redhood\NotesApp\models\Note;

class NoteController extends Controller{

    public function __construct() {
        parent::__construct();
    }

    public function getAllNotes(int $userId): Array {
        $notes = Note::findByUserId($userId);

        if(isset($notes)) {
            return $notes;
        }
    }

    public function create() {
        $title = $this->post('title');
        $content = $this->post('content');
        $userId = $this->post('userId');

        if(!is_null($title) && !is_null($content) && !is_null($userId)) {
            $newNote = new Note;

            $note = $newNote->create($title, $content, $userId);

            if($note) {
                return [
                    'error' => false,
                    'message' => "The note has been created successfully."
                ];
            } else {
                return [
                    'error' => true,
                    'message' => "something failed, try later."
                ];
            }
        }
    }
}