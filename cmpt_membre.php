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
         <?php require ('template.php');?>
        <title>Aw3s0me Séries</title>
    </head>

    <body>
        <?php afficher_header();?>
        
        Bienvenue <b><?php echo htmlentities(trim($_SESSION['login'])); ?>!</b><br /><br />
        
        <a href="deconnexion.php">Déconnexion</a>
        <?php afficher_footer();?>
    </body>
</html>