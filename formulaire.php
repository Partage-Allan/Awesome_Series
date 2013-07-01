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
        <h1>Inscription</h1>
        <form method="post" action="formulaireInscription.php" id="formulaire_contact">
            <div class="content_form">
                <label>Nom</label>
                <input name="nom" type="text" id="nom" required pattern="[A-Za-z]{1,25}"/>
                <span>Entrez un nom</span>
            </div>
            <div class="content_form">
                <label>Prénom</label>
                <input name="prenom" title="Veuillez saisir votre prénom" type="text" id="prenom" required pattern="[A-Za-z]{1,25}"/>
                <span>Entrez votre prénom</span>
            </div>
            <div class="content_form">
                <label class="labeli">Pseudo</label>
                <input name="pseudo" type="text" id="pseudo" required pattern="^[A-Za-z0123456789-_/-]+"/>
                <span>Choisissez un pseudo</span>
            </div>
            <div class="content_form">
                <label class="labeli">E-mail</label>
                <input name="email" type="email" id="email" required />
                <span>Entrez votre adresse e-mail</span>
            </div>
            <div class="content_form">
                <label class="labeli">Vérification e-mail</label>
                <input name="email" type="email" id="email" required/>
                <span>Vérifiez votre e-mail</span>
            </div>
            <div class="content_form">
                <label class="labeli">Mot de passe</label>
                <input name="password" type="text" id="password" required/>
                <span>Choisissez un mot de passe</span>
            </div>
            <div class="content_form">
                <label class="labeli">Vérification mot de passe</label>
                <input name="confirmpassword" type="password" id="confirmpassword" required/>
                <span>Vérifiez votre mot de passe</span>
            </div>  
        </form>
            <input type="submit" value="Valider" id="submit" class="boutton"/>
    </body>
    <?php afficher_footer();?>
</html>        