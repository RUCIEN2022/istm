<?php
session_start();  
//include_once($Dossier_Fonctions.'Securite.php');
include_once('codes/classes/ClassesMail.php');
include_once('codes/fonctions/Validation_Formulaire.php');
$Format_DatePub = 'd/m/y à H:i:s';
//
?>
<?php 
//$_SESSION['messageconfirm']="Texto Confirmation";
if (isset($_POST['envoi'])){
$Formulaire_Valide = true;
	if(fx_Verif_vide('FullName')==false){
		$message_Nom='* Aucun Nom saisi';
		$Formulaire_Valide = false;
	}
	elseif(fx_Verif_texte('FullName',1,100)==false){
		$message_Nom='* Nom invalide';
		$Formulaire_Valide = false;
	}

	//verification email
	if(fx_Verif_Email($_POST['Email'])==false){
		$message_mail='* E-mail non valide';
		$Formulaire_Valide = false;
	}
	
	if(fx_Verif_vide('Mobile')==false){
		$message_Tel='* Aucun Numéro de téléphone saisi';
		$Formulaire_Valide = false;
		//echo 'faut tel';
	}
	if(fx_Verif_Email($_POST['sujet'])==0){
		$message_sujet='* Sujet non valide';
		$Formulaire_Valide = false;
	}
	elseif(fx_Verif_texte('Mobile',7,20)==false){
		$message_Tel='* Numéro de téléphone invalide';
		$Formulaire_Valide = false;
		//echo 'faut tel2';
	} 

	if(fx_Verif_vide('comment')==false){
		$message_Message='* Aucun Message saisi';
		$Formulaire_Valide = false;
		//echo 'faut tel';
	}
	
	 if($Formulaire_Valide == true)
	 {
	 		
			if ( filter_has_var(INPUT_POST, "FullName") ) {
				$Nom=filter_input(INPUT_POST, "FullName", FILTER_SANITIZE_STRIPPED) ;
				$Nom=addslashes($Nom);
			}
			
			if ( filter_has_var(INPUT_POST, "Email") ) {
				$email=filter_input(INPUT_POST, "Email", FILTER_SANITIZE_STRIPPED) ;
				$email=addslashes($email);
			}
			if ( filter_has_var(INPUT_POST, "Mobile") ) {
				$NPhone=filter_input(INPUT_POST, "Mobile", FILTER_SANITIZE_STRIPPED) ;
				$NPhone=addslashes($NPhone);
			}
			if ( filter_has_var(INPUT_POST, "sujet") ) {
				$Subj=filter_input(INPUT_POST, "sujet", FILTER_SANITIZE_STRIPPED) ;
				$Subj=addslashes($Subj);
			}
			if ( filter_has_var(INPUT_POST, "comment") ) {
				$Message=filter_input(INPUT_POST, "comment", FILTER_SANITIZE_STRIPPED) ;
				$Message=addslashes($Message);
			}
			$Mess=$Nom.' :'.$Subj.':'.$Message.' ('.$NPhone.')';
			$MailContact=new envoimail();
			$Envoi=$MailContact->fx_envoi_mail_simple('contact.eureka21@gmail.com','Contact Visiteur',$email,$email,$Mess);
			//$Envoi1=$MailContact->fx_envoi_mail_simple('cabinetroger46@gmail.com','Contact Visiteur',$Mail,$Mail,$Mess);
			//$Idres=Id résultat c'est le Id du dernier enregistrerment
			if ($Envoi){
				$_SESSION['messageconfirm']="Votre message a bien été envoyé, une réponse vous sera adressée dans les meilleurs délais.";
				header('location: Contact.php?Step=2');
			}else{
				echo 'Message non envoyé';
				$_SESSION['messageconfirm']="Un problème est survenu pandant l'envoie de votre message.";
				header('location: Contact.php?Step=2');
			}
 }

 }

 
?>