<?php
include_once("app/codes/classes/ClasseConnexion.php");
class Compte
{
	private $IdCompte;
	private $Pseudo;
	private $Mdp;
	private $DateCrea;
	private $Email;
	private $CodeTypeCpte;
	private $role;
	private $profile;
	private $EtatCompte;


	function fx_CreerCompte($Pseudo, $Mdp, $DateCrea, $Email, $CodeTypeCpte, $role, $profile, $EtatCompte)
	{

		$this->Email = $Email;
		$this->Username = $Pseudo;
         //echo $Mdp;
		$this->Pass = crypt($Mdp);
		//$this->Pass = $Mdp;

		$requete = 'INSERT INTO compte(Pseudo,Mdp,DateCrea,Email,CodeTypeCpte,role,profile,EtatCompte) VALUES ("' . $this->Username . '","' . $this->Pass . '",CURRENT_TIMESTAMP,"' . $this->Email . '","Admin","gestion","",1)';
		echo $requete;
		$conn = new connect(); // preperation de la conexion
		$resultat = $conn->fx_ecriture($requete); // execution de la requete
		if ($resultat) {
			return $resultat;
		} else {
			return false;
		}
	}


	function fx_Trouver_Mdp($Email)
	{
		$this->Email = $Email;
		$requete = "select * from compte where Email='" . $this->Email . "' AND EtatCompte=1";
		$requete = sprintf($requete, $Email);
		$conn = new connect();
		$Resultat = $conn->fx_lecture($requete);
		if (!$Resultat) {
			return false;
		} else {
			while ($row = $Resultat->fetch()) {
				$MdpInterne = $row['Mdp'];
				return $MdpInterne;
			}
		}
	}

	function fx_Authentification($Email, $Mdp)
	{
		$this->Email = $Email;
		$this->Mdp = $Mdp;
		if (empty($Email)) {
			return FALSE;
		} // Pas de Login vide
		if (empty($Mdp)) {
			return FALSE;
		} // Pas de mot de passe vide
		$interne = $this->fx_Trouver_Mdp($Email); // On récupère l'ancien
		if ($interne) { //si l'on a trouvé le mdp cherché
			$crypt = crypt($Mdp, $interne); // On crypte le nouveau
			if ($interne == $crypt) {
				$requete = "select * from compte where Email='" . $this->Email . "' AND EtatCompte=1";
				$requete = sprintf($requete, $Email);
				$conn = new connect();
				$Resultat = $conn->fx_lecture($requete);
				if ($Resultat) {
					//echo "Trouve ici";
					return $Resultat;
				} else {
					//echo "Trouve Pas";
					return false;
				}
			}
		} else {

			return false;
		}
	}


	function fx_List_Gen_Agent()
	{
		$requete = "select * from compte";
		$conn = new connect(); // preperation de la conexion
		$resultat = $conn->fx_lecture($requete);
		if ($resultat) {
			return $resultat;
		} else {
			return $resultat;
		}
	}


	function fx_Changer_Etat_Compte($IdCompte, $EtatCompte)
	{
		$this->Etat = $EtatCompte;

		$requete = "UPDATE compte SET EtatCompte='" . $this->Etat . "' WHERE compte.IdCompte ='" . $IdCompte . "' LIMIT 1";
		$conn = new connect(); // preperation de la conexion
		$Resultat = $conn->fx_modifier($requete);
	}

	function fx_Recuper_Mdp_Compte($IdCompte)
	{
		$requete = "select Mdp from compte where IdCompte='" . $IdCompte . "' AND Etat=1";
		$conn = new connect(); // preperation de la conexion
		$resultat = $conn->fx_lecture($requete);
		if ($resultat) {
			return $resultat;
		} else {
			return false;
		}
	}

	function fx_changer_mdp($IdCompte, $Mdp)
	{
		$crypt = crypt($Mdp); // On crypte le nouveau
		if ($crypt) {
			$requete = "UPDATE compte set Mdp='" . $crypt . "' where compte.IdCompte =" . $IdCompte . " LIMIT 1";
			$requete = sprintf($requete, $Mdp, $IdCompte);
			$conn = new connect(); // preperation de la conexion
			$Resultat = $conn->fx_modifier($requete);
		}
	}
	function fx_Supprimer_Compte($IdCompte){
		 $requete="delete from compte where IdCompte='".$IdCompte."'";
		 $conn= new connect();
		 $resultat=$conn->fx_modifier($requete);

	}

}
