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
        extract($_POST);
        $requete=("INSERT INTO user VALUES ('',$login','$nom','$prenom','$email','$password')");
        executer_requete($requete);
        echo"bienvenue";
        ?>
        <h1>Inscription</h1>
        <form method="post" action="formulaire.php" id="formulaire">
            <div class="content_form">
                <div class="content_form">
                <label>Login</label>
                <input name="pseudo" type="text" id="login" required placeholder="Choisissez votre login" pattern="^[A-Za-z0123456789-_/-]+"/>
            </div>
                <label>Nom</label>
                <input name="nom" type="text" id="nom" required placeholder="Entrez votre nom" pattern="[A-Za-z]+"/>
            </div>
            <div class="content_form">
                <label>Prénom</label>
                <input name="prenom" type="text" id="prenom" required placeholder="Entrez votre prénom"pattern="[A-Za-z]+"/>
            </div>
            <div class="content_form">
                <label>E-mail</label>
                <input name="email" type="email" id="email" required oninput='verifMail()' placeholder="adresse@mail.com"/>
            </div>
            <div class="content_form">
                <label>Vérification e-mail</label>
                <input name="confirmemail" type="email" id="confirmemail" required oninput='verifMail()' placeholder="Confirmez votre e-mail"/>
            </div>
            <div class="content_form">
                <label>Mot de passe</label>
                <input name="password" type="password" id="password" required oninput='verifPass()' placeholder="Entrez un mot de passe"/>
            </div>
            <div class="content_form">
                <label>Vérification mot de passe</label>
                <input name="confirmpassword" type="password" id="confirmpassword" required oninput='verifPass()' placeholder="Validez mot de passe"/>
            </div>
            <input type="submit" value="Valider" id="submit" class="boutton"/>
        </form>
        <script>
                        function verifMail() {
                            var email = document.getElementById('email');
                            var emailConfirm = document.getElementById('confirmemail');
                            if (email.value !== emailConfirm.value) {
                                emailConfirm.setCustomValidity('Les adresses mail ne correspondent pas.');
                            }
                            else {
                                emailConfirm.setCustomValidity('');
                            }
                        }
                        function verifPass() {
                            var pass = document.getElementById('password');
                            var passConfirm = document.getElementById('confirmpassword');
                            if (pass.value !== passConfirm.value) {
                                passConfirm.setCustomValidity('Les mots de passe de correspondent pas.');
                            }
                            else {
                                passConfirm.setCustomValidity('');
                            }
                        }

        </script>
    </body>
    <?php afficher_footer();?>
</html>        