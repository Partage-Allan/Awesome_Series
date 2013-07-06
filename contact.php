<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8"/>
        <link rel="stylesheet" href="./css/awesome_series.css"/>
         <?php require ('template.php');?>
        <title>Aw3s0me Séries</title>
    </head>
    <body>
<?php afficher_header();?>
        <p id="fil_d_ariane"><a href="index.php">Accueil</a> > <a href="contact.php">Contact</a></p>      
<?php
if(!empty($_POST)){
    extract($_POST);
    $to = "Monkey_D_Alkan@gmx.fr";
    $sujet = "Nouveau message de " . $nom;
    $entete = "Email de: " . $nom . "\n";
    $entete .= "Ayant pour adresse mail : " . $email . "\n";
    
    $entete .= "Voici son message: \n";
    if(mail($to, $sujet, $commentaires, $entete)){
        $erreur = "Votre message a bien ete envoye.";
        unset($nom);
        unset($email);
        unset($commentaires);
    }
    else{
        $erreur = "Une erreur est survenue, veuillez reessayer plus tard";
    }
}
?>
<?php 
    if (isset($erreur)){
        if($erreur == "Votre message a bien ete envoye."){
            echo '<script type="text/javascript">alert("Merci, votre message a bien ete envoye.")</script>';
        }
	else{
            echo '<script type="text/javascript">alert("Une erreur est survenue, veuillez reessayer plus tard.")</script>';
        }
    }
?>

    <div id="ContainerForm">
        <form method="post" action="contact.php" id="formulaire_contact">
                <table>
                <tr>    
                    <td>
                        <label for="nom">Nom : </label>
                        <input type="text" id="nom" name="nom" required placeholder="Entrez votre nom" />
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="email">E-mail : </label>
                        <input type="email" id="email" name="email" required placeholder="Entrez votre Email"/>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="commentaires">Commentaires :</label>
                        <textarea id="commentaires" name="commentaires"  required placeholder="Entrez votre commentaire"></textarea>
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="submit" value="Envoyer" id="mySubmit"/>
                    </td>
                </tr>
           </table> 
        </form>
    </div>
        <?php afficher_footer();?>
    </body>
</html> 
