<?php

printf('<form method="post" action="cmpt_infos.php" class="cmpt_param_gauche">');
                           printf('<p>Gestion de vos Informations :</p>');
                            printf('<div class="form_gauche">');
                                printf('<label>Nom :</label>');
                                printf('<input name="newNom" type="text" id="newNom" />');
                            printf('</div>');
                            printf('<div class="form_gauche">');
                                printf('<label>Prénom :</label>');
                                printf('<input name="newPrenom" type="text" id="newPrenom" />');
                            printf('</div>');
                            printf('<div class="form_gauche">');
                                printf('<label for="newAvatar">Avatar (max 1 Mo)</label>');
                                printf('<input type="hidden" name="MAX_FILE_SIZE" value="1048576" />');
                                printf('<input name="newAvatar" type="file" id="newAvatar" />');
                            printf('</div>');
                            printf('<input type="submit" value="Valider" id="submit_infos" class="boutton"/>');
                        printf('</form>');
                        
                        if(!empty($_POST))
                    {
                        // On récupère les variables POST
                        extract($_POST);
                        
                        if(isset($newNom) || isset($newPrenom) || isset($newAvatar))
                        {
                            if ($_FILES['newAvatar']['error'] > 0)
                                $erreur = true;
                            else
                                $erreur = false;

                            $tailleMax = UPLOAD_ERR_FORM_SIZE;
                            if ($_FILES['newAvatar']['size'] > $tailleMax) 
                                $erreur2 = true;
                            else
                                $erreur2 = false;

                            $extensions_valides = array( 'jpg' , 'jpeg' , 'gif' , 'png' );
                            $extension_upload = strtolower(  substr(  strrchr($_FILES['newAvatar']['name'], '.')  ,1)  );
                            if ( in_array($extension_upload,$extensions_valides) )
                            {
                                $erreur3 = true;

                                $nameAvatar = strstr($_FILES['newAvatar']['name'], '.', true);
                                if ($erreur == false && !$erreur2 == false && $erreur3 == true)
                                    $avatarName = $nameAvatar . "-" . $login . "." . $extension_upload; 
                                $avatar = $nameAvatar . "-" . $login;

                                $destination = "./avatar/$avatarName";
                                $resultat = move_uploaded_file($_FILES['newAvatar']['tmp_name'], $destination);
                            }
                            else
                                $erreur3 = false;

                            $requeteMaj = "UPDATE user SET ";
                            if($newNom != '')
                                $requeteMaj .= "nom = '$newNom' "; 
                            
                            if ($newPrenom != '')
                                $requeteMaj .= ",prenom = '$newPrenom' ";
                            
                            if ($erreur3 == true)
                                $requeteMaj.= ", avatar = '$newAvatar'";
                            $requeteMaj .= " WHERE login = '" . $_SESSION['login'] . "'";
                            $resultatMaj = executer_requete($requeteMaj);
                        }
                    }
?>
