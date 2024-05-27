<!-- templates/comments/edit.php -->
<?php require(dirname(__DIR__) . '/header.php'); ?>

<div class="container mt-3">
    <h3>Редактировать комментарий</h3>
    <form action="/php_study/Project/www/comment/update/<?= $comment->getId(); ?>" method="post">
        <div class="form-group">
            <label for="content">Комментарий
                <textarea name="content" required class="form-control"><?= $comment->getContent(); ?></textarea>
            </label>
        </div>
        <button type="submit" class="btn btn-primary mt-2">Сохранить</button>
    </form>
</div>

<?php require(dirname(__DIR__) . '/footer.php'); ?>