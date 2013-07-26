<?php
function executer_requete ($requete)
{
    try
    {
        $bdd = new PDO('mysql:host=localhost;dbname=awesome_series', 'root', '', array(PDO::MYSQL_ATTR_INIT_COMMAND =>  'SET NAMES utf8') );
    }
    catch (Exception $e)
    {
            die('Erreur : ' . $e->getMessage());
    }

    $reponse = $bdd->query($requete) or die(mysql_error());
    return $reponse;
}
?>
