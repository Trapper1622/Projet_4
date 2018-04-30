<?php
session_start();
require('controler/frontOffice.php');
try{
if (isset($_GET['action'])) {
  if ($_GET['action'] == 'post') {
    $id = htmlspecialchars($_GET['id']);
    if (isset($id) && $id > 0) {                
      setArticle($id);
    }
    else {
      throw new Exception('aucun identifiant de billet envoyé');
    }
  }
  elseif($_GET['action'] == 'signal'){
    $commentId = htmlspecialchars($_GET['id']);
    $articlerId = htmlspecialchars($_GET['idArticle']);
    addSignal($commentId,$articlerId);
  }
  elseif ($_GET['action'] == 'addComment') {
    if (isset($_GET['id']) && $_GET['id'] > 0) {
      $id_Articles = htmlspecialchars($_GET['id']); 
      $username = htmlspecialchars($_POST['username']);
      $comment_text = htmlspecialchars($_POST['comment_text']);
      if (!empty($username) && !empty($comment_text)) {
        addComment($id_Articles, $username, $comment_text);
      }
      else {
        throw new Exception('tous les champs ne sont pas remplis');
      }
    }
  }
  elseif ($_GET['action'] == 'allArticles'){
    setAllArticles();
  }
  elseif ($_GET['action'] == 'subView'){
    subView();            
  }
  elseif ($_GET['action'] == 'connexView'){
    connexView();
  }
  elseif ($_GET['action'] == 'addUser'){
    $username = htmlspecialchars($_POST['username']);
    $pass = htmlspecialchars($_POST['pass']);
    $pass2 = htmlspecialchars($_POST['pass2']);
    $mail = htmlspecialchars($_POST['mail']);
    if(strlen($username) <= 25 ){
      if($pass == $pass2){
        if(filter_var($mail, FILTER_VALIDATE_EMAIL)){                        
          sameUser($username, $pass, $mail);                        
        }
        else{
          throw new Exception('votre adresse mail n\'est pas valide');
        }                    
      }
      else{
        throw new Exception('vos mots de passes ne sont pas identiques');
      }
    }
    else{
      throw new Exception('votre pseudo dépasse les 25 caractères');
    }
  }
  elseif($_GET['action'] == 'deco'){
    disconnected();
  }
  elseif ($_GET['action'] == 'record'){
    $username = htmlspecialchars($_POST['username']);
    $pass = htmlspecialchars($_POST['pass']);
    if(isset($username) && isset($pass)){
      connected($username,$pass);
    }
    else{
      throw new Exception('veuillez renseignez vos identifiants');
    }    
  }        
}
else {
  setLimitArticles();
}
}
catch(Exception $e){
  echo ($e->getMessage());
}
 