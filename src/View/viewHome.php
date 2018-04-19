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
          <h2 class="mt-4">What We Do</h2>
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. A deserunt neque tempore recusandae animi soluta quasi? Asperiores rem dolore eaque vel, porro, soluta unde debitis aliquam laboriosam. Repellat explicabo, maiores!</p>
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Omnis optio neque consectetur consequatur magni in nisi, natus beatae quidem quam odit commodi ducimus totam eum, alias, adipisci nesciunt voluptate. Voluptatum.</p>
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



    