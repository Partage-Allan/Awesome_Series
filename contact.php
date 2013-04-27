<?php
if(isset($_POST) && isset($_POST["nom"]) && isset($_POST['email']) && isset($_POST['message']))
{
    extract($_POST);
    if(!empty($nom) && !empty($email) && !empty($message))
    {
        $message=str_replace("\'","'",$message);
        $destinataire="Monkey_D_Alkan@gmx.fr";
        $sujet="Formulaire de contact";
        $msg="Une nouvelle question est arrivée \n
        Nom: $nom \n
        Email : $email \n
        Message : $message";
        $entete="From: $nom \n Reply-To: $email";
        mail($destinataire, $sujet, $message, $entete);
    }
    else
    {
        echo "Vous avez oublié de remplir un champ !";
    }
}
?>
