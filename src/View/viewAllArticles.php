<?php $title = "Mon Blog"; ?>
<?php ob_start(); ?>

<!-- Page Content -->
    <div class="container">
      <div class="block_card">
        <!-- /.row -->
        <div class="row">
          <?php
          while ($data = $postAll->fetch())
          {
          // extrait du texte
          $extrait = substr($data['art_text'], 0, 200); // Recupere une portion de notre contenu
          $espace = strrpos($extrait, ' '); // Trouver le dernier espace juste apres le dernier mot de $extrait
          $extraitSpace = substr($extrait, 0, $espace).' ...'; // Recupere une portion de notre $extrait en prennat en charge le dernier espace
          ?>
          <div class="col-sm-4 my-4">
            <div class="card">
              <img class="card-img-top" src="<?= $data['art_img'] ?>" alt="">
              <div class="card-body">
                <h4 class="card-title"><?= $data['art_title'] ?></h4>
                <p class="card-text"><?= $extraitSpace ?></p>
              </div>
              <div class="card-footer">
                <a href="index.php?action=post&id=<?= $data['art_id'] ?>" class="btn btn_color">Voir l'article</a>
                <br/>
                <br/>
                <time><?= $data['art_date_fr'] ?></time>
              </div>
            </div>
          </div>
          <?php      
          }
          $postAll->closeCursor(); 
          ?>
        </div>  
        <!-- /.row -->
      </div>
    </div>
    <!-- /.container -->


<?php $contents = ob_get_clean(); ?>
<?php require('template.php'); ?>