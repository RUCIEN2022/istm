<?php
include_once("app/codes/classes/ClasseAgent.php");

	$UpdateCompte=new Compte();
	$Res_Agent=$UpdateCompte->fx_Supprimer_Compte($_GET["idCompte"]);
							

	header("location:Comptes.php");
?>