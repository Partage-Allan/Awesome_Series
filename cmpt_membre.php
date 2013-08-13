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

            $id_user = $_SESSION['id_user'];
            $login = $_SESSION['login'];
            $nom = $_SESSION['nom'];
            $prenom = $_SESSION['prenom'];
            $email = $_SESSION['email'];
            $avatar = $_SESSION['avatar'];
            $pseudo = $_SESSION['login'];
            $password = $_SESSION['password'];
            $nbSeriesVues = $_SESSION['nbSeriesVues'];
            $nbCommentaires = $_SESSION['nbCommentaires'];
        ?>
        <p id="fil_d_ariane"><a href="index.php">Accueil</a> > <a href="cmpt_membre.php">Mon compte</a></p>
        <p class="bienvenue">Bienvenue <b><?php echo trim($pseudo); ?>!</b></p>
        <h1 class="inscription">Mon compte</h1>
        <div id="wrapper">  
            <ul id="nav">  
                <li><a href="cmpt_membre.php">Mon profil</a></li>  
                <li><a href="cmpt_securite.php?modif=password">Mon Password</a></li>
                <li><a href="cmpt_securite.php?modif=email">Mon email</a></li> 
                <li><a href="cmpt_mes_series.php">Mes Séries</a></li>  
                <li><a href="cmpt_commentaires.php">Mes Commentaires</a></li>   
            </ul>  
            <div id="contenu">
                <?php
                    // On vérifie si la page appelante contient la variable "modif" et qu'elle vaut la valeur "true"
                    // Si oui, c'est qu'on a cliqué sur le lien de modification des Infos Utilisateur, on affiche le formulaire
                    if(isset($_GET['modif']) && $_GET['modif'] == "true")
                    {
                        printf('<form method="post" action="cmpt_membre.php" class="cmpt_param_gauche" enctype = "multipart/form-data">');
                           printf('<p>Gestion de vos Informations :</p>');
                            printf('<div class="form_gauche">');
                                printf('<label>Nom :</label>');
                                printf('<input name="newNom" type="text" id="newNom" />');
                            printf('</div>');
                            printf('<div class="form_gauche">');
                                printf('<label>Prénom :</label>');
                                printf('<input name="newPrenom" type="text" id="newPrenom" />');
                            printf('</div>');
                            printf('<div class="form_gauche">');
                                printf('<label for="newAvatar">Avatar (max 1 Mo)</label>');
                                printf('<input type="hidden" name="MAX_FILE_SIZE" value="1048576" />');
                                printf('<input name="newAvatar" type="file" id="newAvatar" />');
                            printf('</div>');
                            printf('<input type="submit" value="Valider" id="submit_infos" class="boutton"/>');
                        printf('</form>');
                    }
                    
                    // Sinon, on affiche la page d'infos standard du compte
                    else
                    {
                        printf("<p class='texte_mon_compte'>Affichage Pseudo, Prénom, E-mail, Avatar, nbre séries/nbre comms ... pas de champs puisque c'est juste une page d'infos générales sur le compte.<br/><br/>");
                        printf("Avatar : <img class='img_avatar' src='./avatar/$avatar' /><br/><br/>");
                        printf("Nom : $nom <br/><br/>");
                        printf("Prénom : $prenom <br/><br/>");
                        printf("Pseudo : $pseudo <br/><br/>");
                        printf("Adresse e-mail : $email <br/><br/>");
                        printf("Nombre de séries marquées :  $nbSeriesVues séries marquées<br/><br/>");
                        printf("Nombre de commentaires : $nbCommentaires commentaires<br/></p>");
                        printf('<a href="cmpt_membre.php?modif=true">Modifier mes Infos</a>');
                    }

                    if(!empty($_POST))
                    {
                        // On récupère les variables POST
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
                        if(isset($newEmail))
                        {
                            // Si les 2 mail ne correspondent pas
                            if($newEmail != $checkNewEmail)
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
                        
                        // Sinon on vérifie si on vient de la page de modification des Infos Utilisateur
                        if($newNom != '')
                        {
                            $requeteMajNom = "UPDATE user SET nom = '$newNom' WHERE login = '" . $_SESSION['login'] . "'";
                            $resultatMajNom = executer_requete($requeteMajNom);
                            $_SESSION['nom'] = $newNom;
                            $message = 'Nom';
                        }
                        if($newPrenom != '')
                        {
                            $requeteMajPrenom = "UPDATE user SET prenom = '$newPrenom' WHERE login = '" . $_SESSION['login'] . "'";
                            $resultatMajPrenom = executer_requete($requeteMajPrenom);
                            $_SESSION['prenom'] = $newPrenom;
                            if(isset($message))
                                $message .= ', Prénom';
                            else
                                $message = 'Prénom';
                        }
                        if($_FILES['newAvatar']['error'] == 0)
                        {
                            if ($_FILES['newAvatar']['error'] > 0)
                                $erreur = true;
                            else
                                $erreur = false;

                            $tailleMax = UPLOAD_ERR_FORM_SIZE;
                            if ($_FILES['newAvatar']['size'] > $tailleMax) 
                                $erreur2 = true;
                            else
                                $erreur2 = false;

                            $extensions_valides = array( 'jpg' , 'jpeg' , 'gif' , 'png' );
                            $extension_upload = strtolower(  substr(  strrchr($_FILES['newAvatar']['name'], '.')  ,1)  );
                            if ( in_array($extension_upload,$extensions_valides) )
                            {
                                $erreur3 = true;

                                $nameAvatar = strstr($_FILES['newAvatar']['name'], '.', true);
                                if ($erreur == false && !$erreur2 == false && $erreur3 == true)
                                    $avatarName = $nameAvatar . "-" . $login . "." . $extension_upload; 
                                $avatar = $nameAvatar . "-" . $login;

                                $destination = "./avatar/$avatarName";
                                $resultat = move_uploaded_file($_FILES['newAvatar']['tmp_name'], $destination);
                            }
                            else
                                $erreur3 = false;
                            
                            if($erreur == true || $erreur2 == false || $erreur3 == false)
                            {
                                echo '<script type="text/javascript">alert("Désolé, votre Avatar est invalide.")</script>';
                            }
                            
                            else
                            {
                                $requeteMajAvatar = "UPDATE user SET ";
                                if ($erreur3 == true)
                                    $requeteMajAvatar.= "avatar = '$avatarName'";
                                $requeteMajAvatar .= " WHERE login = '" . $_SESSION['login'] . "'";
                                $resultatMajAvatar = executer_requete($requeteMajAvatar);
                                $_SESSION['avatar'] = $avatarName;
                                
                                if(isset($message))
                                    $message .= ', Avatar';
                                else
                                    $message = 'Avatar';
                                
                            }
                        }
                        if(isset($message))
                            echo '<script type="text/javascript">alert("' . $message . ' mis à jour.")</script>';
                    }
                    
                    // On regarde si le bouton javascript de delete series tagguées a été appuyé et renvoie donc l'ID de la série tagguée à supprimer
                    if (isset($_GET['id_tagg']))
                    {
                        $id_serie_tagg = $_GET['id_tagg'];
                        // On delete le tagg de la série cliquée
                        $requeteDeleteTagg = "DELETE FROM series_vues WHERE id_series_vues = '" . $id_serie_tagg . "'"; 
                        $execRequeteDelete = executer_requete($requeteDeleteTagg);
                        // On réduit le nombre de séries vues de 1
                        $_SESSION['nbSeriesVues'] -= 1;
                        // On redirige sur la page de compte sans variable URL
                        header ('Location: cmpt_membre.php');
                    }
                    ?>
            </div>
        </div>
        <?php afficher_footer();?>
    </body>
</html>