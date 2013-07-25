<?php

if (isset($newEmail))
{
    $login = $_SESSION['login'];
    // On vérifie s'il y a déjà une utilisateur avec le meme email en base
    $verifEmail = ("SELECT COUNT(*) AS nbr2 FROM user WHERE email = '$email'");
    $rep2 = executer_requete($verifEmail);
    while ($donnees2 = $rep2->fetch())
    {
        // Si email déjà pris, affichage d'erreur
        if($donnees2['nbr2'] > 0)
            echo '<script type="text/javascript">alert("Cet Email est déjà utilisé!")</script>';
        // Sinon, tout est bon, on modifie l'email
        else
        {
            if ($_FILES['avatar']['error'] > 0)
                $erreur = true;
            else
                $erreur = false;

            $tailleMax = UPLOAD_ERR_FORM_SIZE;
            if ($_FILES['avatar']['size'] > $tailleMax) 
                $erreur2 = true;
            else
                $erreur2 = false;

            $extensions_valides = array( 'jpg' , 'jpeg' , 'gif' , 'png' );
            $extension_upload = strtolower(  substr(  strrchr($_FILES['avatar']['name'], '.')  ,1)  );
            if ( in_array($extension_upload,$extensions_valides) )
            {
                $erreur3 = true;

                $nameAvatar = strstr($_FILES['avatar']['name'], '.', true);
                if ($erreur == false && !$erreur2 == false && $erreur3 == true)
                    $avatarName = $nameAvatar . "-" . $login . "." . $extension_upload; 
                $avatar = $nameAvatar . "-" . $login;

                $destination = "./avatar/$avatarName";
                $resultat = move_uploaded_file($_FILES['avatar']['tmp_name'], $destination);
            }
            else
                $erreur3 = false;

            $requeteMaj = "UPDATE user SET nom = '$nom', prenom = '$prenom', email = '$email'";
            if ($erreur3 == true)
                $requeteMaj.= ", avatar = '$avatar'";
            $requeteMaj .= " WHERE login = '$login'";
            $resultatMaj = executer_requete($requeteMaj);





            echo '<script type="text/javascript">alert("Mise à jour de votre Compte effectuée.")</script>';
        }
    }
    $rep2->closeCursor();
}
?>
