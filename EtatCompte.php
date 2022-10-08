<?php
include_once("app/codes/classes/ClasseAgent.php");

	$UpdateCompte=new Compte();
	$Res_Agent=$UpdateCompte->fx_Changer_Etat_Compte($_GET["idCompte"],$_GET["etat"]);
							

	header("location:Comptes.php");
