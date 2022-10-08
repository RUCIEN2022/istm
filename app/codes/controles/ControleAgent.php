<?php
include_once("app/codes/classes/ClasseAgent.php");
$Agent = new Compte();
$Res_List = $Agent->fx_List_Gen_Agent();


if (isset($_POST["BtnCreer"])) {
	$formulaire_value = true;


	if ($_POST["Email"] == "") {
		$formulaire_value = false;
		$msgEmail = "le champs Nom est vide";
	}



	if ($_POST["UserName"] == "") {
		$formulaire_value = false;
		$msglogin = "le champ Compte est vide";
	}

	if ($_POST["Pass"] == "") {
		$formulaire_value = false;
		$msgmdp = "le champ Mot de passe est vide";
	}
	if ($_POST["Pass"] != $_POST["RptMdp"]) {
		$formulaire_value = false;
		$ConfirmMdp = "les deux mots de passe ne correspondent pas!";
	}

	if ($formulaire_value == true) {
		//echo $_POST["mdp"];
		// $Agent=new Compte();
		$resultat = $Agent->fx_CreerCompte($_POST["UserName"], $_POST["Pass"], "", $_POST["Email"], "", "", "", "");
		if ($resultat) {
			$res_msge = '<div class="alert alert-success alert-dismissible fade show" role="alert">
					  <strong>Succès :</strong> Compte Agent enregistré avec succès.
					  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
					    <span aria-hidden="true">&times;</span>
					  </button>
					</div>';
			//echo $res_success;
			header("location:comptes.php");
		} else {
			$res_msge = '<div class="alert alert-warning alert-dismissible fade show" role="alert">
					  <strong>Erreur :</strong> Opération échouée, veuillez bien remplir le formulaire.
					  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
					    <span aria-hidden="true">&times;</span>
					  </button>
					</div>';
			//echo $res_msge;
		}
	}
}
