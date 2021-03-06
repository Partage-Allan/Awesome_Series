<?php
/********************************************************************************************************************************/
/********************************************************afficher le header******************************************************/
/********************************************************************************************************************************/
function afficher_header() 
{
    //Vérification d'une session présente, sinon en démarre une
    if (!isset($_SESSION)) { 
        session_start(); 
    }
    printf("<header>");
    printf("<h1 class=\"titre_site\">Awesome Séries</h1>");
   
    /*printf('<a><img class="logo" src="images/logo.png" alt="logo"/></a>');*/
        // Si on ne trouve pas de login en session, on affiche l'etat de création de compte ou de connection
        if (!isset($_SESSION['login']))
        {
            printf('<a class="login" href="login.php">Se Connecter</a>');
            printf('<a class="login" href="inscription.php">Créer un compte</a>');
        }
        // Sinon, c'est qu'il est déjà connecté, donc on affiche la déconnection et l'accès au compte
        else
        {
            printf('<a class="login" href="cmpt_membre.php">Acceder à mon compte</a>');
            printf('<a class="disconnect" href="deconnection.php">Déconnection</a>');
        }
        printf('<div class="texte_titre">LE Site sur LES Séries</div>');
        
            printf('<nav>');
                printf('<ul>');
                    printf('<li><a href="index.php">Accueil</a></li>');
                    printf('<li><a href="search.php">Séries</a></li>');
                    printf('<li><a href="dossiers.php">Dossiers</a></li>');
                    printf('<li><a href="a_venir.php">A Venir</a></li>');
                    printf('<li><a href="cinema.php">Cinéma</a></li>');
                    printf('<li><a href="contact.php">Contact</a></li>');
                    printf('<li><a href="qui_sommes_nous.php">Qui sommes nous?</a></li>');
                    printf('<li><form method="POST" action="search.php"><img src="images/icone-recherche.jpg"/><input class="recherche_serie" type="search" placeholder="Chercher une série" name="search" /></form></li>');
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
