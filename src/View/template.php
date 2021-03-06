<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?= $title ?></title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.10/css/all.css">
  <link rel="stylesheet" type="text/css" media="screen" href="Contenu/css/style2.css" />
  
  <!-- Pour la page error -->
  <link rel="icon" href="images/a.png" type="images/water.png" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
</head>

<body>
  <div class="container">
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg fixed-top">
      <div class="container">
        <a class="navbar-brand" href="index.php">Jean Forteroche</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon">
            <i class="fas fa-bars fa-2x iconeNav"></i>
          </span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
           <?php 
            //LOGIN BOX
            if(empty($_SESSION['user_username'])){
            ?>
              <a href="index.php?action=connexView"><button class="btn identifyB">Connexion</button></a>
            <?php 
            }
            else{
            ?>
              <a href="admin.php?action=dashboard"><button class="btn identifyB btnAdmin">Admin</button></a>
              <a href="index.php?action=deco"><button class="btn identifyB">Déconnexion</button></a>    
            <?php 
            }
            ?>
          </ul>
          
        </div>
      </div>
    </nav>
  </div><!-- /.container -->
  <!-- Header with Background Image -->
    <header class="business-header">
      <img id="imageUne" src="Contenu/images/imgUne.jpg" class="img-fluid" alt="Responsive image">
      <div class="centered">Un billet simple pour l'Alaska</div>
    </header>
    <div id="contents">
      <?= $contents ?> <!-- element spécifique -->
    </div><!-- #contenu -->
     <!-- Footer -->
    <footer class="py-5">
      <div class="container">
        <p class="m-0 text-center text-white">Copyright &copy; Jean Forteroche 2018</p>
      </div>

    </footer>
  <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script> 
  <script src='https://cloud.tinymce.com/stable/tinymce.min.js'></script>
  <script type="text/javascript" src="Contenu/js/script.js"></script>
</body>

</html>