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
             <h3> Détail Vidéo </h3>
               <select name="nomvideo" required="">
                 <option value="">Sélectionnez une vidéo</option>
                 <?php
                 $req = "SELECT * FROM video;";
                 $resultat =$connexion->query($req);
                 while ($ligne= $resultat->fetch()) {
                   echo "<option value=''>".$ligne[nom]."</option>";
                 }

                 $resultat->closeCursor();
                 ?>
               </select>
                 <input type="submit" value="Valider"/>
           </div>


          </body>
</html>
