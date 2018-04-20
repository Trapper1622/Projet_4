<?php $title = "Mon blog"; ?>
<?php ob_start(); ?>

    <!-- Header with Background Image -->
    <header class="business-header">
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <!-- <h1 class="display-3 text-center mt-4">Un billet simple pour l'Alaska</h1> -->
          </div>
        </div>
      </div>
    </header>

    <!-- Page Content -->
    <div class="container">

      <div class="row">
        <div class="col-sm-8">
          <h2 class="mt-4">Une Experience hors du commun</h2>
          <p>Jean forteroche, l'auteur de ce roman, raconte chaque semaine au travers d'episodes, le destin d'un homme au travers de son journal intime.</p>
          <p>Comme une serie télévisé, Un billet pour l'alaska est une experience unique, chaque semaine un épisode est posté sur le site.</p>
          <p>Décrouvrez l'incroyable aventure d'un homme et de son environnement : l'alaska, vaste contré hostile aussi merveilleuse qu'etonnante.</p>
        </div>
        <div class="col-sm-4">
          <h2 class="mt-4">Contact Us</h2>
          <address>
            <strong>Start Bootstrap</strong>
            <br>3481 Melrose Place
            <br>Beverly Hills, CA 90210
            <br>
          </address>
          <address>
            <abbr title="Phone">P:</abbr>
            (123) 456-7890
            <br>
            <abbr title="Email">E:</abbr>
            <a href="mailto:#">name@example.com</a>
          </address>
        </div>
      </div>
      <!-- /.row -->

      <div class="row">
        <?php
        while ($data = $postAll->fetch())
        {
        ?>
        <div class="col-sm-4 my-4">
          <div class="card">
            <img class="card-img-top" src="<?= $data['art_img'] ?>" alt="">
            <div class="card-body">
              <h4 class="card-title"><?= $data['art_title'] ?></h4>
              <p class="card-text"><?= $data['art_text'] ?></p>
            </div>
            <div class="card-footer">
              <a href="index.php?action=post&id=<?= $data['art_id'] ?>" class="btn btn_color">Voir l'article</a>
              <br/>
              <br/>
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
      <!-- /.row -->

    </div>
    <!-- /.container -->

<?php $contents = ob_get_clean(); ?>
<?php require('template.php'); ?>



    