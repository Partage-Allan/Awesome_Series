<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" >
   <head>
       <title>Rédiger une news</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <link rel="stylesheet" href="../css/awesome_series.css"/>
        <?php 
            require ('../commun/include/template.php');
            require ('../commun/include/sql.inc.php');
         ?>
    </head>
    <body>
        <?php afficher_header();?>
            <h3><a href="liste_news.php">Retour à la liste des news</a></h3>
            <?php if (isset($_GET['modifier_news']))
            {
                $reponse= executer_requete('SELECT * FROM news WHERE id=\' ' . $_GET['modifier_news'] . '\'');
                $donnees = mysql_fetch_array($reponse);
                $titre_news = $donnees['titre'];
                $contenu_news = $donnees['contenu'];
                $id_news = $donnees['id_news'];
            }
            else
            {
                if(!empty($_POST))
                {
                    $titre_news = $_POST['titre'];
                    $contenu_news =  $_POST['contenu'];
                    $requete = "INSERT INTO news VALUES ('', '$titre_news', '$contenu_news')"; 
                    $reponse = executer_requete($requete);
                    header('location:liste_news.php');
                }
            }
        ?>    
            <form action="rediger_news.php" method="post">
                <p>Titre : <input type="text" size="30" name="titre" value="<?php if(isset($titre_news)) echo $titre_news; ?>" /></p>
                <p>
                    Contenu :<br />
                    <textarea name="contenu" cols="50" rows="10">
                    <?php if(isset($contenu_news)) echo $contenu_news; ?>
                    </textarea><br />

                    <input type="hidden" name="id_news" value="<?php if(isset($id_news)) echo $id_news; ?>" />
                    <input type="submit" value="Envoyer" />
                </p>
            </form>
    </body>
</html>