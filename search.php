<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8"/>
        <link rel="stylesheet" href="./css/awesome_series.css"/>
         <?php 
            require ('./commun/include/template.php');
            require ('./commun/include/sql.inc.php');;
         ?>
        <title>Aw3s0me Séries</title>
    </head>
    <body>
        <?php afficher_header();?>
        <section>
            <p id="fil_d_ariane"><a href="index.php">Accueil</a> > <a href="search.php">Series</a></p>
            <?php
                // Si on trouve une série entrée par l'utilisateur dans le champ recherche
                if(isset($_POST['search']))
                {
                    // On recherche une série en base qui contient le mot recherché
                    $search = $_POST['search'];
                    $requete_precise = 'SELECT titre_serie FROM serie
                                        WHERE titre_serie LIKE \'' .$search . '%\' ';
                    
                    $reponse = executer_requete($requete_precise);
                    
                    // On recherche combien de séries on trouve
                    $nb_serie = 'SELECT COUNT(*) AS nbr FROM serie
                                        WHERE titre_serie LIKE \'' .$search . '%\' ';
                }
                
                // Sinon, on fait une recherche global de toutes les séries en base
                else
                {
                    $requete_general = 'SELECT titre_serie FROM serie';
                    $reponse = executer_requete($requete_general);
                    
                    $nb_serie = 'SELECT COUNT(*) AS nbr FROM serie';
                }
                $reponse2 = executer_requete($nb_serie);
                
            ?>
            
            <article>
                <?php
                    while ($donnees2 = $reponse2->fetch())
                    {
                        // Si on trouve 0 série, on affiche l'erreur
                        if($donnees2['nbr'] == 0 )
                        {
                            printf('<p class="result_search">Aucune série ne correspond à votre recherche, désolé.</p>');
                        }
                        // Sinon, on affiche toutes les séries trouvées
                        else
                        {
                            printf('<p class="result_search">Liste des Séries correspondante à votre recherche:</p>');
                            while ($donnees = $reponse->fetch())
                            {
                                $nom_serie = str_replace(' ', '-',$donnees['titre_serie']);
                                echo '<a class="search" href="fiche_serie.php?serie=' . $nom_serie . '">' . '- ' . $donnees['titre_serie'] . '</a>' . '<br /><br />';
                            }
                        }
                    }
                    $reponse2->closeCursor();
                    $reponse->closeCursor();
                ?>
                
            </article>
        </section>
        <?php afficher_footer();?>
    </body>
</html>