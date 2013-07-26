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
                <form method="post" action="cmpt_membre.php" class="cmpt_param_gauche">
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
                        <input name="checkNewPass" type="password" id="checkNewPass" required />
                    </div>
                    <input type="submit" value="Valider" id="submit_pass" class="boutton"/>
                </form>
                <p class="etoile">* Champs obligatoire</p>
            </div>
        <?php afficher_footer();?>
    </body>
</html>