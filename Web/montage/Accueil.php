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
               <h3> Détail Vidéo </h3>
                 <select name="nomvideo" required="">
                   <option value="">Sélectionnez une vidéo</option>
                   <?php
                   $req = "SELECT * FROM Video;";
                   $resultat =$connexion->query($req);
                   while ($ligne= $resultat->fetch()) {
                     echo "<option value=''>".$ligne[nom]."</option>";
                   }

                   $resultat->closeCursor();
                   ?>
                 </select>
                   <input type="submit" name ='valider' value="Valider"/>
               </form>
               <br>

               <!-- Affichage des Rushes lorsque l'on clique sur le bouton Valider -->
              <?php
                 $action = '';
                    if (isset($_POST['valider']))
                    {
                      $req = "SELECT * FROM Rushes;";
                      $resultat =$connexion->query($req);
                       while ($ligne= $resultat->fetch()) {
                         ?>
                         <h4>
                           <th>
                           <?php  echo $ligne['nom_video'];
                           $ligne['nom_video'];
                           ?>
                          </th>
                        </h4>
                           <td>
                            <?php  echo $ligne['nom_rushes'];
                            $ligne['nom_rushes'];
                            ?>
                           </td>
                            <br>
                           <tr>
                               <?php  echo 'Début du Rushe: '.$ligne['tempsDebut'];
                                 $ligne['tempsDebut'];
                                 ?>
                           </tr>
                            <br>
                           <tr>
                               <?php  echo ' Fin du Rushe: '.$ligne['tempsFin'];
                                 $ligne['tempsFin'];
                                 ?>
                           </tr>
                         <?php
                       }
                    }
                    $resultat->closeCursor();
                ?>
           </div>


          </body>
</html>
