<?php $title = "Mon Blog"; ?>
<?php ob_start(); ?>

<!-- affichage des Articles -->
<div class="container">
  <article class="block_article">
  <header>
    <img class="img-fluid img-thumbnail" src="<?= $post['art_img'] ?>" alt="">
    <h1 class="titreBillet"><?= $post["art_title"] ?></h1>
    <time><?= $post["art_date_fr"] ?></time>
  </header>
  <p class="text_article"><?= $post["art_text"] ?></p>
  </article>
  <div class="block_commentaire">
    <header>
    <h1 id="titrePreponses">Commentaires à <?= $post["art_title"] ?></h1>
    </header>
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
      <div class="block_comment">
        <p id="t_comments-<?= $comment['com_id'] ?>"><span class="titleComment"><strong><?= htmlspecialchars($comment['com_username']) ?></strong></span><br/> le <?= $comment['com_date_fr'] ?></p>
        <p><?= nl2br(htmlspecialchars($comment['com_text'])) ?></p>
        <p><span class="signal"><a href="index.php?action=signal&id=<?= $comment['com_id'] ?>&idArticle=<?= $post['art_id'] ?>"> signalez !</a></span></p>
        
      </div>                   
    <?php
    }
    }
    ?>          
    <div class="col-md-6 col-md-offset-3" id="postCom">
      <form method="post" action="index.php?action=addComment&amp;id=<?=$post['art_id'] ?>">
        <input type="text" class="pseudo_post_com" id="author" name="username" placeholder="Votre pseudo" required>
        <br />
        <textarea name="comment_text" id="txtComment" rows="4" placeholder="Votre commentaire" required></textarea>
        <br />
        <input type="hidden" name="id" value="<?= $post['art_id'] ?>" />
        <input type="submit" value="Commenter" />
      </form>
    </div>
  </div>
</div>


<?php $contents = ob_get_clean(); ?>
<?php require('template.php'); ?>

