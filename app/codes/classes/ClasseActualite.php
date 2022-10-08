
<?php
include("app/codes/classes/ClasseConnexion.php");
class Actualites
{
	private $IdActualites;
	private $Titre;
	private $Contenu;
	private $CodeTypeActu;
	private $ImageActu;
	private $Etat;

	function fx_AjouterActualites($DatePub, $Titre, $Contenu, $CodeTypeActu, $ImageActu, $Etat)
	{
		$this->Cat = $CodeTypeActu;
		$this->Titre = $Titre;
		$this->contenu = $Contenu;
		$this->Fichier = $ImageActu;
		$this->Etat = $Etat;

		$requete = 'insert into actualites(DatePub, Titre, Contenu, CodeTypeActu, ImageActu, Etat) values(CURRENT_TIMESTAMP,"' . $this->Titre . '","' . $this->contenu . '","' . $this->Cat . '","' . $this->Fichier . '","' . $this->Etat . '")';
		//echo $requete;
		$conn = new connect();
		$resultat = $conn->fx_ecriture($requete);
		if ($resultat) {
			return $resultat;
		} else {
			return false;
		}
	}


	//Creation de la fonction Modifierproduit
	function fx_ModifierActualites($IdActualites, $Titre, $Contenu, $CodeTypeActu, $ImageActu, $Etat)
	{
		$this->IdActualites = $IdActualites;
		$this->Titre = $Titre;
		$this->Contenu = $Contenu;
		$this->ImageActu = $ImageActu;
		$this->Etat = $Etat;

		$requete = "update actualites set Titre='" . $this->Titre . "',Contenu='" . $this->Contenu . "',CodeTypeActu='" . $this->CodeTypeActu . "',ImageActu='" . $this->ImageActu . "',Etat='" . $this->Etat . "' where IdActualites='" . $this->IdActualites . "' limit 1";
		$conn = new connect(); // preperation de la conexion
		$resultat = $conn->fx_modifier($requete);
	}

	//Cr�ation de la fonction Rechercher produit et Afficher directement
	function fx_rechercheActualite($IdActualites)
	{
		$requete = "select * from actualites where IdActualites=" . $IdActualites . " and Etat=1";
		$conn = new connect(); // preperation de la conexion
		$resultat = $conn->fx_lecture($requete);
		if ($resultat) {
			return $resultat;
		} else {
			return false;
		}
	}

	//Cr�ation de la fonction Liste g�n�rale des Produits
	function fx_ListeActualites()
	{

		$requete = "select * from actualites where Etat=1 order by IdActualites";
		//echo $requete; 
		$conn = new connect(); // preperation de la conexion
		$resultat = $conn->fx_lecture($requete);
		if ($resultat) {

			return $resultat;
		} else {
			return false;
		}
	}
	function fx_Liste_Dernieres_3_Actualites()
	{

		$requete = "select * from actualites where Etat=1 order by IdActualites desc Limit 3";
		//echo $requete; 
		$conn = new connect(); // preperation de la conexion
		$resultat = $conn->fx_lecture($requete);
		if ($resultat) {

			return $resultat;
		} else {
			return false;
		}
	}
	function fx_Liste_Dernieres_6_Actualites()
	{

		$requete = "select * from actualites where Etat=1 order by IdActualites desc Limit 6";
		//echo $requete; 
		$conn = new connect(); // preperation de la conexion
		$resultat = $conn->fx_lecture($requete);
		if ($resultat) {

			return $resultat;
		} else {
			return false;
		}
	}
	function fx_Liste_Actualites_All()
	{

		$requete = "select * from actualites order by IdActualites desc";
		//echo $requete; 
		$conn = new connect(); // preperation de la conexion
		$resultat = $conn->fx_lecture($requete);
		if ($resultat) {

			return $resultat;
		} else {
			return false;
		}
	}
	function fx_Liste_Type_Actu()
	{
		$req = "select * from typeactualites order by NomTypeActu asc";
		$conn = new connect();
		$result = $conn->fx_lecture($req);
		if ($result) {
			return $result;
		} else {
			return false;
		}
	}
	function fx_ChangementEtatActualite($IdActualites, $Etat)
	{
		$requete = "update actualites set Etat='" . $Etat . "' where IdActualites=" . $IdActualites;
		//echo $requete;
		$conn = new connect(); // preperation de la conexion
		$resultat = $conn->fx_modifier($requete);
	}
	//----------------Activites------------------------------------------------------
	function fx_AjouterActivites($DatePub, $Titre, $Contenu, $ImageProfile, $Etat)
	{


		$requete = 'insert into activites(DatePub, Titre, Contenu, ImageProfile, Etat) values(CURRENT_TIMESTAMP,"' . $Titre . '","' . $Contenu . '","' . $ImageProfile . '","' . $Etat . '")';
		//echo $requete;
		$conn = new connect();
		$resultat = $conn->fx_ecriture($requete);
		if ($resultat) {
			return $resultat;
		} else {
			return false;
		}
	}
	function fx_rechercheActivite($IdActivite)
	{
		$requete = "select * from activites
		where activites.Etat=1
		and activites.IdActivite=" . $IdActivite . "";
		$conn = new connect(); // preperation de la conexion
		$resultat = $conn->fx_lecture($requete);
		if ($resultat) {
			return $resultat;
		} else {
			return false;
		}
	}
	function fx_rechercheAImagesctivite($IdActivite)
	{
		$requete = "select NomFichier from fichier where IdActivite=" . $IdActivite . "";
		$conn = new connect(); // preperation de la conexion
		$resultat = $conn->fx_lecture($requete);
		if ($resultat) {
			return $resultat;
		} else {
			return false;
		}
	}

	function fx_ListeActivites()
	{

		$requete = "select * from activites where Etat=1 order by IdActivite";
		//echo $requete; 
		$conn = new connect(); // preperation de la conexion
		$resultat = $conn->fx_lecture($requete);
		if ($resultat) {

			return $resultat;
		} else {
			return false;
		}
	}
	function fx_Liste_Dernieres_5_Activites()
	{
		$requete = "select * from activites
		            where activites.Etat=1 order by activites.IdActivite asc LIMIT 5";
		//echo $requete; 
		$conn = new connect(); // preperation de la conexion
		$resultat = $conn->fx_lecture($requete);
		if ($resultat) {

			return $resultat;
		} else {
			return false;
		}
	}
	function fx_Liste_Dernieres_6_Activite()
	{

		$requete = "select * from activites
		where activites.Etat=1 order by activites.IdActivite asc LIMIT 6";
		//echo $requete; 
		$conn = new connect(); // preperation de la conexion
		$resultat = $conn->fx_lecture($requete);
		if ($resultat) {

			return $resultat;
		} else {
			return false;
		}
	}
	function fx_Liste_Activite_All()
	{

		$requete = "select * from activites order by IdActivite desc";
		//echo $requete; 
		$conn = new connect(); // preperation de la conexion
		$resultat = $conn->fx_lecture($requete);
		if ($resultat) {

			return $resultat;
		} else {
			return false;
		}
	}

	function fx_ChangementEtatActivite($IdActivite, $Etat)
	{
		$requete = "update activites set Etat='" . $Etat . "' where IdActivite=" . $IdActivite;
		//echo $requete;
		$conn = new connect(); // preperation de la conexion
		$resultat = $conn->fx_modifier($requete);
	}

	// -------------- Rapports----------------------------------
	function fx_AjouterRapport($DatePub, $Fichier, $Contenu, $Etat)
	{


		$requete = 'insert into rapport(DatePub, Fichier, Contenu, Etat) values(CURRENT_TIMESTAMP,"' . $Fichier . '","' . $Contenu . '","' . $Etat . '")';
		//echo $requete;
		$conn = new connect();
		$resultat = $conn->fx_ecriture($requete);
		if ($resultat) {
			return $resultat;
		} else {
			return false;
		}
	}
	function fx_Liste_Rapport_All()
	{

		$requete = "select * from tapport order by IdRapport desc";
		//echo $requete; 
		$conn = new connect(); // preperation de la conexion
		$resultat = $conn->fx_lecture($requete);
		if ($resultat) {

			return $resultat;
		} else {
			return false;
		}
	}
}


?>