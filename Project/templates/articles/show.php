<!-- templates/articles/show.php -->
<?php require(dirname(__DIR__) . '/header.php'); ?>
<div class="card mt-3" style="width: 18rem;">
    <div class="card-body">
        <h5 class="card-title"><?= $article->getName(); ?></h5>
        <h6 class="card-subtitle mb-2 text-muted"><?= $article->getAuthorId()->getNickName(); ?></h6>
        <p class="card-text"><?= $article->getText(); ?></p>
        <a href="<?= dirname($_SERVER['SCRIPT_NAME']); ?>/article/edit/<?= $article->getId(); ?>" class="btn btn-primary">Edit Article</a>
        <a href="<?= dirname($_SERVER['SCRIPT_NAME']); ?>/article/delete/<?= $article->getId(); ?>" class="btn btn-warning">Delete Article</a>
    </div>
</div>

<h2>Комментарии</h2>
<?php foreach ($article->getComments() as $comment): ?>
    <div style='border: 1px solid pink; padding: 8px;' class="comment">
        <p><?= $comment->getContent(); ?></p>
        <small>Автор: <?= $article->getAuthorId()->getNickName(); ?> | Дата: <?= $comment->getCreatedAt(); ?></small>
        <a href="<?= dirname($_SERVER['SCRIPT_NAME']); ?>/comment/edit/<?= $comment->getId(); ?>" class="btn btn-secondary btn-sm">Edit</a>
        <a href="<?= dirname($_SERVER['SCRIPT_NAME']); ?>/comment/delete/<?= $comment->getId(); ?>" class="btn btn-danger btn-sm">Delete</a>
    </div>
<?php endforeach; ?>

<div class="container mt-3">
  <h3>Добавить комментарий</h3>
  <form action="<?= dirname($_SERVER['SCRIPT_NAME']); ?>/comment/storeComment" method="post">
      <div class="form-group">
      <label for="content">Комментарий
        <textarea name="content" required class="form-control"></textarea>
      </label>
      </div>
    <button type="submit" class="btn btn-primary mt-2">Отправить</button>
    <input type="hidden" name="article_id" value="<?= $article->getId(); ?>">
    <input type="hidden" name="user_id" value="1"> 
  </form>
</div>
<?php require(dirname(__DIR__) . '/footer.php'); ?>