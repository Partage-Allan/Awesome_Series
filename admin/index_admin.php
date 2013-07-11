<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" >
   <head>
       <meta charset="UTF-8"/>
       <link rel="stylesheet" href="../css/awesome_series.css"/>
       <?php 
            require ('../commun/include/template.php');
            require ('../commun/include/sql.inc.php');
       ?>
    </head>
    <body>
    <?php afficher_header();?>
        <h1>Bienvenue sur mon site !</h1>
        <p>Voici les dernières news :</p>

        <?php
        
        // On récupère les cinq dernières news.
        $retour = executer_requete('SELECT * FROM news ORDER BY id DESC LIMIT 0, 5');
        while ($donnees = mysql_fetch_array($retour))
        {
        ?>
        <div class="news">
            <h3>
                <?php echo $donnees['titre']; ?>
                <em>le <?php echo date('d/m/Y à H\hi', $donnees['timestamp']); ?></em>
            </h3>

            <p>
            <?php
            // On enlève les éventuels antislashs, PUIS on crée les entrées en HTML (<br />).
            $contenu = nl2br(stripslashes($donnees['contenu']));
            echo $contenu;
            ?>
            </p>
        </div>
        <?php
        } // Fin de la boucle des <italique>news</italique>.
        ?>
</body>
</html>