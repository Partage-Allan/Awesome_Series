<?php
session_start();
if (!isset($_SESSION['login'])) {
    header ('Location: index.php');
    exit();
}
?>

<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
        <link rel="stylesheet" href="./css/awesome_series.css"/>
        <script type="text/javascript" src="./commun/javascript/function.js"></script>
         <?php
            require ('./commun/include/template.php');
            require ('./commun/include/sql.inc.php');
         ?>
        <title>Aw3s0me Séries</title>
    </head>

    <body>
        <?php afficher_header();?>
        <p id="fil_d_ariane"><a href="index.php">Accueil</a> > <a href="cmpt_membre.php">Mon compte</a></p>
        <p class="bienvenue">Bienvenue <b><?php echo trim($_SESSION['login']); ?>!</b></p>
        <p>Infos compte: pseudo, date d'inscription, last action, avatar... </p><br/>
        <h1 class="inscription">Mon compte</h1>
        <p>Gestion du compte</p>
        <form method="post" action="cmpt_membre.php" id="cmpt_membre_gauche">
            <div class="form_gauche">
                <label>Mot de passe actuel:</label>
                <input name="passActuel" type="password" id="pass" required />
            </div>
            <div class="form_gauche">
                <label>Nouveau mot de passe:</label>
                <input name="newPass" type="password" id="newPass" required />
            </div>
            <div class="form_gauche">
                <label>Retaper mot de passe:</label>
                <input name="checkNewPass" type="password" id="checkNewPass" oninput="verifPass()" required />
            </div>
            <div class="form_gauche">
                <label>Modifier avatar:</label>
                <input name="avatar" type="text" id="avatar"  />
            </div>
            <input type="submit" value="Valider" id="submit" class="boutton"/>
        </form> 
        <?php
            // Formulaire de mise à jour du mot de passe
            if(!empty($_POST))
            {
                extract($_POST);
                $login = trim($_SESSION['login']);
                // Vérification du mot de passe actuel
                $requetePass = "SELECT * FROM user WHERE login = '" . $login . "'";
                $execRequete = executer_requete($requetePass);
                while($donnees = $execRequete->fetch())
                {
                    $pass = $donnees['password'];
                }
                $execRequete->closeCursor();
                
                $passActuel = md5($passActuel);
                // Si mot de passe actuel faux, affichage de l'erreur
                if($pass != $passActuel)
                    echo '<script type="text/javascript">alert("Mauvais mot de passe actuel")</script>';
                // Sinon mise à jour du mot de passe avec le nouveau entré
                else
                {
                    $newPass = md5($newPass);
                    $updatePass = "UPDATE user SET password = '" . $newPass . "'";
                    $execRequete = executer_requete($updatePass);
                    echo '<script type="text/javascript">alert("Mot de passe mis à jour!")</script>';
                }
            }
        ?>
          <p class="profil">Profil</p>
        <?php
            // On récupère l'ID de l'utilisateur afin d'ensuite aller chercher les séries qu'il a tagg
            $recupIdUser = "SELECT id_user FROM user WHERE login = '" . $_SESSION['login'] . "'";
            $execRequeteId = executer_requete($recupIdUser);
            while ($donnees = $execRequeteId->fetch())
            {
                $id_user = $donnees['id_user'];
            }
            $execRequeteId->closeCursor();
            
            // On récupère ses séries tagguées
            $recupSerie = "SELECT * FROM series_vues WHERE user_id_user = '" . $id_user . "'";
            $execRequete = executer_requete($recupSerie);
            $i = 0;
            
            printf('<form method="post" action="" id="cmpt_membre_droite">');
                printf('<div class="form_droite">');
                    printf('<label>Vos Séries que vous avez Tagguées :</label><br />');
            
            // On créer un tableau qui contiendra les affichages des séries trouvées
            while ($donnees2 = $execRequete->fetch())
            {
                $id_tagg[$i] = $donnees2['id_series_vues'];
                $id_serie[$i] = $donnees2['serie_id_serie'];
                
                // On va chercher le nom des series correspondant aux id_series trouvés dans les tagg
                $recupNomSerie = "SELECT titre_serie FROM serie WHERE id_serie = '" . $id_serie[$i] . "'";
                $execRequete2 = executer_requete($recupNomSerie);
                while ($donnees3 = $execRequete2->fetch())
                {
                    // On affiche chaque séries de notre tableau ainsi qu'une image qui servira de bouton de suppression en javascript
                    $nom_serie[$i] = $donnees3['titre_serie'];
                    printf('<label class="titre_serie">' . $nom_serie[$i] . ' </label>');
                    printf('<img src="./images/croix_annulation.png" name="delete_tag" class="delete_tag" onclick="deleteTagg(' . $id_tagg[$i] . ')" /><br />');
                }
                ++$i;
            }
                printf('</div>');
            printf('</form>');
            
            $execRequete->closeCursor();
            $execRequete2->closeCursor();
            
            // On regarde si le bouton javascript a été appuyé et renvoie donc l'ID de la série tagguée à supprimer
            if (isset($_GET['id_tagg']))
            {
                $id_serie_tagg = $_GET['id_tagg'];
                // On delete le tagg de la série cliquée
                $requeteDeleteTagg = "DELETE FROM series_vues WHERE id_series_vues = '" . $id_serie_tagg . "'"; 
                $execRequeteDelete = executer_requete($requeteDeleteTagg);
                // On redirige sur la page de compte sans variable URL
                header ('Location: cmpt_membre.php');
            }
        ?>
        <p class="etoile">* Champs obligatoire</p>
        <?php afficher_footer();?>
    </body>
</html>