<?php
session_start();
if (!isset($_SESSION['login'])) {
    header ('Location: index.php');
    exit();
}
?>
<?php
        if(!empty($_POST))
        {
            extract($_POST);
            
            if(isset($newNom) | isset($newPrenom))
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

                            $requeteMaj = "UPDATE user SET ";
                            if($newNom != '')
                                $requeteMaj .= "nom = '$newNom' "; 
                            
                            if ($newPrenom != '')
                                $requeteMaj .= ",prenom = '$newPrenom' ";
                            
                            if ($erreur3 == true)
                                $requeteMaj.= ", avatar = '$newAvatar'";
                            $requeteMaj .= " WHERE login = '" . $_SESSION['login'] . "'";
                            $resultatMaj = executer_requete($requeteMaj);
                        }
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
        <?php afficher_header();?>
            <div id="contenu">          
                <form method="post" action="cmpt_infos.php" class="cmpt_param_gauche">
                    <p>Gestion dde vos Informations:</p>
                    <div class="form_gauche">
                        <label>Nom: </label>
                        <input name="newNom" type="text" id="newNom" />
                    </div>
                    <div class="form_gauche">
                        <label>Prénom :</label>
                        <input name="newPrenom" type="text" id="newPrenom" />
                    </div>
                    <div class="form_gauche">
                        <label for="newAvatar">Avatar (max 1 Mo)</label>
                        <input type="hidden" name="MAX_FILE_SIZE" value="1048576" />
                        <input name="newAvatar" type="file" id="newAvatar" />
                    </div>
                    <input type="submit" value="Valider" id="submit_infos" class="boutton"/>
                </form>
                <p class="etoile">* Champs obligatoire</p>
            </div>
        <?php afficher_footer();?>
        
    </body>
</html>