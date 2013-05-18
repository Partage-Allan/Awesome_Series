<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8"/>
        <link rel="stylesheet" href="./css/awesome_series.css"/>
        <?php require ('template.php'); ?>
        <title>Aw3s0me Séries</title>
    </head>
    <body>
        <?php afficher_header(); ?>
        <p id="fil_d_ariane"><a href="index.php">Accueil</a> > <a href="formulaireInscription.php">Inscription</a></p>
        <div id="ContainerForm">
            <?php
            if (!isset($_POST['dateNaissance'])) {
                $_POST['dateNaissance'] = '';
            } else {
                echo $_POST['dateNaissance'];
            }
            ?>
            <form method="post" action="formulaireInscription.php" id="formulaire_contact">
                <table>
                    <tr>    
                        <td>
                            <label for="login">Login : </label>
                            <input type="text" id="login" name="login" required placeholder="Entrez votre login" />
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="email">E-mail : </label>
                            <input type="email" id="email" name="email" required placeholder="Entrez votre Email" oninput='verifMail()'/>
                        </td>
                        <td>
                            <label for="emailConfirm">Confirmation : </label>
                            <input type="email" id="emailConfirm" name="emailConfirm" required placeholder="Confirmez votre Email" oninput='verifMail()'/>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="pass">MDP : </label>
                            <input type="password" id="pass" name="pass"  maxlength='4' pattern=".{4,4}" required placeholder="4 caractères" oninput='verifPass()'/>
                        </td>
                        <td>
                            <label for="pass">Confirmation MDP : </label>
                            <input type="password" id="passConfirm" name="passConfirm" maxlength='4' pattern=".{4,4}" required placeholder="4 caractères"
                                   oninput='verifPass()'/>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="dateNaissance">Date de naissance : </label>
                            <input type="date" id="dateNaissance" name="dateNaissance" placeholder="format : aaaajjmm" maxlength='8' pattern=".{8,8}"/>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input type="submit" value="Envoyer le Formulaire" id="mySubmit" class="boutton"/>
                        </td>
                    </tr>
                </table> 
                <script>
                    function verifMail() {
                        var email = document.getElementById('email');
                        var emailConfirm = document.getElementById('emailConfirm');
                        if (email.value !== emailConfirm.value) {
                            emailConfirm.setCustomValidity('Les adresses mail ne correspondent pas');
                        }
                        else {
                            emailConfirm.setCustomValidity('');
                        }
                    }
                    function verifPass() {
                        var pass = document.getElementById('pass');
                        var passConfirm = document.getElementById('passConfirm');
                        if (pass.value !== passConfirm.value) {
                            passConfirm.setCustomValidity('Les mots de passe ne correspondent pas');
                        }
                        else {
                            passConfirm = '';
                        }
                    }

                </script>
            </form>

        </div>