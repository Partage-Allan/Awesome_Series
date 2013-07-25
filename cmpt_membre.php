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
        <script type="text/javascript" src="./commun/javascript/jquery-1.10.2.js"></script>
        <script type="text/javascript" src="./commun/javascript/menu_mon_compte.js"></script>
         <?php
            require ('./commun/include/template.php');
            require ('./commun/include/sql.inc.php');
         ?>
        <title>Aw3s0me Séries</title>
    </head>

    <body>
        <?php 
            afficher_header();
            if(!isset($_SESSION['nom']))
            {
                $requeteInfo = "SELECT * FROM user WHERE login = '" . $_SESSION['login'] . "'";
                $repRequeteInfo = executer_requete($requeteInfo);
                while ($donneesInfo = $repRequeteInfo->fetch())
                {
                    // Récupération des infos utilisateurs + création des variables sessions 
                    $_SESSION['id_user'] = $id_user = $donneesInfo['id_user'];
                    $_SESSION['nom'] = $nom = $donneesInfo['nom'];
                    $_SESSION['prenom'] = $prenom = $donneesInfo['prenom'];
                    $_SESSION['email'] = $email = $donneesInfo['email'];
                    $_SESSION['avatar'] = $avatar = $donneesInfo['avatar'];
                    $_SESSION['password'] = $password = $donneesInfo['password'];
                    $pseudo = $_SESSION['login'];
                }
                $repRequeteInfo->closeCursor();
            }
            else
            {
               $id_user = $_SESSION['id_user'];
               $nom = $_SESSION['nom'];
               $prenom = $_SESSION['prenom'];
               $email = $_SESSION['email'];
               $avatar = $_SESSION['avatar'];
               $pseudo = $_SESSION['login'];
               $password = $_SESSION['password'];
            }
        ?>
        <p id="fil_d_ariane"><a href="index.php">Accueil</a> > <a href="cmpt_membre.php">Mon compte</a></p>
        <p class="bienvenue">Bienvenue <b><?php echo trim($pseudo); ?>!</b></p>
        <h1 class="inscription">Mon compte</h1>
        <div id="wrapper">  
            <ul id="nav">  
                <li><a href="cmpt_membre.php">Mon profil</a></li>  
                <li><a href="cmpt_password.php">Mon Password</a></li>
                <li><a href="cmpt_email.php">Mon email</a></li> 
                <li><a href="cmpt_mes_series.php">Mes Séries</a></li>  
                <li><a href="cmpt_commentaires.php">Mes Commentaires</a></li>   
            </ul>  
            <div id="contenu">  
                <p class="texte_mon_compte">Affichage Pseudo, Prénom, E-mail, Avatar, nbre séries/nbre comms ... pas de champs puisque c'est juste une page d'infos générales sur le compte.<br/><br/>
                Nom            : <?php echo ($nom); ?><br/><br/>
                Prénom         : <?php echo ($prenom); ?><br/><br/>
                Pseudo         : <?php echo ($pseudo); ?><br/><br/>
                Adresse e-mail : <?php echo ($email); ?><br/><br/>
                Avatar         : <?php echo ($avatar); ?><br/><br/>
                Nombre de séries marquées :  X séries marquées<br/><br/>
                Nombre de commentaires : X commentaires<br/></p> 
                
                   
                <!-- <div class="content_form">
                        <label for="avatar">Avatar (max 1 Mo)</label>
                        <input type="hidden" name="MAX_FILE_SIZE" value="1048576" />
                        <input name="avatar" type="file" id="avatar" />
                    </div>
                    <input type="submit" value="Valider" id="submit" class="boutton"/>
                -->
                
                <?php 
                    if(!empty($_POST))
                    {
                        // On récupère les variable POST
                        extract($_POST);
                        
                        // Si on arrive de la page de changement du mot de Pass
                        if(isset($passActuel))
                        {
                            // On récupère le mot de pass actuel entré.
                            $passActuel = md5($passActuel);
                            // Si mot de passe actuel faux, affichage de l'erreur
                            if($_SESSION['password'] != $passActuel)
                                echo '<script type="text/javascript">alert("Mauvais mot de passe actuel")</script>';
                            // Sinon On vérifie que le nouveau mot de pass voulu est bien entré correctement dans les 2 champs
                            else
                            {
                                // Si il est mal entré, affichage d'une erreur
                                if ($newPass != $checkNewPass)
                                    echo '<script type="text/javascript">alert("Les Password ne correspondent pas")</script>';
                                // Sinon, on modifie le mot de pass avec le nouveau pass voulu dans la BDD
                                else
                                {
                                    $newPass = md5($newPass);
                                    $updatePass = "UPDATE user SET password = '" . $newPass . "'";
                                    $execRequete = executer_requete($updatePass);
                                    $_SESSION['password'] = $newPass;
                                    
                                    echo '<script type="text/javascript">alert("Mot de passe mis à jour!")</script>';
                                }
                            }
                        }
                        
                        // Sinon, on vérifie si on vient de la page de changement de l'email
                        else
                        {
                            // Si on arrive de la page de changement de l'email
                            if (isset($newEmail))
                            {
                                // Si les 2 mail ne correspondent pas
                                if ($newEmail != $checkNewEmail)
                                    echo '<script type="text/javascript">alert("Les adresses Mail ne correspondent pas")</script>';
                                else
                                {
                                    $login = $_SESSION['login'];
                                    // On vérifie s'il y a déjà une utilisateur avec le meme email en base
                                    $verifEmail = ("SELECT COUNT(*) AS nbr2 FROM user WHERE email = '$newEmail'");
                                    $rep2 = executer_requete($verifEmail);
                                    while ($donnees2 = $rep2->fetch())
                                    {
                                        // Si email déjà pris, affichage d'erreur
                                        if($donnees2['nbr2'] > 0)
                                            echo '<script type="text/javascript">alert("Cet Email est déjà utilisé!")</script>';
                                        // Sinon, tout est bon, on modifie l'email
                                        else
                                        {
                                            $requeteMaj = "UPDATE user SET email = '$newEmail' WHERE login = '$login'";
                                            $resultatMaj = executer_requete($requeteMaj);
                                            $_SESSION['email'] = $newEmail;

                                            echo '<script type="text/javascript">alert("Mise à jour de votre Compte effectuée.")</script>';
                                        }
                                    }
                                    $rep2->closeCursor();
                                }
                            }
                        }
                    }
                    
                    // On regarde si le bouton javascript de delete series tagguées a été appuyé et renvoie donc l'ID de la série tagguée à supprimer
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
            </div>
        </div>
        <?php afficher_footer();?>
    </body>
</html>