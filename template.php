<?php 
/********************************************************************************************************************************/
/********************************************************afficher le header******************************************************/
/********************************************************************************************************************************/
function afficher_header() 
{
    printf("<header>");
    printf("<h1 class=\"titre_site\">Awesome Séries</h1>");    
        printf('<p class="texte_titre">LE Site sur LES Séries</p>');
            printf('<nav>');
                printf('<ul>');
                    printf('<li><a href="index.php">Accueil</a></li>');
                    printf('<li><a href="presentation.php">Présentation</a></li>');
                    printf('<li><a href="series.php">Séries</a>');
                    printf('<li><a href="contact.php">Contact</a>');
                        /*printf('<ul>');
                            printf('<li class="button"><a href="#"></a></li>');
                            printf('<li class="button"><a href="#">Le jardin</a></li>');
                            printf('<li class="button"><a href="#">Dans la poche !</a></li>');
                            printf('<li class="button_spe_1"><a href="#">Confection Originales</a></li>');
                        printf('</ul>');*/
                    printf('</li>');
                    printf('<li class="button"><a href=".php">Actu</a></li>');
                    printf('<li class="button"><a href="dossiers.php">Dossiers</a></li>');
                    printf('<li class="button"><a href="a_venir.php">A Venir</a></li>');
                    printf('<li class="button"><form method="POST" action="search.php"><input type="search" placeholder="Entrez votre recherche" name="search" /></form>');
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