<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
        <link rel="stylesheet" href="./css/awesome_series.css"/>
        <?php require ('template.php');?>
        <?php require ('commun/sql.inc.php');?>
        <title>Aw3s0me Séries</title>
    </head>
    <body>
        <?php afficher_header();?>
        <form method="POST" action="login.php">
            <div>
            <label>Login</label>
                <input name="login" type="text" id="login" required placeholder="Entrez votre login" pattern="^[A-Za-z0123456789-_/-]+"/>
            </div>
            <div class="content_form">
                <label>Mot de passe</label>
                <input name="password" type="password" id="password" required placeholder="Entrez un mot de passe"/>
            </div>
            <input type="submit" value="valider" name="submit"/>
        </form>
    </body>
        <?php afficher_footer();?>
</html> 
