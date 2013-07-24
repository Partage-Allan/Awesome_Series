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
                <form method="post" action="cmpt_membre.php" id="cmpt_membre_gauche">
                    <p>Gestion du Password :</p>
                    <div class="form_gauche">
                        <label>Mot de passe actuel:</label>
                        <input name="passActuel" type="password" id="pass" required />
                    </div>
                    <div class="form_gauche">
                        <label>Nouveau mot de passe:</label>
                        <input name="newPass" type="password" id="newPass" required />
                    </div>
                    <div class="form_gauche">
                        <label>Retaper mot de passe:</label>
                        <input name="checkNewPass" type="password" id="checkNewPass" oninput="verifPass()" required />
                    </div>
                    <div class="form_gauche">
                        <label>Modifier mon adresse e-mail :</label>
                        <input name="" type="" id="" oninput="" required />
                    </div>
                    <div class="form_gauche">
                        <label>Retaper adresse mail :</label>
                        <input name="" type="" id="" oninput="" required />
                    </div>
                    <input type="submit" value="Valider" id="submit" class="boutton"/>
                </form> 
                <p class="etoile">* Champs obligatoire</p>
            </div>
        <?php
            // Formulaire de mise à jour du mot de passe
            if(!empty($_POST))
            {
                extract($_POST);
                $login = trim($_SESSION['login']);
                // Vérification du mot de passe actuel
                $requetePass = "SELECT * FROM user WHERE login = '" . $login . "'";
                $execRequete = executer_requete($requetePass);
                while($donnees = $execRequete->fetch())
                {
                    $pass = $donnees['password'];
                }
                $execRequete->closeCursor();
                
                $passActuel = md5($passActuel);
                // Si mot de passe actuel faux, affichage de l'erreur
                if($pass != $passActuel)
                    echo '<script type="text/javascript">alert("Mauvais mot de passe actuel")</script>';
                // Sinon mise à jour du mot de passe avec le nouveau entré
                else
                {
                    $newPass = md5($newPass);
                    $updatePass = "UPDATE user SET password = '" . $newPass . "'";
                    $execRequete = executer_requete($updatePass);
                    echo '<script type="text/javascript">alert("Mot de passe mis à jour!")</script>';
                }
            }
        ?>
        <?php afficher_footer();?>
    </body>
</html>