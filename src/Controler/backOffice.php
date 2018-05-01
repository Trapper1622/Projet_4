<?php

require('Model/Article.php');
require('Model/Comment.php');
require('Model/User.php');
require('Model/Admin.php');

// Direction dashboard après identification
function goToDashboard(){
    $articleManager = new Article();
    $postAll = $articleManager ->getAllArticles();
    $commentManager = new Comment();
    $comAll = $commentManager ->printComment();
    $comStats = $commentManager ->commentStats();
    $userManager = new User();
    $userInfos = $userManager ->lastStatUser();
    $useAll = $userManager ->userStats();
    $adminManager = new Admin();
    require('View/dashboard.php');
}

// Ajout article
function pushArticle($title, $article_img, $article_text){
    $adminManager = new Admin();
    $postChapter = $adminManager -> postArticle($title, $article_img, $article_text);
    header('Location: admin.php?action=dashboard');
}

// edition article
function updateArticle($title, $article_img, $article_text, $idArticle){
    $adminManager = new Admin();
    $updateArticle = $adminManager -> UpDataArticle($title, $article_img, $article_text, $idArticle);
    header('Location: admin.php?action=dashboard');
}

// direction vers la page édition
function goToEdition(){
    require('View/creation.php');
}

// Edition article bouton
function theEditor(){
    $idArticle = $_GET['idArticle'];
    $adminManager = new Admin();
    $post = $adminManager -> editArticle($idArticle);
    require('View/edition.php');
}

// suppression article
function theEraser(){
    $idArticle = $_GET['idArticle'];    
    $adminManager = new Admin();
    $deleteComment = $adminManager -> deleteComment($idArticle); 
    $deleteArticle = $adminManager -> deleteArticle($idArticle);
    header('Location: admin.php?action=dashboard');
}

// suppression commentaire
function forgetCom(){
    $idComment = $_GET['idComment'];
    $adminManager = new Admin();
    $deleteSingleComment = $adminManager -> deleteSingleComment($idComment);
    header('Location: admin.php?action=dashboard');
}
// validation commentaire
function validCom(){
    $idComment = $_GET['idComment'];
    $adminManager = new Admin();
    $validComment = $adminManager->validComment($idComment);
    header('Location: admin.php?action=dashboard#ink');
}