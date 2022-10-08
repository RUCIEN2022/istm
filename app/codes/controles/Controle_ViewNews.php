<?php
include("app/codes/classes/ClasseActualite.php");
$Format_Date = 'd/m/Y';

$ListeActualite = new Actualites();
$Tab_actualites = $ListeActualite->fx_Liste_Dernieres_6_Actualites();
if (isset($_GET["IdNews"])) {
	$IdNews = $_GET["IdNews"];
} else {
	$IdNews = 1;
}

$Tab_Affiche = $ListeActualite->fx_rechercheActualite($IdNews);
if ($Tab_Affiche) {
	while ($row = $Tab_Affiche->fetch()) {

		$chemin = "fichier/site/image/ImageImport/";
		$titre = $row['Titre'];
		$contenu = $row['Contenu'];
		$Image = $row['ImageActu'];
		$dateactu = $row['DatePub'];
	}
}
