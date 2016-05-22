<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <link rel="stylesheet" href="Style/style.css"/>
        <meta charset="UTF-8">
        <title>Accueil</title>
    </head>
          <body>
              <div id="Title">
                <h1>Bienvenue sur le chercheur de Rushes </h1>
              </div>

              <?php
                include 'Include/ConnexionmBDD.php';
              ?>

               <div id="cadre">
                 <form id='frm' name='frm' method='post' action='Accueil.php'>

                   <!-- Permet de sélectionner la vidéo auquel on veut afficher les détail des rushes -->
                   <h2> Détail Vidéo </h2>
                     <select name="nomvideo" required="">
                       <option value="">Sélectionnez une vidéo</option>
                       <?php
                       $req = "SELECT * FROM Video;";
                       $resultat =$connexion->query($req);
                       while ($ligne= $resultat->fetch()) { ?>
                         <option value="<?php echo $ligne['id_video']; ?>"><?php echo $ligne['nom_video']; ?></option>;
                       <?php }

                       $resultat->closeCursor();
                       ?>
                     </select>
                       <input type="submit" name ='valider' value="Valider"/>
                   </form><br>

                  <?php
                     $action = '';
                        if (isset($_POST['valider']))
                        {
                          $req = "SELECT * FROM Rushes INNER JOIN Video ON Video.id_video = Rushes.id_video WHERE Rushes.id_video = ".$_POST['nomvideo'].";";
                          $resultat =$connexion->query($req);
                          $ligne= $resultat->fetch();
                          ?>

                          <!-- Affichage le nom de la vidéo séléctionner -->
                          <h4>
                            <td>
                            <?php  echo $ligne['nom_video'];
                            ?>
                            </td>
                         </h4>

                         <?php
                           do {
                             ?>
                             <br><br>

                             <!-- Affichage une description du Rushes de la vidéo séléctionner précédemment -->
                             <div id="description">
                              <td>
                                <?php  echo $ligne['description_rushes'];
                                ?>
                              </td></div>

                                <!-- Affichage des temps de début et de fin de chaque Rushes de la vidéo séléctionner auparavant -->
                               <td>
                                   <?php  echo 'Début du Rushe: '.$ligne['temps_debut'];
                                     ?>
                               </td><br>

                               <td>
                                   <?php  echo 'Fin du Rushe: '.$ligne['temps_fin'];
                                     ?>
                               </td>

                               <?php
                                    $req = "SELECT nom_episode FROM Episode INNER JOIN Montage ON Montage.num_episode = Episode.num_episode INNER JOIN Composition ON Composition.num_montage = Montage.num_montage WHERE Composition.id_video = ".$ligne['id_video']." AND Composition.num_rushes = ".$ligne['num_rushes'].";";

                                    $res =$connexion->query($req);
                                    $rep= $res->fetch();
                                  if ($rep['nom_episode'])
                                  {

                                ?>
                                </br>

                                <!--Affiche le nom de l'épisode dans lequel le rushes est utilisé -->
                               <td>
                                   <?php  echo 'Le Rushe est utilisé dans l\'episode: '.$rep['nom_episode'];
                                     ?>
                               </td>
                             <?php
                                  }

                           } while ($ligne= $resultat->fetch());
                        }
                        $resultat->closeCursor();
                    ?>
               </div>


          </body>
</html>
