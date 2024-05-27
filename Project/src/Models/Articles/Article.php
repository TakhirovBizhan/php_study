<?php

namespace src\Models\Articles;

use src\Models\ActiveRecordEntity;
use src\Models\Users\User;
use src\Models\Comment\Comment;
use Services\Db;

class Article extends ActiveRecordEntity {
    protected $name;
    protected $text;
    protected $authorId;
    protected $createdAt;

    public function getName() {
        return $this->name;
    }

    public function getText() {
        return $this->text;
    }

    public function getAuthorId() {
        return User::getById($this->authorId);
    }

    public function setName(string $name) {
        $this->name = $name;
    }

    public function setText(string $text) {
        $this->text = $text;
    }

    public function setAuthorId(int $authorId) {
        $this->authorId = $authorId;
    }

    public function getComments(): array {
        $db = Db::getInstance();
        return $db->query(
            'SELECT * FROM comments WHERE article_id = :article_id',
            [':article_id' => $this->id],
            Comment::class
        );
    }

    protected static function getTableName() {
        return 'articles';
    }
}