<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
        <link rel="stylesheet" href="./css/awesome_series.css"/>
        <script type="text/javascript" src="./commun/javascript/function.js"></script>
        <?php
        require ('commun/include/template.php');
        require ('commun/include/sql.inc.php');
        require ('commun/include/param.php');
        ?>
        <title>Aw3s0me Séries</title>
    </head>
    <body>
        <?php afficher_header(); ?>
        <p id="fil_d_ariane"><a href="index.php">Accueil</a> > <a href="inscription.php">Series</a></p>
        <h1 class="inscription">Inscription</h1>

        <?php
        $afficherFormulaire = 0;
        if (!empty($_POST)) {
            
            extract($_POST);
            // On vérifie s'il y a déjà un utilisateur avec le meme login en base
            $verifLogin = ("SELECT COUNT(*) AS nbr1 FROM user WHERE login = '$login'");
            $rep1 = executer_requete($verifLogin);

            // On vérifie s'il y a déjà une utilisateur avec le meme email en base
            $verifEmail = ("SELECT COUNT(*) AS nbr2 FROM user WHERE email = '$email'");
            $rep2 = executer_requete($verifEmail);
            while ($donnees = $rep1->fetch()) {
                // Si login déjà pris, affichage d'erreur
                if ($donnees['nbr1'] > 0) {
                    echo '<script type="text/javascript">alert("Ce Login est déjà utilisé!")</script>';
                    $afficherFormulaire = 1;
                }
                // Sinon on continue pour check l'email
                else {
                    while ($donnees2 = $rep2->fetch()) {
                        // Si email déjà pris, affichage d'erreur
                        if ($donnees2['nbr2'] > 0) {
                            echo '<script type="text/javascript">alert("Cet Email est déjà utilisé!")</script>';
                            $afficherFormulaire = 1;
                        }
                        // Sinon, tout est bon, on creer le mail de validation, avec le lien comportant les variables de l'utilisateur

                        if ($_FILES['avatar']['error'] > 0) {
                            $erreur = true;
                        } else {
                            $erreur = false;
                        }

                        $tailleMax = UPLOAD_ERR_FORM_SIZE;
                        if ($_FILES['avatar']['size'] > $tailleMax) {
                            $erreur2 = true;
                        } else {
                            $erreur2 = false;
                        }

                        $extensions_valides = array('jpg', 'jpeg', 'gif', 'png');
                        $extension_upload = strtolower(substr(strrchr($_FILES['avatar']['name'], '.'), 1));
                        if (in_array($extension_upload, $extensions_valides))
                            $erreur3 = true;

                        $nameAvatar = strstr($_FILES['avatar']['name'], '.', true);
                        if ($erreur == false && !$erreur2 == false && $erreur3 == true)
                            $avatarName = $nameAvatar . "-" . $login . "." . $extension_upload;
                        $avatar = $nameAvatar . "-" . $login;
                        //$password = md5($password);
                        if ($afficherFormulaire != 1) {
                            $to = $email;
                            $sujet = "Demande d'inscription Awesome Series";
                            $entete = "Email de: Awesome Serie : <br>";
                            $entete .= "Votre inscription a bien été prise en compte <br>";
                            $entete .= 'Pour valider votre inscription à Awesome Séries cliquez sur le lien ci-dessous <br><br>';
                            $entete .= "<a href='$myBeginUrl/inscription_terminee.php?login=";
                            $entete .= $login;
                            $entete .= "&email=";
                            $entete .= $email;
                            $entete .= "&nom=";
                            $entete .= $nom;
                            $entete .= "&prenom=";
                            $entete .= $prenom;
                            $entete .= "&password=";
                            $entete .= $password;
                            $entete .= "&avatar=";
                            $entete .= $avatar;
                            $entete .= "'>Cliquez ici!</a> <br>";
                            echo $entete;

                            //mail($to, $sujet, $entete, "Content-type: text/html");

                            $destination = "./avatar/$avatarName";
                            $resultat = move_uploaded_file($_FILES['avatar']['tmp_name'], $destination);

                            //echo '<script type="text/javascript">alert("Votre compte est en attente de validation. \n Cliquez sur le lien dans votre email pour valider celui-ci.")</script>';
                        }
                    }
                }
            }
            $rep1->closeCursor();
            $rep2->closeCursor();
        }

        if (($afficherFormulaire == 1) || (empty($_POST))) {
            ?>

            <form method = "post" action = "inscription.php" id = "formulaire" enctype = "multipart/form-data">
                <div class = "content_form">
                    <label for = "login">Login</label>
                    <input name = "login" type = "text" id = "login" required placeholder = "Choisissez votre login" pattern = "^[A-Za-z0123456789-_/-]+" value = "<?php if (isset($_POST['login'])) echo ($_POST['login']); ?>"/>
                </div>
                <div class = "content_form">
                    <label for = "nom">Nom</label>
                    <input name = "nom" type = "text" id = "nom" required placeholder = "Entrez votre nom" pattern = "[A-Za-z]+" value = "<?php if (isset($_POST['nom'])) echo ($_POST['nom']); ?>"/>
                </div>
                <div class = "content_form">
                    <label for = "prenom">Prénom</label>
                    <input name = "prenom" type = "text" id = "prenom" required placeholder = "Entrez votre prénom"pattern = "[A-Za-z]+" value = "<?php if (isset($_POST['prenom'])) echo ($_POST['prenom']); ?>"/>
                </div>
                <div class = "content_form">
                    <label for = "email">E-mail</label>
                    <input name = "email" type = "email" id = "email" required oninput = 'verifMail()' placeholder = "adresse@mail.com" value = "<?php if (isset($_POST['email'])) echo ($_POST['email']); ?>"/>
                </div>
                <div class = "content_form">
                    <label for = "confiremail">Vérification e-mail</label>
                    <input name = "confirmemail" type = "email" id = "confirmemail" required oninput = 'verifMail()' placeholder = "Confirmez votre e-mail" value = "<?php if (isset($_POST['confirmemail'])) echo ($_POST['confirmemail']); ?>"/>
                </div>
                <div class = "content_form">
                    <label for = "password">Mot de passe</label>
                    <input name = "password" type = "password" id = "password" required oninput = 'verifPass()' placeholder = "Entrez un mot de passe" value = "<?php if (isset($_POST['password'])) echo ($_POST['password']); ?>"/>
                </div>
                <div class = "content_form">
                    <label for = "confirmpassword">Vérification mot de passe</label>
                    <input name = "confirmpassword" type = "password" id = "confirmpassword" required oninput = 'verifPass()' placeholder = "Validez mot de passe" value = "<?php if (isset($_POST['confirmpassword'])) echo ($_POST['confirmpassword']); ?>"/>
                </div>
                <div class = "content_form">
                    <label for = "avatar">Avatar (max 1 Mo)</label>
                    <input type = "hidden" name = "MAX_FILE_SIZE" value = "1048576" />
                    <input name = "avatar" type = "file" id = "avatar" />
                </div>
                <input type = "submit" value = "Valider" id = "submit" class = "boutton"/>
            </form>
        </body>
    </html>        
    <?php
}

afficher_footer();
?>
