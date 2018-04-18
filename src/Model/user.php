<?php
//Calling Manager
require_once('Model/Model.php');

//CommentsObject :
class User extends Model
{

// Vérification du nom d'utilisateur
public function verifyUser(){
    $db = $this -> dbConnect();
    $reqUser = $db->prepare("SELECT user_username FROM t_users WHERE user_username = ?");
    $reqUser->execute(array($_POST['username']));
    $userAlreadyExist = $reqUser->rowCount();
    return $userAlreadyExist;
    }

// Vérification de connexion (nom d'utilisateur)
public function userConnex($username){
    $db = $this -> dbConnect(); 
    $req = $db->prepare('SELECT * FROM t_users WHERE user_username = ?');
    $req->execute(array($username));
    return $req;
    }
    
// Ajout utilisateur
public function addUser($username, $pass, $mail){
    $pass_hache = password_hash($_POST['pass'], PASSWORD_DEFAULT);
    $db = $this -> dbConnect(); 
    $connex = $db->prepare('INSERT INTO t_users(user_username, user_pass, user_mail, user_date) VALUES(?,?,?,CURDATE())');
    $connex->execute(array($username, $pass_hache, $mail));
    return $connex;
    }
    
// comptage utilisateur (stat)
public function userStats(){
    $db = $this -> dbconnect();
    $useAll = $db->query('SELECT COUNT(*) FROM t_users');
    return $useAll;
}

// dernier utilisateur (dashboard)
public function lastStatUser(){
    $db = $this -> dbConnect();
    $userInfos = $db->query('SELECT user__id, user_username, DATE_FORMAT(user_date,\'%d\.%m\.%Y\') AS reg_date FROM t_users WHERE user__id IN(select MAX(user__id) FROM t_users)');
    return $userInfos;
}
}