<?php

require_once('Model/Model.php');

class Article extends Model
{
  // chapitre seul
  public function getArticle($id)
  {
    $db = $this -> dbConnect();
    $req = $db->prepare('SELECT art_id, art_title, art_img, art_text, DATE_FORMAT(art_date, \'%d/%m/%Y à %Hh%imin\') AS art_date_fr FROM t_articles WHERE art_id = ?');
    $req->execute(array($id));
    $post = $req->fetch();
    return $post;
  }
  // tout les chapitre
  public function getAllArticles()
  {
    $db = $this -> dbConnect();
    $postAll = $db->query('SELECT art_id, art_title, art_img, art_text, DATE_FORMAT(art_date, \'%d/%m/%Y à %Hh%imin\') AS art_date_fr FROM t_articles ORDER BY art_id DESC');
    return $postAll;
  }

  // chapitre limit page accueil
  public function getLimitArticles()
  {
    $db = $this -> dbConnect();
    $postLimit = $db->query('SELECT art_id, art_title, art_img, art_text, DATE_FORMAT(art_date, \'%d/%m/%Y à %Hh%imin\') AS art_date_fr FROM t_articles ORDER BY art_id DESC LIMIT 0, 6');
    return $postLimit;
  }
}