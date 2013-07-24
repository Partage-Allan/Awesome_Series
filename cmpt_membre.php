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
            $requeteInfo = "SELECT * FROM user WHERE login = '" . $_SESSION['login'] . "'";
            $repRequeteInfo = executer_requete($requeteInfo);
            while ($donneesInfo = $repRequeteInfo->fetch())
            {
                $nom = $donneesInfo['nom'];
                $prenom = $donneesInfo['prenom'];
                $email = $donneesInfo['email'];
                $avatar = $donneesInfo['avatar'];
                $pseudo = $_SESSION['login'];
            }
            $repRequeteInfo->closeCursor();
            
        ?>
        <p id="fil_d_ariane"><a href="index.php">Accueil</a> > <a href="cmpt_membre.php">Mon compte</a></p>
        <p class="bienvenue">Bienvenue <b><?php echo trim($_SESSION['login']); ?>!</b></p>
        <h1 class="inscription">Mon compte</h1>
        <div id="wrapper">  
            <ul id="nav">  
                <li><a href="cmpt_membre.php">Mon profil</a></li>  
                <li><a href="cmpt_password.php">Mes paramètres</a></li>  
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
                        extract($_POST);
                        $login = $_SESSION['login'];
                        // On vérifie s'il y a déjà une utilisateur avec le meme email en base
                        $verifEmail = ("SELECT COUNT(*) AS nbr2 FROM user WHERE email = '$email'");
                        $rep2 = executer_requete($verifEmail);
                        while ($donnees2 = $rep2->fetch())
                        {
                            // Si email déjà pris, affichage d'erreur
                            if($donnees2['nbr2'] > 0)
                                echo '<script type="text/javascript">alert("Cet Email est déjà utilisé!")</script>';
                            // Sinon, tout est bon, on modifie les infos utilisateurs
                            else
                            {
                                if ($_FILES['avatar']['error'] > 0)
                                    $erreur = true;
                                else
                                    $erreur = false;

                                $tailleMax = UPLOAD_ERR_FORM_SIZE;
                                if ($_FILES['avatar']['size'] > $tailleMax) 
                                    $erreur2 = true;
                                else
                                    $erreur2 = false;

                                $extensions_valides = array( 'jpg' , 'jpeg' , 'gif' , 'png' );
                                $extension_upload = strtolower(  substr(  strrchr($_FILES['avatar']['name'], '.')  ,1)  );
                                if ( in_array($extension_upload,$extensions_valides) )
                                {
                                    $erreur3 = true;

                                    $nameAvatar = strstr($_FILES['avatar']['name'], '.', true);
                                    if ($erreur == false && !$erreur2 == false && $erreur3 == true)
                                        $avatarName = $nameAvatar . "-" . $login . "." . $extension_upload; 
                                    $avatar = $nameAvatar . "-" . $login;

                                    $destination = "./avatar/$avatarName";
                                    $resultat = move_uploaded_file($_FILES['avatar']['tmp_name'], $destination);
                                }
                                else
                                    $erreur3 = false;

                                $requeteMaj = "UPDATE user SET nom = '$nom', prenom = '$prenom', email = '$email'";
                                if ($erreur3 == true)
                                    $requeteMaj.= ", avatar = '$avatar'";
                                $requeteMaj .= " WHERE login = '$login'";
                                $resultatMaj = executer_requete($requeteMaj);
                                
                                
                                
                                
                                
                                echo '<script type="text/javascript">alert("Mise à jour de votre Compte effectuée.")</script>';
                            }
                        }
                        $rep2->closeCursor();
                    }
                    ?>
            </div>
        </div>
        <?php afficher_footer();?>
    </body>
</html>