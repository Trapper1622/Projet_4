<?php $title = "Mon Blog"; ?>
<?php ob_start(); ?>

	<div class="container">
    <br/>
    <br/>
    <br/>
    <br/>
    <center><h2 id="login-name">s'identifier</h2></center>	
    <div class="row">
      <div class="col-md-6 col-md-offset-3" id="login">  
        <form action="index.php?action=record" method="post">	
          <div class="form-group">
            <label class="user"> Pseudo  </label>
            <div class="input-group">
	            <span class="input-group-addon" id="iconn"> <i class="glyphicon glyphicon-user"></i></span>
              <input type="text" class="form-control" id="text1" name="username" placeholder="entrez votre pseudo">
            </div>	
          </div>
          <div class="form-group">
            <label class="user"> Mot de passe </label>
            <div class="input-group">
	          <span class="input-group-addon" id="iconn1"> <i class="glyphicon glyphicon-lock"></i></span>
            <input type="password" class="form-control" id="text2" name="pass" autocomplete="off" placeholder="et votre mot de passe">
          </div>
        </div>
        <div class="form-group">
          <input type="submit" class="btn btn-success btn-other" value="Connexion" style="border-radius:0px;">
          <input type="reset" class="btn btn-danger btn-other" value="reset" style="border-radius:0px;">
        </div>
        <br/>
        <br/>
        <br/>
        <a href="index.php?action=subView" class="compte" style="color: white; font-size: 15px; float: right; margin-right: 10px;"> Créez un compte ! </a>
      </form>
    </div>
	</div>
</div>

<?php $contents = ob_get_clean(); ?>

<?php require('template.php'); ?>
