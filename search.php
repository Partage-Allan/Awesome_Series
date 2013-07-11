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
                if(isset($_POST['search']))
                {
                    $search = $_POST['search'];
                    $requete_precise = 'SELECT titre_serie FROM serie
                                        WHERE titre_serie LIKE \'' .$search . '%\' ';
                    
                    $reponse = executer_requete($requete_precise);
                    
                    $nb_serie = 'SELECT COUNT(*) AS nbr FROM serie
                                        WHERE titre_serie LIKE \'' .$search . '%\' ';
                }
                
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
                        if($donnees2['nbr'] == 0 )
                        {
                            printf('<p class="result_search">Aucune série ne correspond à votre recherche, désolé.</p>');
                        }
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