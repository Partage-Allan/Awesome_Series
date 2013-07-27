<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
        <link rel="stylesheet" href="./css/awesome_series.css"/>
         <?php 
            require ('./commun/include/template.php');
            require ('./commun/include/sql.inc.php');
            require ('commun/include/param.php');
         ?>
        <title>Aw3s0me Séries</title>
    </head>
    <body>
        <?php afficher_header();?>
            <p id="fil_d_ariane"><a href="index.php">Accueil</a> > <a href="search.php">Inscription validée</a></p>
        <?php
            // On reçoit via le lien cliqué dans le mail les variables de compte 
            $login = $_GET['login'];
            $nom = $_GET['nom'];
            $prenom = $_GET['prenom'];
            $email = $_GET['email'];
            $password = $_GET['password'];
            $avatar = $_GET['avatar'];
            
            // On créer l'utilisateur en base de données
            $requete = "INSERT INTO user VALUES ('','$login','$nom','$prenom','$email','$password', '$avatar')";
            $resultat = executer_requete($requete);
            echo "Bienvenue sur Awesome Séries!<br>";
            echo "Nous vous remercions pour la validation de votre compte.<br>";
            echo"<a href='$myBeginUrl/index.php'>Retour acceuil</a>"; 


        ?>      
    </body>
    <?php afficher_footer();?>
</html>        
