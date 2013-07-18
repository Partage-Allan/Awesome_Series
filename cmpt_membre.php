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
        <p id="fil_d_ariane"><a href="index.php">Accueil</a> > <a href="cmpt_membre.php">Mon compte</a></p>
        <p class="bienvenue">Bienvenue <b><?php echo trim($_SESSION['login']); ?>!</b></p>
        <h1 class="inscription">Mon compte</h1>
        <div id="wrapper">  
            <ul id="nav">  
                <li><a href="cmpt_membre_test.php">Mes Infos</a></li>  
                <li><a href="cmpt_password.php">Mon Password</a></li>  
                <li><a href="cmpt_mes_series.php">Mes Séries</a></li>  
                <li><a href="cmpt_commentaires.php">Mes Commentaires</a></li>   
            </ul>  
            <div id="contenu">          
                <p>Infos compte: pseudo, date d'inscription, last action, avatar... </p><br/>  
            </div>
        </div>
        <?php afficher_footer();?>
    </body>
</html>