<?php $title = "Interface d'Edition" ?>
<?php ob_start(); ?>	
  <div class="main">
    <div class="container">
      <h1>Interface d'Edition</h1>
    <form class="entree commentsEdition" name="formulaire" id="formulaire" action="admin.php?action=update" method="post">
      <input hidden type="number" name="idArticle" value="<?=$_GET['idArticle'] ?>"
      <label for="title">Titre du Chapitre</label>
      <input type="text" id="title" name="title" value="<?=($post['art_title']) ?>" /></br>
      <label  for="art_img">Photo du Chapitre</label>
      <input type="file" id="art_img" name="art_img" />
      <textarea id="mytextarea" name="art_text"><?=($post['art_text']) ?></textarea>
      <br />
      <input type="submit" value="modifier" />
    </form>
    <div>
      <br />
      <p><a href="index.php">Accéder au site</a></p>
      <p><a href="admin.php?action=dashboard">Accéder au Tableau de Bord</a></p>
    </div>
    </div>  
  </div>
<?php $contents = ob_get_clean(); ?>

<?php require('view/template.php'); ?>