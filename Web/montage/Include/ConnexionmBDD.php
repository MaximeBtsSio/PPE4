<!-- Connexion a la Base de Données -->
<?php
session_start();
$PARAM_hote = '172.16.99.3';
$PARAM_port = '3306';
$PARAM_nom_bd = 'm.saliou';
$PARAM_utilisateur = 'm.saliou';
$PARAM_mot_passe = 'P@ssword';
$connexion = new PDO('mysql:host='.$PARAM_hote.';port='.$PARAM_port.';dbname='.$PARAM_nom_bd, $PARAM_utilisateur, $PARAM_mot_passe);
?>
