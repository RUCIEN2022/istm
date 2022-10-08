<?php
include("app/codes/classes/ClasseActualite.php");
$Format_Date = 'd/m/Y à H:i';
$Format_Affiche = 'd/m/Y à H:i';
$Format_Envoie = 'Y/m/d';
$ReservToday = date($Format_Envoie, time());

$Ladate = $ReservToday;

$ListeActualite = new Actualites();
$Tab_actualite = $ListeActualite->fx_Liste_Dernieres_3_Actualites();
$Tab_activite = $ListeActualite->fx_Liste_Dernieres_4_Activites();
