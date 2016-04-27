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
                 <input type="submit" value="Valider"/>

                 <?php

                 if (isset($_POST['nom'])) {


                    $res = mysql_query("SELECT * FROM Rushes WHERE nom='".mysql_real_escape_string($_POST['nom'])."'");
                    echo '<table><tr><th>nom</th><th>timIn</th><th>timOut</th></tr>';
                    while ($ligne = mysql_fetch_assoc($resultat->fetch())) {
                       echo '<tr><td>',$row['nom'],'</td><td>', $row['timeIn'], ', ', $row['timeOut'], '</td></tr>';
                    }
                    echo '</table>';
                 }
                 ?>

           </div>


          </body>
</html>
