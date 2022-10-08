<?php
	include_once("app/codes/classes/ClasseAgent.php");
	$Format_Date = 'd/m/Y à H:i';
	$Format_Affiche = 'd/m/Y';
	$Format_Envoie = 'Y/m/d';
	$Aj=date($Format_Envoie,time());

	$recherche=new Compte();	
	$Res_List=$recherche->fx_List_Gen_Agent();
