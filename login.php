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
        <a class="register" href="inscription.php">Créer un Compte?</a>
    </body>
        <?php 
        afficher_footer();
        
        if(!empty($_POST))
        {
            extract($_POST);
            $password = md5($password); 
            $requete =("SELECT password FROM user WHERE login ='$login'");
            $reponse = executer_requete($requete);
            while ($donnees = $reponse->fetch())
            {
                $verifPassword = $donnees['password'];
                if ($password != $verifPassword)
                    echo '<script type="text/javascript">alert("Login ou mot de passe incorrect!")</script>';
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
