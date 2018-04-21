<?php $title = "Tableau de Bord" ?>
<?php ob_start(); ?>	

<div class="main">
  <h1>Tableau de Bord</h1>
 <div class=" sortie commentsEdition commentsPannel">
    <h2>Mes chapitres publiés</h2>
      <ul>
        <li><a href="admin.php?action=edition">Créez un nouveau chapitre</a></li>
        <?php 
        $rows = $postAll->fetchAll();  
        $postAll->closeCursor();
        foreach($rows as $data){
        ?>
          <li class="list"><?= htmlspecialchars($data['art_title']) ?><div class="icons"><a href="admin.php?action=edit&idArticle=<?=$data['art_id'] ?>"><i class="fa fa-pencil">&nbsp;&nbsp;</i></a><a href="admin.php?action=delete&idArticle=<?=$data['art_id'] ?>"><i class="fa fa-trash colorRed" ></i></a></div></li>        
        <?php      
        } 
        ?>  
      </ul>
  </div>
  <div id="ink" class="sortie commentsEdition">  
    <h2>Les commentaires signalés</h2>         
      <dl>
      <?php            
      while($com = $comAll->fetch()){    
      ?>
        <dt class="list">Chapitre : <?=$com['com_art_id'] ?></dt>               
        <dd><?= $com['com_text'] ?>
        </dd>
        <dd>Posté le <?= $com['com_date_short'] ?> et signalé <span class="fatRed"><?= $com['com_signal'] ?></span> fois.
          <div class="icons"><a href="admin.php?action=approval&idComment=<?=$com['com_id'] ?>"<i class="fa fa-check colorTeal">&nbsp;&nbsp;</i></a><a href="admin.php?action=deleteCom&idComment=<?=$com['com_id'] ?>"><i class="fa fa-trash colorRed" ></i></a></div>
        </dd>
        <?php
        }
        //DASHBOARD STATS
        ?>                    
      </dl>
  </div>
  <div class="sortie commentsEdition stat">
    <h2> Mes utilisateurs</h2>
    <?php 
    $userAll = $useAll->fetch(); 
    $statCom = $comStats->fetch();
    $userInfo = $userInfos->fetch();
    ?>
    <p>Il y a <span class="fatRed"><?= $userAll[0] ?></span> utilisateurs inscrits sur le site.<br />
    Ils ont posté un total de <span class="fatRed"><?=$statCom[0] ?></span> commentaires.<br />
    L'utilisateur enregistré le plus récent est <span class="fatRed"><?= $userInfo['user_username'] ?></span>, le <?=$userInfo['reg_date'] ?>.<br />
    </p>
    </div>
  <div class="block_back">
    <p><a href="index.php">Accéder au site</a></p>
    <p><a href="admin.php?action=edition">Accéder à l'Interface d'Edition</a></p>
  </div>       
</div>


<?php $contents = ob_get_clean(); ?>

<?php require('view/templateAdmin.php'); ?>




