<?php
//Fichier contenant les classes relatif aux e-mail
//Auteur : MULUMBA MUYA Fabrice
//Le 03/12/2012

/////////////////////////////
//Classe Mail/////////////
///////////////////////////

class Email{
//les get
 public function get_Destinateur(){
	return $this->Destinateur;
 }
 public function get_Objet(){
	return $this->Objet;
 }
 public function get_Expediteur(){
	return $this->Expediteur;
 }
 public function get_AdresseReponse(){
	return $this->AdresseReponse;
 }
 public function get_Message(){
	return $this->Message;
 }
 public function get_Nom(){
	return $this->Nom;
 }
 public function get_Prenom(){
	return $this->Prenom;
 }


 //les set
 public function set_Destinateur($Destinat){
	$this->Destinateur=$Destinat;
 }
 public function set_Objet($Obj){
	$this->Objet=$Obj;
 }
 public function set_Expediteur($Expedit){
	$this->Expediteur=$Expedit;
 }
 public function set_AdresseReponse($AdresseRep){
	$this->AdresseReponse=$AdresseRep;
 }
 public function set_Message($Mess){
	$this->Message=$Mess;
 }
 public function set_Nom($Nome){
	$this->Nom=$Nome;
 }
 public function set_Prenom($Pren){
	$this->Prenom=$Pren;
 }
 
 
 private $Destinateur;
 private $Objet;
 private $Expediteur;
 private $AdresseReponse;
 private $Message;
 private $Nom;
 private $Prenom;
 private $ListDestinateur;
 
}

class Mail extends Email {

	function fx_envoi_mail_simple($dest,$objet,$Expediteur,$AdresRep,$Message){
		$entetes = "From:".$Expediteur. "\n";
		$entetes .= "Reply-to:".$AdresRep."\n";
		if (mail($dest, $objet, $Message,$entetes)){
			return true;
		}else{
			return false;
		}
	}
	
	
}

?>