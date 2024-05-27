<?php

namespace src\Controllers;

use src\View\View;
use src\Models\Comment\Comment;

class CommentController {
    private $view;

    public function __construct() {
        $this->view = new View('../templates/');
    }

    public function storeComment() {
        if (isset($_POST['user_id'], $_POST['article_id'], $_POST['content'])) {
            $userId = (int)$_POST['user_id'];
            $articleId = (int)$_POST['article_id'];
            $content = $_POST['content'];

            $comment = new Comment();
            $comment->setUserId($userId);
            $comment->setArticleId($articleId);
            $comment->setContent($content);
            $comment->save();

            header('Location: ' . dirname($_SERVER['SCRIPT_NAME']) . '/article/' . $articleId);
            exit();
        } else {
            echo 'Недостаточно данных для сохранения комментария.';
        }
    }

    public function edit(int $id) {
        $comment = Comment::getById($id);
        if ($comment === null) {
            $this->view->renderHtml('errors/404.php', [], 404);
            return;
        }
        $this->view->renderHtml('comments/edit.php', ['comment' => $comment]);
    }

    public function update(int $id) {
        $comment = Comment::getById($id);
        if ($comment === null) {
            $this->view->renderHtml('errors/404.php', [], 404);
            return;
        }
        $comment->setContent($_POST['content']);
        $comment->save();

        header('Location: ' . dirname($_SERVER['SCRIPT_NAME']) . '/article/' . $comment->getArticleId());
        exit();
    }

    public function delete(int $id) {
        $comment = Comment::getById($id);
        if ($comment === null) {
            $this->view->renderHtml('errors/404.php', [], 404);
            return;
        }
        $comment->delete();

        header('Location: ' . dirname($_SERVER['SCRIPT_NAME']) . '/article/' . $comment->getArticleId());
        exit();
    }
}