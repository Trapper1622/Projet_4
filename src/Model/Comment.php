<?php
//Calling Manager
require_once('Model/Model.php');
//CommentsObject :
class Comment extends Model
{
// commentaire de l'article
public function getArticleComments($id_Articles)
{
    $db = $this -> dbConnect();
    $comments = $db->prepare('SELECT com_id, com_username, com_text, DATE_FORMAT(com_date, \'%d/%m/%Y à %Hh%imin\') AS com_date_fr FROM t_comments WHERE com_art_id = ? ORDER BY com_date DESC ');
    $comments->execute(array($id_Articles));
    return $comments;
}
// publication commentaire
public function postArticleComment($id_Articles, $username, $comment_text)
{
    $db = $this -> dbConnect();
    $comments = $db->prepare('INSERT INTO t_comments(com_art_id, com_username, com_text, com_date) VALUES(?, ?, ?, NOW())');
    $affectedLines = $comments->execute(array($id_Articles, $username, $comment_text));
    return $affectedLines;
}

// comptage commentaire (stat)
public function commentStats(){
    $db = $this -> dbConnect();
    $comStats = $db->query('SELECT COUNT(*) FROM t_comments');
    return $comStats;
}

// Signalement du commentaire dans le dashboard
public function printComment(){
    $db = $this -> dbConnect();
    $comAll = $db->query('SELECT com_id, com_art_id, com_signal, com_text, DATE_FORMAT(com_date, \'%d/%m/%Y\') AS com_date_short FROM t_comments INNER JOIN t_articles WHERE com_signal >=1 && com_art_id = t_articles.art_id ORDER BY com_signal DESC');
    return $comAll;
}
}