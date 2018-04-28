<?php $title = "Mon blog"; ?>
<?php ob_start(); ?>

    <!-- Page Content -->
    <div class="container">
      <div class="block_about">
        <div class="row">
            <div class="col-sm-8">
            <h2 class="mt-4">Une Experience hors du commun</h2>
            <p>Jean forteroche, l'auteur de ce roman, raconte chaque semaine au travers d'episodes, le destin d'un homme au travers de son journal intime.</p>
            <p>Comme une serie télévisé, Un billet pour l'alaska est une experience unique, chaque semaine un épisode est posté sur le site.</p>
            <p>Décrouvrez l'incroyable aventure d'un homme et de son environnement : l'alaska, vaste contré hostile aussi merveilleuse qu'etonnante.</p>
          </div>
          <div class="col-sm-4">
            <img src="Contenu/images/jeanRochefort.jpg" alt="profil" class="img-thumbnail">
          </div>
        </div> 
      </div>
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
<?php require('templateHome.php'); ?>



    