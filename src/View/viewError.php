<?php $title = "Mon Blog"; ?>
<?php ob_start(); ?>

		<div class="wrapper">		
			<div class="container-fluid" id="body-container-fluid">
				<div class="container">		
          <div class="jumbotron">
          <h1 class="display-1">4<i class="fa  fa-spin fa-cog fa-3x"></i> 4</h1>
          <h1 class="display-3">ERREUR</h1>
          <p class="lower-case">La page est introuvable</p>
          <p class="lower-case">Une Erreur est survenue : <?= $e->getMessage() ?></p>
          </div>										 
				</div>
			</div>						
		</div>

<?php $contents = ob_get_clean(); ?>

<?php require('template.php'); ?>


