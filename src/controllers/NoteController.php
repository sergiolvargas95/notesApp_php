<?php

namespace Redhood\NotesApp\controllers;

use Redhood\NotesApp\lib\Controller;
use Redhood\NotesApp\lib\SessionManager;
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

    public function create(int $userId) {
        if(isset($userId)) {
            $title = $this->post('title');
            $content = $this->post('content');

            if(!is_null($title) && !is_null($content) && !is_null($userId)) {
                $newNote = new Note;

                $note = $newNote->create($title, $content, $userId);

                if($note) {
                    header('Location: /');
                } else {
                    return [
                        'error' => true,
                        'message' => "something failed, try later."
                    ];
                }
            }
        }
    }

    public function getNote(int $userId): Array {
        if(isset($userId)) {
            $id = $this->get('id');

            $note = Note::getNote($id, $userId);

            return $note;
        }
    }
}