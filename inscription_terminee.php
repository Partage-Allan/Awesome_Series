<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
        <link rel="stylesheet" href="./css/awesome_series.css"/>
         <?php require ('template.php');?>
         <?php require ('commun/sql.inc.php');?>
        <title>Aw3s0me Séries</title>
    </head>
    <body>
        <?php afficher_header();

        echo "Bienvenue sur Awesome Séries,<br>";
              echo "Votre inscription a bien été prise en compte<br>";
              echo "Un email de verification vous a été envoyé à l'adresse suivante : " . $email . "<br>";
              echo "Veuillez consulter votre messagerie afin de valider votre compte.<br>";
              echo"<a href='https://localhost/awesome/index.php'>Retour acceuil</a>"; 
        ?>      
        </body>
    <?php afficher_footer();?>
</html>        
