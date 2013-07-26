
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
        <link rel="stylesheet" href="./css/awesome_series.css"/>
        <script type="text/javascript" src="./commun/javascript/function.js"></script>
         <?php 
            require ('./commun/include/template.php');
            require ('./commun/include/sql.inc.php');
         ?>
        <title>Aw3s0me Séries</title>
    </head>
    <body>
        <?php 
            afficher_header();

            // On récupère le nom de la série choisie en remplaçant les espaces par des tirets
            $serie_select = str_replace('-', ' ', $_GET['serie']);
            
            // On récupère toutes les infos sur cette série
            $requete = 'SELECT * FROM serie
                        WHERE titre_serie = \'' . $serie_select . '\' ';

            $reponse = executer_requete($requete);
            
            // On stock toutes les infos dans des variables
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
                $chaine = $donnees['chaine'];
            }
            
            // De meme pour le casting
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
                </h1>
                <p id="synopsis"><?php echo $synopsis; ?></p>
                <?php
                    $logout = "Connectez-vous \n pour tagg $serie";
                    $tagg = "$serie \n déjà Tagg";
                    $tagguer = "Tagguer \n $serie";
                    
                    // Si on ne trouve pas de session connecté, on affiche le bouton de connection pour Tagguer la série
                    if (!isset($_SESSION['login']))
                        printf('<input class="serie_check" type="button" name="serie" value="' . $logout . '" onclick="login()" />');
                    // Sinon on va récupérer l'ID de l'utilisateur
                    else    
                    {
                        $requeteID = "SELECT id_user FROM user WHERE login = '" . $_SESSION['login'] . "'";
                        $reponse3 = executer_requete($requeteID);
                        while($donnees3 = $reponse3->fetch())
                        {
                            $id_user = $donnees3['id_user'];
                        }
                        $reponse3->closeCursor();
                        
                        // On vérifie avec l'ID de l'utilisateur s'il à déjà Taggué la série en cours
                        $verifCheck = "SELECT COUNT(*) as nbr FROM series_vues 
                                       WHERE serie_id_serie = $id_serie 
                                       AND user_id_user = $id_user";
                        $reponse4 = executer_requete($verifCheck);
                        while($donnees4 = $reponse4->fetch())
                        {
                            $check = $donnees4['nbr'];
                        }
                        $reponse4->closeCursor();
                        
                        // Si on trouve qu'elle est déjà Taggué, on affiche le bouton déjà taggué
                        if($check > 0)
                        {
                            printf('<input class="serie_check" type="button" name="serie" value="' . $tagg . '"/>');
                        }
                        // Sinon, on vérifie s'il a appuyer sur le bouton de Tagg
                        else
                        {
                            // Si il vient d'appuyer sur le bouton
                            // (récupération de la variable URL transmise par la fonction javascript lors de l'appuie sur le bouton),
                            //  on insère en base le tagg
                           if (isset($_GET['tagg']) && $_GET['tagg'] == "true")
                           {
                                $tagger = "INSERT INTO series_vues VALUES ('', '$id_user', '$id_serie')";
                                $executer = executer_requete($tagger);
                                printf('<input class="serie_check" type="button" name="serie" value="' . $tagg . '"/>');
                           }
                           // Sinon on affiche le bouton de Tagg série avec le listenner javascript
                           else
                           {
                                printf('<input class="serie_check" type="button" name="serie" value="' . $tagguer . '" onclick="setTagg()" />');
                           }
                        }
                    }
                ?>
                
                <div class="casting">
                    <p id="cast">Casting: </p>
                    <div class="liste_acteur">
                        <ul>
                            <?php
                                $j = 0;
                                // Affichage des photos casting + noms
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
                  Chaine            : <?php echo $chaine; ?><br/>
                  Genre             : <?php echo $genre; ?><br/>
                  Format            : <?php echo $format; ?><br/>
                  Date de sortie    : <?php echo $annee; ?><br/>
                  Nombre de saisons : <?php echo $nb_saison; ?><br/>
                  Statut            : <?php echo $statut; ?><br/>  
                </p> 
                </div>    
            </article>
            <p>
                Critique de la rédac : 
                
                Revolution est une série prometteuse, la 1ere saison commence très doucement, avec des acteurs pas très convainquant de prime abord mais qui gagne au fil des épisode<br/> 
                de plus en plus le spectateur. Ceux qui restent septique je ne peux que leur faire par de mon opinion : regarder la saison jusqu'à la fin. Nous avon ici un vrai scénario qui<br/>
                feront rappeller une certaine série avec des naufragés, je parle bien évidement de LOST. Les flash-back sont intéressant et nous apporte des réponses sur les histoires des personnages<br/>
                avant la coupure du courant.
            </p>
        </section>
        <?php afficher_footer();?>
    </body>
</html>
