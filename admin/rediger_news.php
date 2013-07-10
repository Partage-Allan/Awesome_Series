<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" >
   <head>
       <title>Rédiger une news</title>
        <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
        <link rel="stylesheet" href="../css/awesome_series.css"/>
        <?php 
            require ('./template.php');
            require ('../commun/sql.inc.php');
         ?>
    </head>
    <body>
        <?php afficher_header();?>
            <h3><a href="liste_news.php">Retour à la liste des news</a></h3>
            <?php if (isset($_GET['modifier_news']))
            {
                $reponse= mysql_query('SELECT * FROM news WHERE id=\' ' . $_GET['modifier_news'] . '\'');
                $donnees = mysql_fetch_array($reponse);
                $titre_news = $donnees['titre'];
                $contenu_news = $donnees['contenu'];
                $id_news = $donnees['id'];
            }
            else
            {
                $titre_news = '';
                $contenu_news = '';
                $id_news = 0;
            }
        ?>    
            <form action="liste_news.php" method="post">
                <p>Titre : <input type="text" size="30" name="titre" value="<?php echo $titre_news; ?>" /></p>
                <p>
                    Contenu :<br />
                    <textarea name="contenu" cols="50" rows="10">
                    <?php echo $contenu_news; ?>
                    </textarea><br />

                    <input type="hidden" name="id_news" value="<?php echo $id_news; ?>" />
                    <input type="submit" value="Envoyer" />
                </p>
            </form>
    </body>
</html>