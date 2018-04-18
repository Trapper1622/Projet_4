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
    <header>
      <a href="index.php">
        <h1 id="titreBlog">Mon Blog</h1>
      </a>
      <p id="messageIntro">Je vous souhaite la bienvenue sur ce modeste blog.</p>
    </header>
    <div id="contents">
      <?= $contents ?> <!-- element spécifique -->
    </div><!-- #contenu -->
    <footer id="piedBlog">
      Blog réalisé avec PHP, HTML5 et CSS.
    </footer>
  </div><!-- #global -->
  <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
  <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
  <script src='https://cloud.tinymce.com/stable/tinymce.min.js'></script>
  <script type="text/javascript" src="Contenu/js/script.js"></script>
</body>

</html>