<?php

namespace Redhood\NotesApp\models;

use Redhood\NotesApp\lib\Database;
use Redhood\NotesApp\lib\Model;

class Note extends Model {
    private int $id;
    private string $title;
    private string $content;
    private int $idUser;

    public function __construct(int $id = 0, int $idUser = 0, string $title = '', string $content = '') {
        parent::__construct();
        $this->id = $id;
        $this->idUser = $idUser;
        $this->title = $title;
        $this->content = $content;
    }

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

    public static function fromArray(array $data): Note {
        return new self(
            $data['id'] ?? 0,
            $data['userId'] ?? 0,
            $data['title'] ?? '',
            $data['content'] ?? ''
        );
    }

    public static function create(string $title, string $content, int $idUser):?Note {
        $db = new Database();

        if(is_null($title) || is_null($title) || is_null($idUser)) {
            return false;
        }

        $query = $db->connect()->prepare("INSERT INTO notes (title, content, created_at, userId)
                    VALUES (:title, :content, NOW(), :userId)");

        $result = $query->execute([
            "title" => $title,
            "content" => $content,
            "userId" => $idUser
        ]);

        if($result) {
            $id = $db->connect()->lastInsertId();
            return new self($id, $idUser, $title, $content);
        }

        return null;
    }

    public function update(): bool {
        if(is_null($this->getIdUser())) return false;

        $query = $this->prepare("UPDATE notes
                                    SET title = :title,
                                        content = :content
                                    WHERE id = :id");

        return $query->execute([
            "id" => $this->getId(),
            "title" => $this->getTitle(),
            "content" => $this->getContent()
        ]);

    }

    public static function getNote(int $id, int $userId): Note | null {
        if(!is_null($id) && !is_null($userId)) {
            $db = new Database();

            $query = $db->connect()->prepare("SELECT id, title, content FROM notes
                                                WHERE id = :id AND userId = :idUser");

            $query->execute([
                "idUser" => $userId,
                "id" => $id
            ]);

            $result = $query->fetch(\PDO::FETCH_ASSOC);

            return $result ? Note::fromArray($result) : null;
        }
    }

    public static function findByUserId(int $userId):array {
        if(!is_null($userId)) {

            $notes = [];

            $db = new Database();

            $query = $db->connect()->prepare("SELECT id, title, content FROM notes
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

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): self
    {
        $this->id = $id;

        return $this;
    }
}