<?php
include("codes/classes/ClasseActualite.php");
$Format_Date = 'd/m/Y à H:i';
	$Format_Affiche = 'd/m/Y';
	$Format_Envoie = 'Y/m/d';
	$ReservToday=date($Format_Envoie,time());

    $Ladate=$ReservToday;

$ListeActualite=new Actualites();
$Tab_actualites=$ListeActualite->fx_Liste_Actualites_All();



?>