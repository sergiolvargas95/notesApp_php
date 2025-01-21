<?php

namespace Redhood\NotesApp\models;

use Redhood\NotesApp\lib\Database;
use Redhood\NotesApp\lib\Model;

class Note extends Model {
    private string $title;
    private string $content;
    private int $idUser;

    public function getTitle(): string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getContent(): string
    {
        return $this->content;
    }

    public function setContent(string $content): self
    {
        $this->content = $content;

        return $this;
    }

    public function getIdUser(): int
    {
        return $this->idUser;
    }

    public function setIdUser(int $idUser): self
    {
        $this->idUser = $idUser;

        return $this;
    }

    public function create(string $title, string $content, int $idUser):bool {
        if(is_null($title) || is_null($title) || is_null($idUser)) {
            return false;
        }

        $query = $this->prepare("INSERT INTO note (title, content, created_at, userId)
                    VALUES (:title, :content, NOW(), :userId)");

        return $query->execute([
            "title" => $title,
            "content" => $content,
            "userId" => $idUser
        ]);
    }

    public static function findByUserId(int $userId):array {
        if(!is_null($userId)) {

            $notes = [];

            $db = new Database();

            $query = $db->connect()->prepare("SELECT title, content FROM notes
                                        WHERE userId = :idUser;");

            $query->execute([
                "idUser" => $userId
            ]);

        $results = $query->fetchAll(\PDO::FETCH_ASSOC);

        foreach($results as $result) {
            $notes[] = $result;
        }

        return $notes;
        }
    }
}