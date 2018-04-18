<?php $title = "Mon blog"; ?>
<?php ob_start(); ?>

<?php 
//LOGIN BOX
if(empty($_SESSION['user_username'])){
?>
  <button class="identifyB">s'identifier</button>
    <div class="register">
      <form action="index.php?action=record" method="post">
        <div>
        <label for="username">Pseudo</label><br />
        <input type="text" id="username" name="username" placeholder="entrez votre pseudo">
        </div>                     
        <div>
        <label for="pass">Mot de passe</label><br />
        <input type="password" id="pass" name="pass" autocomplete="off" placeholder="et votre mot de passe">
        </div>
        <div>
        <input id="submit" type="submit" value="GO !">
        </div>
        <div class="compte">Pas encore inscrit ? <span class="compteLien"><a href="index.php?action=subView">Créez un compte !</a></span>
        </div>                      
      </form>
    </div>
<?php 
}
else{
?>
        <a href="index.php?action=deco"><button class="identifyB">Déconnexion</button></a>    
<?php 
}
?>

<div class="row">
<?php
while ($data = $postAll->fetch())
{
?>
  <div class="col-sm-6">
    <div class="card text-center carre">
      <div class="card-body">
        <h5 class="card-title"><?= $data['art_title'] ?></h5>
        <p class="card-text"><?= $data['art_text'] ?></p>
        <a href="index.php?action=post&id=<?= $data['art_id'] ?>" class="btn btn-primary">Voir l'article</a>
      </div>
      <div class="card-footer text-muted">
        <time><?= $data['art_date_fr'] ?></time>
        <a href="admin.php?action=dashboard">Admin</a>
      </div>
    </div>
  </div>
<?php      
}
$postAll->closeCursor(); 
?>
</div>

<?php $contents = ob_get_clean(); ?>
<?php require('template.php'); ?>



    