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
        <section>
            <p id="fil_d_ariane"><a href="index.php">Accueil </a>> Inscription</p>
            <div id="ContainerForm">
        <form>
                <table>
                <tr>    
                    <td>
                        <label for="nom">Nom : </label>
                        <input type="text" id="nom" name="nom" required placeholder="Entrez votre nom" />
                    </td>
                </tr>
                 <tr>    
                    <td>
                        <label for="nom">Prénom : </label>
                        <input type="text" id="prenom" name="prenom" required placeholder="Entrez votre prénom" />
                    </td>
                </tr>
                 <tr>    
                    <td>
                        <label for="nom">Pseudo : </label>
                        <input type="text" id="pseudo" name="pseudo" required placeholder="Entrez votre pseudo" />
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="email">E-mail : </label>
                        <input type="email" id="email" name="email" required placeholder="Entrez votre E-mail"/>
                    </td>
                </tr>
                 <tr>    
                    <td>
                        <label for="nom">Vérification E-mail : </label>
                        <input type="text" id="" name="" required placeholder="Vérifier E-mail" />
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="serie_vues">Séries vues:</label>
                        <textarea id="commentaires" name="commentaires"  required placeholder="Ex: Breaking Bad - Games of Thrones - Falling Skies..."></textarea>
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="submit" value="Valider" id="mySubmit" class="boutton"/>
                    </td>
                </tr>
           </table> 
        </form>
    </div>
        
        
    </body>
    <?php afficher_footer();?>
</html>   
