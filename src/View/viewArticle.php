<?php $title = "Mon Blog"; ?>
<?php ob_start(); ?>

<article>
  <header>
    <h1 class="titreBillet"><?= $post["art_title"] ?></h1>
    <time><?= $post["art_date_fr"] ?></time>
  </header>
  <p><?= $post["art_text"] ?></p>
</article>
<hr />
<header>
  <h1 id="titrePreponses">Réponses à <?= $post["art_title"] ?></h1>
</header>
<hr/>

<!-- affichage des commentaires -->

<?php 
// liste des commentaires
$commentArray = $comments->fetchAll();
if(empty($commentArray)){
?>
  <p>Soyez le premier à poster un commentaire.</p>
<?php
}
else{
foreach ($commentArray as $comment){   
?>                   
  <p id="t_comments-<?= $comment['com_id'] ?>"><span class="blue"><strong><?= htmlspecialchars($comment['com_username']) ?></strong></span> le <?= $comment['com_date_fr'] ?>- <span class="signal"><a href="index.php?action=signal&id=<?= $comment['com_id'] ?>&idArticle=<?= $post['art_id'] ?>"> signalez !</a></span></p>
  <p><?= nl2br(htmlspecialchars($comment['com_text'])) ?></p>
<?php
}
}
?>          

<hr/>
<form method="post" action="index.php?action=addComment&amp;id=<?=$post['art_id'] ?>">
  <input type="text" id="author" name="username" placeholder="Votre pseudo" required>
  <br />
  <textarea name="comment_text" id="txtComment" rows="4" placeholder="Votre commentaire" required></textarea>
  <br />
  <input type="hidden" name="id" value="<?= $post['art_id'] ?>" />
  <input type="submit" value="Commenter" />
</form>

<?php $contents = ob_get_clean(); ?>
<?php require('template.php'); ?>

