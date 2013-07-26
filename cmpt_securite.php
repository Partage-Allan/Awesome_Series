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
        <?php 
            afficher_header();
            if(isset($_GET['modif']) && $_GET['modif'] == "password")
            {
                printf('<div id="contenu">');       
                    printf('<form method="post" action="cmpt_membre.php" class="cmpt_param_gauche">'); 
                        printf('<p>Gestion du Password :</p>'); 
                       printf(' <div class="form_gauche">'); 
                            printf('<label>Mot de passe actuel:</label>'); 
                           printf('<input name="passActuel" type="password" id="pass" required />'); 
                        printf('</div>'); 
                        printf('<div class="form_gauche">'); 
                            printf('<label>Nouveau mot de passe:</label>'); 
                            printf('<input name="newPass" type="password" id="newPass" required />'); 
                        printf('</div>'); 
                        printf('<div class="form_gauche">'); 
                            printf('<label>Retaper mot de passe:</label>'); 
                            printf('<input name="checkNewPass" type="password" id="checkNewPass" required />'); 
                        printf('</div>'); 
                        printf('<input type="submit" value="Valider" id="submit_pass" class="boutton"/>'); 
                    printf('</form>'); 
                    printf('<p class="etoile">* Champs obligatoire</p>'); 
                printf('</div>'); 
            }
            
            elseif(isset($_GET['modif']) && $_GET['modif'] == "email")
            {
                printf('<div id="contenu">');
                   printf('<form method="post" action="cmpt_membre.php" class="cmpt_param_gauche">'); 
                        printf("<p>Gestion de l'email :</p>"); 
                        printf('<div class="form_gauche">'); 
                            printf('<label>Nouvelle adresse mail :</label>'); 
                            printf('<input name="newEmail" type="email" id="newEmail" required />'); 
                        printf('</div>'); 
                        printf('<div class="form_gauche">'); 
                            printf('<label>Retaper adresse mail :</label>'); 
                            printf('<input name="checkNewEmail" type="email" id="checkNewEmail" required />'); 
                        printf('</div>'); 
                        printf('<input type="submit" value="Valider" id="submit_email" class="boutton"/>'); 
                    printf('</form>'); 
                   printf('<p class="etoile">* Champs obligatoire</p>'); 
                printf('</div>'); 
            }
            afficher_footer();
        ?>
    </body>
</html>