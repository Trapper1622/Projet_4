<?php $title = "Page d'inscription" ?>
<?php ob_start(); ?>
<div class="main">       
        <div class="sub">
                <form action="index.php?action=addUser" method="post">
                        <div>
                        <label for="username">Pseudo</label><br />
                        <input type="text" id="username" name="username" required="valid" placeholder="choisissez votre pseudo" > 
                        </div>
                        <div>
                        <label for="pass">Mot de passe</label><br />
                        <input type="password" id="pass" name="pass" required="valid" autocomplete="off" placeholder="choisissez votre mot de passe">
                        </div>
                        <div>
                        <label for="pass2">Confirmation du mot de passe</label><br />
                        <input type="password" id="pass2" name="pass2" required="valid" autocomplete="off" placeholder="confirmez votre mot de passe">
                        </div>
                        <div>
                        <label for="mail">Adresse email</label><br />
                        <input type="text" id="mail" name="mail" required="valid" placeholder="renseignez votre email" >
                        </div>
                        <div>
                        <input type="checkbox" name="choix" required="valid"> J'ai lu les règles d'usage et j'accepte de les respecter.</br>
                        <input type="submit" name="addUser" value="S'inscrire" />
                        </div>
                </form>
        </div>
        <div>
                <p><a href="../index.php">Revenir à la page d'accueil</a></p>
        </div>
</div>
<?php $contents = ob_get_clean(); ?>

<?php require('template.php'); ?>