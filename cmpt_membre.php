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
        <h1 class="inscription">Mon compte</h1>
        <form method="post" action="cmpt_membre.php" id="cmpt_membre">
            <div class="content_form">
                <label>Mot de passe actuel:</label>
                <input name="" type="password" id="">
            </div>
            <div class="content_form">
                <label>Nouveau mot de passe:</label>
                <input name="" type="password" id="">
            </div>
            <div class="content_form">
                <label>Retaper mot de passe:</label>
                <input name="" type="password" id="">
            </div>
            <div class="content_form">
                <label>Les séries vues:</label>
                <textarea placeholder="Ex: Game of Thrones - Breaking Bad - Falling Skies... etc"></textarea>
            </div>
            <div class="content_form">
                <label>Avis postés:</label>
                <p>Liste des avis posté sur les séries</p>
            </div>
        </form>
        <?php afficher_footer();?>
    </body>
</html>