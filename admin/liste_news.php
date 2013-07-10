<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" >
   <head>
       <meta charset="UTF-8"/>
       <link rel="stylesheet" href="../css/awesome_series.css"/>
       <?php require ('../template.php');?>
       <?php require ('../commun/sql.inc.php');?>
   </head>
     
    <body>
    <?php afficher_header();?>
        <h2><a href="rediger_news.php">Ajouter une news</a></h2>
        <?php
          $requete = "SELECT * FROM news";
          $reponse =  executer_requete($requete);
          while ($donnees = $reponse->fetch())
          {
                $id_news = $donnees['id_news'];
                $titre_news =  $donnees['titre_news'];
                $contenu_news =  $donnees['contenu_news'];
                echo  $id_news . '<br>' . $titre_news . '<br>' . $contenu_news .'<br>';
          }  
         ?>
    </body>
</html>