<?php

require('Model/Article.php');
require('Model/Comment.php');
require('Model/User.php');
require('Model/Admin.php');

// Page all Article
function setAllArticles()
{
    $articleManager = new Article();
    $postAll = $articleManager -> getAllArticles();   
    require('view/viewAllArticles.php');
}

// article limit Accueil
function setLimitArticles()
{
  $articleManager = new Article();
  $postLimit = $articleManager -> getLimitArticles();   
  require('view/viewHome.php');
}
 

// Article vu
function setArticle($id)
{
    $articleManager = new Article();
    $commentManager = new Comment();    
    $post = $articleManager -> getArticle($id);
    if(!$post){
        throw new Exception('numéro de chapitre inexistant');
        
    }   
    $comments = $commentManager -> getArticleComments($id);
    require('view/viewArticle.php');
}

// Inscription
function subView(){
    require('view/viewSubscribe.php');
}

// Page connexion
function connexView(){
    require('view/viewConnexion.php');
}

// Ajout commentaire 
function addComment($id_Articles, $username, $comment_text)
{
  $commentManager = new Comment();
  if (trim($username) && trim($comment_text)) {
    $comments = $commentManager -> postArticleComment($id_Articles, $username, $comment_text);
    if ($comments === false) {
        throw new Exception('Impossible d\'ajouter le commentaire !');
    }
    else {
        header('Location: index.php?action=post&id=' . $id_Articles . '#comments');
    }
  } 
  else {
    throw new Exception("Il faut remplir les champs");   
  }      
}   

// Connexion
function connected($username,$pass){
    
    $userManager = new User();
    $req = $userManager -> userConnex($username);
    $resultat = $req->fetch();
    $isPasswordCorrect = password_verify($pass,$resultat['user_pass']);
    $_SESSION['user_username'] =  $resultat['user_username'];
    $_SESSION['user_admin'] = $resultat['user_admin'];
    $_SESSION['user__id'] =  $resultat['user__id'];
        if($isPasswordCorrect && $resultat['user_admin'] == 1){         
            header('Location: admin.php?action=dashboard');
        }
        elseif($isPasswordCorrect){
            header('Location: index.php');             
          }
        else{
            throw new Exception('vos identifiants sont incorrects');
        }
}    

// deconnexion
function disconnected(){
    $_SESSION = array();
    session_destroy();
    header('Location: index.php');
}

// Vérif inscription utilisateur
function sameUser($username, $pass, $mail){
    $userManager = new User();
    $resultat = $userManager -> verifyUser();
    if($resultat == 0){
        if(preg_match("/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])[\da-zA-Z]{8,16}$/", $pass)){
            if(preg_match("#^\w{3,25}$#",$username)){           
            newUser($username, $pass, $mail);
            }   
            else{
                throw new Exception('votre pseudo ne doit compter que des lettres ou des chiffres au nombre de 3 minimum');
            }
        }
        else{
            throw new Exception('votre mot de passe doit comporter des lettres majuscules, minuscules ET des chiffres entre 8 et 16 caractères');
        }
    }
    else{
        throw new Exception('ce pseudo existe déjà');
    }
}

// Ajout utilisateur
function newUser($username, $pass, $mail)
{
    $userManager = new User();
    $connex = $userManager -> addUser($username, $pass, $mail);
    header('Location: index.php');
}

// Signalement commentaire
function addSignal($commentId, $articleId){
    $commentSignal = new Admin();
    $updateSignal = $commentSignal -> updateSignal($commentId);
    header('Location: index.php?action=post&id='.$articleId.'#comments');
}

// Pagination
