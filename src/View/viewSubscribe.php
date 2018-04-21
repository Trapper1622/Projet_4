<?php $title = "Page d'inscription" ?>
<?php ob_start(); ?>

<div class="container">
  <br/>
  <br/>
  <center><h2 id="login-name">s'inscrire</h2></center>
  <div class="block_subscribe">
    <div class="row">
    <div class="col-md-6 col-md-offset-3" id="login">
      <form action="index.php?action=addUser" method="post">
        <div class="form-group">
          <label class="user" for="username"> Pseudo:  </label>
          <input type="text" class="form-control" name="username" required="valid" placeholder="choisissez votre pseudo">
        </div>
        <div class="form-group">
          <label class="user" for="mail"> Adresse email: </label>
          <input type="email" class="form-control" name="mail" required="valid" placeholder="renseignez votre email">
        </div>
        <div class="form-group">
          <label class="user"  for="pass"> Mot de passe: </label>
          <input type="password" class="form-control" name="pass2" required="valid" autocomplete="off" placeholder="confirmez votre mot de passe">
        </div>
        <div class="form-group" for="pass2">
          <label class="user">Confirmation du mot de passe: </label>
          <input type="password" class="form-control" name="pass" required="valid" autocomplete="off" placeholder="choisissez votre mot de passe">
        </div>
        <div class="form-group">
          <input type="submit" class="btn btn-success btn-other" value="Envoyer" style="border-radius:0px;">
          <input type="reset" class="btn btn-danger btn-other" value="Reset" style="border-radius:0px;">
        </div>
        <br/>
        <br/>
        <br/>
        <a href="index.php?action=connexView" style="color: white; font-size: 15px; float: right; margin-right: 10px;"> Connexion </a>
      </form>
    </div>
  </div>
  </div>
</div>
<div>
  <center><p class="retour-inscrip"><a href="index.php">Revenir à la page d'accueil</a></p></center>
</div>

<?php $contents = ob_get_clean(); ?>

<?php require('template.php'); ?>