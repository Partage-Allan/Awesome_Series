
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
        <link rel="stylesheet" href="./css/awesome_series.css"/>
         <?php 
            require ('template.php');
            require ('commun/sql.inc.php');
         ?>
        <title>Aw3s0me Séries</title>
    </head>
    <body>
        <?php 
            afficher_header();
            
            $serie_select = str_replace('-', ' ', $_GET['serie']);
            
            $requete = 'SELECT * FROM serie
                        WHERE titre_serie = \'' . $serie_select . '\' ';

            $reponse = executer_requete($requete);
            
            while ($donnees = $reponse->fetch())
            { 
                $id_serie = $donnees['id_serie'];
                $nom_serie = str_replace(' ', '-',$donnees['titre_serie']);
                $serie = $donnees['titre_serie'];
                $nationalite = $donnees['nationalite_serie'];
                $realisateur = $donnees['realisateur_serie'];
                $synopsis = $donnees['synopsis_serie'];
                $resume = $donnees['resume_serie'];
                $genre = $donnees['genre_serie'];
                $annee = $donnees['annee_serie'];
                $nb_saison = $donnees['nbre_saisons_serie'];
                $statut = $donnees['statut_serie'];
                $format = $donnees['format_serie'];
                $trailer = $donnees['trailer_serie'];
            }
            
            $requete2 = 'SELECT nom_acteur, role_acteur FROM casting_serie
                             WHERE serie_id_serie = \'' . $id_serie . '\' ';
            $reponse2 = executer_requete($requete2);
            
            $i = 0;
            while ($donnees2 = $reponse2->fetch())
            {
                $casting[$i] = $donnees2['nom_acteur'];
                $casting_image[$i] = str_replace(' ', '-',$donnees2['nom_acteur']);
                $role[$i] = $donnees2['role_acteur'];
                ++$i;
            }

            $reponse2->closeCursor();
            $reponse->closeCursor();
        ?>
        <section>
            <p id="fil_d_ariane"><a href="index.php">Accueil</a> > <a href="">Series</a> > <a href=""><?php echo $genre; ?></a> > <a href=""><?php echo $serie; ?></a></p>
            <article>
                <h1 id="affiche"><?php echo $serie; ?> 
                    <img src="images/<?php echo $nom_serie; ?>.jpg" alt="affiche-<?php echo $nom_serie; ?>"/>
                    <form action="">
                        <input type="checkbox" name="serie" value="serie"/>Tagger<?php echo str_replace(' ', '-',$serie) ?><br>
                    </form>
                </h1>
                <p id="synopsis"><?php echo $synopsis; ?></p> 
                <div class="casting">
                    <p id="cast">Casting: </p>
                    <div class="liste_acteur">
                        <ul>
                            <?php
                                $j = 0;
                                
                                while($j != count($role))
                                {
                                    printf('<li>');
                                    printf('<img src="images/' . $casting_image[$j] . '.jpg" alt="' . $casting[$j] . '" />');
                                    printf('<p>' . $casting[$j] . '</p>');
                                    ++$j;
                                }
                            ?>
                        </ul>
                    </div>
                </div>
                <div class="bloc_trailer">
                    <p class="texte_trailer">Trailer :</p><br/>
                <iframe width="560" height="315" src="<?php echo $trailer; ?>" frameborder="0" allowfullscreen></iframe>
                <p class="titre_infos">Infos supplémentaires :</p><br/>
                <p class="texte_infos">
                  Réalisateur       : <?php echo $realisateur; ?><br/>
                  Origine           : <?php echo $nationalite; ?><br/>
                  Genre             : <?php echo $genre; ?><br/>
                  Format            : <?php echo $format; ?><br/>
                  Date de sortie    : <?php echo $annee; ?><br/>
                  Nombre de saisons : <?php echo $nb_saison; ?><br/>
                  Statut            : <?php echo $statut; ?><br/>  
                </p> 
                </div>    
            </article>
        </section>
        <?php afficher_footer();?>
    </body>
</html>
