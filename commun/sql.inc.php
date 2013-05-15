<?php
function executer_requete ($requete)
{
    try
    {
        $bdd = new PDO('mysql:host=localhost;dbname=awesome_series', 'root', '');
    }
    catch (Exception $e)
    {
            die('Erreur : ' . $e->getMessage());
    }

    $reponse = $bdd->query($requete);
    return $reponse;
}
?>
