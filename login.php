<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
        <link rel="stylesheet" href="./css/awesome_series.css"/>
         <?php require ('template.php');?>
        <title>Aw3s0me Séries</title>
    </head>
    <body>
        <?php afficher_header();?>
        <?php
        if(isset($_POST['submit']))
        {
            $login=htmlspecialchars(trim($POST['login']));
            $login=htmlspecialchars(trim($POST['password']));
                if($login&&$password)
                {
                $password= md5($password); 
                mysql_select_db(awesome_series);
                $requete=("SELECT * FROM user WHERE user='$login' AND password='$password'");
                executer_requete($requete);
                $reponse=  executer_requete($requete);
                $rows= mysql_num_rows($reponse);
                if($rows==1)
                {
                echo"Bienvenue";    
                }else echo"Login ou mot de passe incorrect";
                
                
                }
        }
        ?>
        <form method="POST" action="login.php">
            <div>
            <label>Login</label>
                <input name="pseudo" type="text" id="login" required placeholder="Choisissez votre login" pattern="^[A-Za-z0123456789-_/-]+"/>
            </div>
            <div class="content_form">
                <label>Mot de passe</label>
                <input name="password" type="password" id="password" required oninput='verifPass()' placeholder="Entrez un mot de passe"/>
            </div>
            <input type="submit" value="valider" name="submit"/>
        </form>
    </body>
        <?php afficher_footer();?>
</html>             
