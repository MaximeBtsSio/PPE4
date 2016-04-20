<?php
session_start();
$PARAM_hote = 'localhost';
$PARAM_port = '';
$PARAM_nom_bd = 'test';
$PARAM_utilisateur = 'root';
$PARAM_mot_passe = '';
$connexion = new PDO('mysql:host='.$PARAM_hote.';port='.$PARAM_port.';dbname='.$PARAM_nom_bd, $PARAM_utilisateur, $PARAM_mot_passe);
?>
