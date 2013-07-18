<?php
session_start();
if (!isset($_SESSION['login'])) {
    header ('Location: index.php');
    exit();
}
?>

<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
        <link rel="stylesheet" href="./css/awesome_series.css"/>
        <script type="text/javascript" src="./commun/javascript/function.js"></script>
        <script type="text/javascript" src="./commun/javascript/jquery-1.10.2.js"></script>
        <script type="text/javascript" src="./commun/javascript/menu_mon_compte.js"></script>
         <?php
            require ('./commun/include/template.php');
            require ('./commun/include/sql.inc.php');
         ?>
        <title>Aw3s0me Séries</title>
    </head>

    <body>
        <?php afficher_header();?>
            <div id="contenu">          
                <?php
                    // On récupère l'ID de l'utilisateur afin d'ensuite aller chercher les séries qu'il a tagg
                    $recupIdUser = "SELECT id_user FROM user WHERE login = '" . $_SESSION['login'] . "'";
                    $execRequeteId = executer_requete($recupIdUser);
                    while ($donnees = $execRequeteId->fetch())
                    {
                        $id_user = $donnees['id_user'];
                    }
                    $execRequeteId->closeCursor();

                    // On récupère ses séries tagguées
                    $recupSerie = "SELECT * FROM series_vues WHERE user_id_user = '" . $id_user . "'";
                    $execRequete = executer_requete($recupSerie);
                    $i = 0;

                    printf('<form method="post" action="" id="cmpt_membre_gauche">');
                        printf('<p>Vos Séries :</p>');
                        printf('<div class="form_droite">');
                            printf('<label>Vos Séries que vous avez Tagguées :</label><br />');

                    // On créer un tableau qui contiendra les affichages des séries trouvées
                    while ($donnees2 = $execRequete->fetch())
                    {
                        $id_tagg[$i] = $donnees2['id_series_vues'];
                        $id_serie[$i] = $donnees2['serie_id_serie'];

                        // On va chercher le nom des series correspondant aux id_series trouvés dans les tagg
                        $recupNomSerie = "SELECT titre_serie FROM serie WHERE id_serie = '" . $id_serie[$i] . "'";
                        $execRequete2 = executer_requete($recupNomSerie);
                        while ($donnees3 = $execRequete2->fetch())
                        {
                            // On affiche chaque séries de notre tableau ainsi qu'une image qui servira de bouton de suppression en javascript
                            $nom_serie[$i] = $donnees3['titre_serie'];
                            printf('<label class="titre_serie">' . $nom_serie[$i] . ' </label>');
                            printf('<img src="./images/croix_annulation.png" name="delete_tag" class="delete_tag" onclick="deleteTagg(' . $id_tagg[$i] . ')" /><br />');
                        }
                        ++$i;
                        $execRequete2->closeCursor();
                    }
                        printf('</div>');
                    printf('</form>');

                    $execRequete->closeCursor();

                    // On regarde si le bouton javascript a été appuyé et renvoie donc l'ID de la série tagguée à supprimer
                    if (isset($_GET['id_tagg']))
                    {
                        $id_serie_tagg = $_GET['id_tagg'];
                        // On delete le tagg de la série cliquée
                        $requeteDeleteTagg = "DELETE FROM series_vues WHERE id_series_vues = '" . $id_serie_tagg . "'"; 
                        $execRequeteDelete = executer_requete($requeteDeleteTagg);
                        // On redirige sur la page de compte sans variable URL
                        header ('Location: cmpt_membre.php');
                    }
                ?>
            </div>
    </body>
</html>