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
        <?php afficher_header();
            $login = $_GET['login'];
            $nom = $_GET['nom'];
            $prenom = $_GET['prenom'];
            $email = $_GET['email'];
            $password = $_GET['password'];
            
            $requete = "INSERT INTO user VALUES ('','$login','$nom','$prenom','$email','$password')";
            executer_requete($requete);
            echo "Bienvenue sur Awesome Séries!<br>";
            echo "Nous vous remercions pour la validation de votre compte.<br>";
            echo"<a href='https://localhost:8080/awesome/index.php'>Retour acceuil</a>"; 
        ?>      
    </body>
    <?php afficher_footer();?>
</html>        
