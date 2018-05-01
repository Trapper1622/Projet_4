<?php
session_start();
include('Controler/backOffice.php');
try{   
  if (isset($_GET['action'])) {       
        
    if((isset($_SESSION['user_username']) && ($_SESSION['user_admin']==1)) ){               
      if($_GET['action'] == 'dashboard'){  
        goToDashboard();
      }  
      if($_GET['action'] == 'edition'){
        goToEdition();
      }                
      elseif($_GET['action'] == 'write'){
        $title = htmlspecialchars($_POST['title']);
        $article_img = htmlspecialchars($_POST['art_img']);
        $article_text = ($_POST['art_text']);
        if(!empty($title) && !empty($article_img) && !empty($article_text)){
          pushArticle($title, $article_img, $article_text);
        }
        else{
          throw new Exception('Tous les champs ne sont pas remplis');
        }
      }
      elseif($_GET['action'] == 'update'){
        $title = htmlspecialchars($_POST['title']);
        $article_img = htmlspecialchars($_POST['art_img']);
        $article_text = ($_POST['art_text']);
        $idArticle = htmlspecialchars($_POST['idArticle']);
        if(!empty($title) && !empty($article_text)){
          updateArticle($title, $article_img, $article_text, $idArticle);
        }
        else{
          throw new Exception('Tous les champs ne sont pas remplis');
        }
      }
      elseif($_GET['action'] == 'publish'){
        $title = htmlspecialchars($_POST['title']);
        $article_img = htmlspecialchars($_POST['art_img']);
        $article_text = ($_POST['art_text']);
        $idArticle = htmlspecialchars($_POST['art_id']);
        if(!empty($title) && !empty($article_img) && !empty($article_text)){
          pushArticle($title, $article_img, $article_text, $idArticle);
        }
        else{
          throw new Exception('Tous les champs ne sont pas remplis');
        }
      }
      elseif(isset($_GET['action']) && isset($_GET['idArticle'])){
        if($_GET['action'] == 'delete'){
          theEraser();
        }
        if($_GET['action'] == 'edit'){
          theEditor();
        }   
      }
    elseif(isset($_GET['action']) && isset($_GET['idComment'])){
      if($_GET['action'] == 'deleteCom'){
        forgetCom();
      }
      elseif($_GET['action'] == 'approval'){
        validCom();
      }
    }
  }
    else{
      throw new Exception('vous n\'êtes pas Admin');
    }        
  }
  else{
    throw new Exception('cette page n\'existe pas');
  }  
}
catch(Exception $e){
  require('view/viewError.php');
}




