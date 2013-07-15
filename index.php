<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
        <link rel="stylesheet" href="./css/awesome_series.css"/>
         <?php 
         require ('commun/include/template.php');
         require ('commun/include/sql.inc.php');
         ?>
        <title>Aw3s0me Séries</title>
    </head>
    <body>
        <?php afficher_header();?>
        <section>
            <p id="fil_d_ariane"><a href="index.php">Accueil</a></p>
            <?php
                $requete = "SELECT * FROM news";
                $reponse =  executer_requete($requete);
                while ($donnees = $reponse->fetch())
                {
                      $titre_news =  $donnees['titre_news'];
                      $contenu_news =  $donnees['contenu_news'];
                      echo  $titre_news . '<br>' . $contenu_news .'<br><br/>';
                }  
         ?> 
        </section>    
    </body>
    <?php afficher_footer();?>
</html>   
