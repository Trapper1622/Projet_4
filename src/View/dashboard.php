<?php $title = "Tableau de Bord" ?>
<?php ob_start(); ?>	

<div class="main">
  <div class="container col-md-6">
    <div class="card-body text-center">
      <h4 class="card-title">Tableau de Bord</h4>
      <h5 class="card-text">Mes chapitres publiés</h5>
    </div>
    <div class="card">
      <a id="add__new__list" type="button" class="btn btn-success position-absolute" href="admin.php?action=edition"><i class="fas fa-plus"></i> Créez un nouveau chapitre</a>
      <table class="table table-hover">
        <thead>
          <tr>
            <th scope="col">ID</th>
            <th scope="col">Titre</th>
            <th scope="col">Edit / Supr</th>
            <th scope="col">Voir l'article</th>
          </tr>
        </thead>
        <tbody>
          <?php 
            $rows = $postAll->fetchAll();  
            $postAll->closeCursor();
            foreach($rows as $data){
            ?>
            <tr>  
              <th scope="row"><?= $data['art_id'] ?></th>
                <td><?= htmlspecialchars($data['art_title']) ?></td>
                <td>
                  <a class="btn btn-sm btn-primary" href="admin.php?action=edit&idArticle=<?=$data['art_id'] ?>"><i class="far fa-edit"></i> edit</a>
                  <a class="btn btn-sm btn-danger" href="admin.php?action=delete&idArticle=<?=$data['art_id'] ?>"><i class="fas fa-trash-alt"></i> effacer</a>    
                </td>
                <td><a class="btn btn-sm btn-info" href="index.php?action=post&id=<?= $data['art_id'] ?>"><i class="fas fa-info-circle"></i> Voir l'article</a> </td>  
              <?php      
              } 
              ?>  
            </tr>
        </tbody>
      </table>
    </div> 
  </div>
</div>

<div class="main2">
  <div class="container col-md-6">
    <div class="card-body text-center">
      <h5 class="card-title">Commentaires signalés</h5>
    </div>
    <div class="card">
      <table class="table table-hover">
        <thead>
          <tr>
            <th scope="col">Article n°</th>
            <th scope="col">Commentaire</th>
            <th scope="col">Date</th>
            <th scope="col">signalé</th>
            <th scope="col">Edit / Supr</th>
          </tr>
        </thead>
        <tbody>
          <?php            
          while($com = $comAll->fetch()){    
          ?>
            <tr>  
              <th scope="row"><?=$com['com_art_id'] ?></th>
                <td><?= $com['com_text'] ?></td>
                <td><?= $com['com_date_short'] ?></td>
                <td><?= $com['com_signal'] ?></td>
                <td>
                  <a class="btn btn-sm btn-primary" href="admin.php?action=approval&idComment=<?=$com['com_id'] ?>"><i class="fas fa-check"></i> Valider</a>
                  <a class="btn btn-sm btn-danger" href="admin.php?action=deleteCom&idComment=<?=$com['com_id'] ?>"><i class="fas fa-trash-alt"></i> effacer</a>    
                </td>  
              <?php      
              } 
              ?>  
            </tr>
        </tbody>
      </table>
    </div> 
  </div>
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




