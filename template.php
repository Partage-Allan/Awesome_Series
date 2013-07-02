<?php
/********************************************************************************************************************************/
/********************************************************afficher le header******************************************************/
/********************************************************************************************************************************/
function afficher_header() 
{
    if (!isset($_SESSION)) { 
        session_start(); 
    }
    printf("<header>");
    printf("<h1 class=\"titre_site\">Awesome Séries</h1>"); 
        if (!isset($_SESSION['login'])){
                printf('<a class="login" href="login.php">Se Connecter</a>');
            }
        else{
            printf('<a class="login" href="cmpt_membre.php">Acceder à mon compte</a>');
        }
        printf('<div class="texte_titre">LE Site sur LES Séries</div>');
        printf('<div class="recherche"><form method="POST" action="search.php"><input type="search" placeholder="Entrez votre recherche" name="search" /></form></div>'); 
            printf('<nav>');
                printf('<ul>');
                    printf('<li><a href="index.php">Accueil</a></li>');
                    printf('<li><a href="presentation.php">Présentation</a></li>');
                    printf('<li><a href="search.php">Séries</a>');
                    printf('<li><a href="formulaire.php">Inscription</a>');
                    printf('</li>');
                    printf('<li class="button"><a href=".php">Actu</a></li>');
                    printf('<li class="button"><a href="dossiers.php">Dossiers</a></li>');
                    printf('<li class="button"><a href="a_venir.php">A Venir</a></li>');
                    printf('<li class="button"><a href="cinema.php">Cinéma</a></li>');
                printf('</ul>');
            printf('</nav>');
printf('</header>');
}
/*********************************************************************************************************************************/
/*********************************************************header******************************************************************/
/*********************************************************************************************************************************/

/********************************************************afficher le footer*******************************************************/
function afficher_footer()
{
     printf('<footer>');  
     printf('<div id="suivez_nous">');
         printf('<p>Suivez l\'actualité de Awesome Séries sur les réseaux sociaux!</p>');
             printf('<a class="infobulle" href="http://www.facebook.com"><img class="icone" src="images/ico-facebook.png" alt="facebook"/><span>Facebook</span></a>');
             printf('<a class="infobulle" href="http://www.twitter.com"><img class="icone" src="images/ico-twitter.png" alt="twitter"/><span>Twitter</span></a>');                    
     printf('</div>');
     printf('</footer>');
} 
/*********************************************************footer******************************************************************/

?>
