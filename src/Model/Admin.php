<?php

require_once('Model/Model.php');

class Admin extends Model
{
// Publication article (bdd)
public function postArticle($title, $article_img, $article_text)
{
    $article_img = "public/images/".$article_img;
    $db = $this -> dbConnect();
    $postArticle = $db->prepare('INSERT INTO t_articles(art_title, art_img, art_text, art_date) VALUES(?,?,?, NOW())');
    $affectedLines = $postArticle->execute(array($title, $article_img, $article_text));    
    return $postArticle;
}
// Edition article (bdd)
public function upDataArticle($title, $article_img, $article_text, $idArticle)
{
    $article_img = "public/images/".$article_img;
    $db = $this -> dbConnect();
    $updateArticle = $db->prepare('UPDATE t_articles SET art_title=?, art_img=?, art_text=? WHERE art_id= ?');
    $affectedLines = $updateArticle->execute(array($title, $article_img, $article_text, $idArticle));    
    return $affectedLines;
}
// insertion article dans tinymce
public function editArticle($idArticle){
    $db = $this -> dbConnect();
    $req = $db->prepare('SELECT art_id, art_title, art_img, art_text FROM t_articles WHERE art_id = ?');
    $req->execute(array($idArticle));
    $post = $req->fetch();
    return $post;
}
// suppression article (bdd)
public function deleteArticle($idArticle){
    $db = $this -> dbConnect();
    $deleteArticle = $db->prepare('DELETE FROM t_articles WHERE art_id = ?');
    $deleteArticle -> execute(array($idArticle));
    return $deleteArticle;
}

// suppression commentaires du chapitre supprimé dans la BDD
public function deleteComment($idArticle){
    $db = $this -> dbConnect();
    $deleteComment = $db->prepare('DELETE FROM t_comments WHERE com_art_id = ?');
    $deleteComment -> execute(array($idArticle));
    return $deleteComment;
}
// suppression commentaires signalé (dashboard)
public function deleteSingleComment($idComment){
    $db = $this -> dbConnect();
    $deleteSingleComment = $db->prepare('DELETE FROM t_comments WHERE com_id = ?');
    $deleteSingleComment -> execute(array($idComment));
    return $deleteSingleComment;
}
// validation commentaires signalé (dashboard)
public function validComment($idComment){
    $db = $this -> dbConnect();
    $validComment = $db->prepare('UPDATE t_comments SET com_signal = 0 WHERE com_id = ?');
    $validComment -> execute(array($idComment));
    return $validComment;
}
// mise a jour du signalement du commentaire
public function updateSignal($signal){
    $db = $this -> dbConnect();
    $updateSignal = $db->prepare('UPDATE t_comments SET com_signal = (com_signal+1) WHERE com_id= ?');
    $updateSignal->execute(array($signal));
    return $updateSignal;
}
}