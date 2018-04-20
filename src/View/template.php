<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?= $title ?></title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
  <link rel="stylesheet" type="text/css" media="screen" href="Contenu/css/style.css" />
  
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
        <a class="navbar-brand" href="index.php">Jean Rochefort</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
              <a class="nav-link" href="#">Accueil
                <span class="sr-only">(current)</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Articles</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Contact</a>
            </li>
          </ul>
          <?php 
        //LOGIN BOX
        if(empty($_SESSION['user_username'])){
        ?>
          <a href="index.php?action=connexView"><button class="btn identifyB">Connexion</button></a>
        <?php 
        }
        else{
        ?>
          <a href="index.php?action=deco"><button class="btn identifyB">Déconnexion</button></a>    
        <?php 
        }
        ?>
        </div>
      </div>
    </nav>
  </div>
    <header>
        <h1 id="titreBlog">Mon Blog</h1>
      <p id="messageIntro">Un billet simple pour l'Alaska</p>
    </header>
    <div id="contents">
      <?= $contents ?> <!-- element spécifique -->
    </div><!-- #contenu -->
  <!-- Footer -->
    <footer class="py-5">
      <div class="container">
        <p class="m-0 text-center text-white">Copyright &copy; Your Website 2018</p>
      </div>
      <!-- /.container -->
    </footer>
  <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
  <script src='https://cloud.tinymce.com/stable/tinymce.min.js'></script>
  <script type="text/javascript" src="Contenu/js/script.js"></script>
</body>

</html>