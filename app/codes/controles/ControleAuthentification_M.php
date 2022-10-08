<?php
session_start();
include_once("app/codes/classes/ClasseAgent.php");

if (isset($_POST["Envoyer"])) {
	$formulaire_value = true;
	if ($_POST["Email"] == "") {
		$formulaire_value = false;
		$msgeuser = "le champ username vide";
	}
	if ($_POST["Mdp"] == "") {
		$formulaire_value = false;
		$msgmotdepasse = "le champ mot de passe est  vide";
	}
	if ($formulaire_value == true) {

		$inscript = new Compte();
		$resultat = $inscript->fx_Authentification($_POST["Email"], $_POST["Mdp"]);
		if ($resultat) {
			while ($data = $resultat->fetch()) {
				$_SESSION['Email'] = $data['Email'];
				$_SESSION['Pseudo'] = $data['Pseudo'];
				$_SESSION['CodeTypeCpte'] = $data['CodeTypeCpte'];
				$_SESSION['role'] = $data['role'];
				$_SESSION['IdCompte'] = $data['IdCompte'];


				$_SESSION['adresseIP'] = $_SERVER['REMOTE_ADDR'];
			}


			if (($_SESSION['CodeTypeCpte'] == 'Admin')) {
				header("location:index.php");
			} elseif ($_SESSION['role'] == 'root') {
				header("location:index.php");
			}
		} else {


			$Sanction = "Compte ou Mot de passe incorrect";
		}
	} else {

		echo "Vde";
	}
}
