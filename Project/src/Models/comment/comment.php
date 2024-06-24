<?php

namespace src\Models\Comment;

use src\Models\ActiveRecordEntity;

class Comment extends ActiveRecordEntity {
    protected $userId;
    protected $articleId;
    protected $content;
    protected $createdAt;

    public function getUserId() {
        return $this->userId;
    }
    
    public function getUser(): User {
        return User::getById($this->userId);
    }

    public function setUserId($userId) {
        $this->userId = $userId;
    }

    public function getArticleId() {
        return $this->articleId;
    }

    public function setArticleId($articleId) {
        $this->articleId = $articleId;
    }

    public function getContent() {
        return $this->content;
    }

    public function setContent($content) {
        $this->content = $content;
    }

    public function getCreatedAt() {
        return $this->createdAt;
    }

    protected static function getTableName() {
        return 'comments';
    }
}