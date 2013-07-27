<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
        <link rel="stylesheet" href="./css/awesome_series.css"/>
        <?php
        require ('./commun/include/template.php');
        require ('./commun/include/sql.inc.php');
        
        include_once ('./commun/include/function.php');
        ?>

        <title>Aw3s0me Séries</title>
    </head>
    <body>
        <?php
        afficher_header();
        if (!empty($_POST)) {
            // On récupère le login et le passe entré par l'utilisateur
            extract($_POST);
            // On chiffre le mot de passe
            $password = $_POST['password'];
            $login = $_POST['login'];
            // On cherche le mot de passe correspondant au login en base
            $requete = ("SELECT * FROM user WHERE login ='$login'");
            $reponse = executer_requete($requete);
            while ($donnees = $reponse->fetch()) {
                // On vérifie si le mot de passe entrée et celui en base sont identique
                $verifPassword = $donnees['password'];
                debug ('ma requete',$donnees,0);
                // Si différent, on affiche l'erreur
                if ($password != $verifPassword){
                    echo '<script type="text/javascript">alert("Login ou mot de passe incorrect!")</script>';
                $affFormulaire = 1;
                }
                // Sinon, on démarre une session avec le login, et on redirige l'utilisateur vers la page d'accueil connecté.
                else {
                    $affFormulaire = 0;
                    $_SESSION['login'] = $donnees['login'];
                    $_SESSION['nom'] = $donnees['nom'];
                    $_SESSION['prenom'] = $donnees['prenom'];
                    $_SESSION['email'] = $donnees['email'];
                    $_SESSION['password'] = $donnees['password'];
                    $_SESSION['avatar'] = $donnees['avatar'];
                    debug ('ma SESSION',$_SESSION,0);
                    header('Location: index.php');
                    exit();
                }
            }
        }
        if (empty($_POST) || $affFormulaire == 1) {
            ?>
            <p id="fil_d_ariane"><a href="index.php">Accueil</a> > <a href="login.php">Connexion</a></p>
            <form method="POST" action="login.php">
                <div class="content_form">
                    <label>Login</label>
                    <input name="login" type="text" id="login" value ="<?php if (isset($_POST['login'])) echo ($_POST['login']); ?>" required placeholder="Entrez votre login" pattern="^[A-Za-z0123456789-_/-]+"/>
                </div>
                <div class="content_form">
                    <label>Mot de passe</label>
                    <input name="password" type="password" id="password" required placeholder="Entrez un mot de passe"/>
                </div>
                <input type="submit" value="valider" name="submit"/>
            </form>
            <a href="inscription.php"><p class="register_yet">Vous n'avez pas encore de compte?</p><p class="register"> Créer un Compte?</p></a>
        <?php
        }
        afficher_footer();
        ?>    
    </body>

</html>     
