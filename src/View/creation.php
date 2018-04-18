<?php $title = "Interface d'Edition" ?>
<?php ob_start(); ?>	
    <div class="main">
       
        <h1>Interface d'Edition</h1>
        <form class="entree commentsEdition" name="formulaire" id="formulaire" action="admin.php?action=publish" method="post">
            <label  for="title">Titre du Chapitre</label>
            <input type="text" id="title" name="title" /></br>
            <label  class="upper" for="art_img">Photo du Chapitre</label>
            <input class="upper" type="file" id="art_img" name="art_img" />
            <textarea id="mytextarea" name="art_text"></textarea>
            <input type="submit" value="Publier" />
        </form>
       
        <div>
            <p><a href="index.php">Accéder au site</a></p>
            <p><a href="admin.php?action=dashboard">Accéder au Tableau de Bord</a></p>
        </div>
    </div>
<?php $contents = ob_get_clean(); ?>

<?php require('view/template.php'); ?>