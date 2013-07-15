<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
        <link rel="stylesheet" href="./css/awesome_series.css"/>
        <?php 
            require ('./commun/include/template.php');
            require ('./commun/include/sql.inc.php');
        ?>

        <title>Aw3s0me Séries</title>
    </head>
    <body>
        <?php afficher_header();?>
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
        <p>Vous n'avez pas encore de compte?<a class="register" href="inscription.php">Créer un Compte?</a></p>
    </body>
        <?php 
        afficher_footer();
        
        if(!empty($_POST))
        {
            // On récupère le login et le passe entré par l'utilisateur
            extract($_POST);
            // On chiffre le mot de passe
            $password = md5($password);
            // On cherche le mot de passe correspondant au login en base
            $requete =("SELECT password FROM user WHERE login ='$login'");
            $reponse = executer_requete($requete);
            while ($donnees = $reponse->fetch())
            {
                // On vérifie si le mot de passe entrée et celui en base sont identique
                $verifPassword = $donnees['password'];
                // Si différent, on affiche l'erreur
                if ($password != $verifPassword)
                    echo '<script type="text/javascript">alert("Login ou mot de passe incorrect!")</script>';
                // Sinon, on démarre une session avec le login, et on redirige l'utilisateur vers la page d'accueil connecté.
                else
                {
                    session_start();
                    $_SESSION['login'] = $login;
                    header('Location: index.php');
                    exit();
                }
            }
                
        }
        ?>
</html> 
