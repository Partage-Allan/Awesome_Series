<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
        <link rel="stylesheet" href="./css/awesome_series.css"/>
        <script type="text/javascript" src="./commun/javascript/function.js"></script>
         <?php 
            require ('commun/include/template.php');
            require ('commun/include/sql.inc.php');
         ?>
        <title>Aw3s0me Séries</title>
    </head>
    <body>
        <?php afficher_header();?>
        <h1 class="inscription">Inscription</h1>
        <form method="post" action="formulaire.php" id="formulaire">
            <div class="content_form">
                <label>Login</label>
                <input name="login" type="text" id="login" required placeholder="Choisissez votre login" pattern="^[A-Za-z0123456789-_/-]+" value ="<?php if (isset($_POST['login'])) echo ($_POST['login']); ?>"/>
            </div>
            <div class="content_form">
                <label>Nom</label>
                <input name="nom" type="text" id="nom" required placeholder="Entrez votre nom" pattern="[A-Za-z]+" value ="<?php if (isset($_POST['nom'])) echo ($_POST['nom']); ?>"/>
            </div>
            <div class="content_form">
                <label>Prénom</label>
                <input name="prenom" type="text" id="prenom" required placeholder="Entrez votre prénom"pattern="[A-Za-z]+" value ="<?php if (isset($_POST['prenom'])) echo ($_POST['prenom']); ?>"/>
            </div>
            <div class="content_form">
                <label>E-mail</label>
                <input name="email" type="email" id="email" required oninput='verifMail()' placeholder="adresse@mail.com" value ="<?php if (isset($_POST['email'])) echo ($_POST['email']); ?>"/>
            </div>
            <div class="content_form">
                <label>Vérification e-mail</label>
                <input name="confirmemail" type="email" id="confirmemail" required oninput='verifMail()' placeholder="Confirmez votre e-mail" value ="<?php if (isset($_POST['confirmemail'])) echo ($_POST['confirmemail']); ?>"/>
            </div>
            <div class="content_form">
                <label>Mot de passe</label>
                <input name="password" type="password" id="password" required oninput='verifPass()' placeholder="Entrez un mot de passe" value ="<?php if (isset($_POST['password'])) echo ($_POST['password']); ?>"/>
            </div>
            <div class="content_form">
                <label>Vérification mot de passe</label>
                <input name="confirmpassword" type="password" id="confirmpassword" required oninput='verifPass()' placeholder="Validez mot de passe" value ="<?php if (isset($_POST['confirmpassword'])) echo ($_POST['confirmpassword']); ?>"/>
            </div>
            <input type="submit" value="Valider" id="submit" class="boutton"/>
        </form>
        <?php 
        if(!empty($_POST))
        {
            extract($_POST);
            
            $verifLogin = ("SELECT COUNT(*) AS nbr1 FROM user WHERE login = '$login'");
            $rep1 = executer_requete($verifLogin);
            
            $verifEmail = ("SELECT COUNT(*) AS nbr2 FROM user WHERE email = '$email'");
            $rep2 = executer_requete($verifEmail);
            while ($donnees = $rep1->fetch())
            {
                if($donnees['nbr1'] > 0)
                {
                    echo '<script type="text/javascript">alert("Ce Login est déjà utilisé!")</script>';
                }
                else
                {
                    while ($donnees2 = $rep2->fetch())
                    {
                        if($donnees2['nbr2'] > 0)
                            echo '<script type="text/javascript">alert("Cet Email est déjà utilisé!")</script>';
                        else
                        {
                            $password = md5($password);
                            
                            $to = $email;
                            $sujet = "Demande d'inscription Awesome Series";
                            $entete = "Email de: Awesome Serie : <br>";
                            $entete .= "Votre inscription a bien été prise en compte <br>";
                            $entete .= 'Pour valider votre inscription à Awesome Séries cliquez sur le lien ci-dessous <br><br>';
                            $entete .= "<a href='http://localhost:8080/Awesome_Series/inscription_terminee.php?login=";
                            $entete .= $login;
                            $entete .= "&email=";
                            $entete .= $email;
                            $entete .= "&nom=";
                            $entete .= $nom;
                            $entete .= "&prenom=";
                            $entete .= $prenom;
                            $entete .= "&password=";
                            $entete .= $password;
                            $entete .= "'>Cliquez ici!</a> <br>";
                            
                            mail($to, $sujet, $entete, "Content-type: text/html");
                            
                            echo '<script type="text/javascript">alert("Votre compte est en attente de validation. \n Cliquez sur le lien dans votre email pour valider celui-ci.")</script>';
                        }
                    }
                }
            }
            $rep1->closeCursor();
            $rep2->closeCursor();
        }
        ?>
    </body>
    <?php afficher_footer();?>
</html>        