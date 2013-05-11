<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8"/>
        <link rel="stylesheet" href="./css/awesome_series.css"/>
         <?php require ('template.php');?>
        <title>Aw3s0me Séries</title>
    </head>
    <body>
        <?php afficher_header();?>
        <section>
            <?php
                try
                {
                    $bdd = new PDO('mysql:host=localhost;dbname=awesome_series', 'root', '');
                }
                catch (Exception $e)
                {
                        die('Erreur : ' . $e->getMessage());
                }
                
                $search = $_POST['search'];
                $reponse = $bdd->query('SELECT titre_serie 
                                        FROM serie
                                        WHERE titre_serie LIKE \'' .$search . '%\' ');
                
            ?>
            <p id="fil_d_ariane"><a href="index.php">Accueil</a> > <a href="">Series</a></p>
            <article>
                <p class="result_search">Liste des Séries correspondante à votre recherche:</p>
                <?php
                    while ($donnees = $reponse->fetch())
                    { 
                        $nom_serie = str_replace(' ', '-',$donnees['titre_serie']);
                        echo '<a class="search" href="fiche_serie.php?' . $nom_serie . '">' . '- ' . $donnees['titre_serie'] . '</a>' . '<br /><br />';
                    }

                    $reponse->closeCursor();
                ?>
                
            </article>
        </section>
        <?php afficher_footer();?>
    </body>
</html>