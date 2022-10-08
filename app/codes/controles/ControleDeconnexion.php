<?php
//session_start();
//echo $_SESSION['idagent'];
// Redirige l'utilisateur s'il n'est pas identifié
if(isset($_POST['Deconnexion'])){
     // Suppression des sessions
     		unset($_SESSION['idagent']);
			unset($_SESSION['role']);
			unset($_SESSION['adresseIP']);
			
			unset($_SESSION['Nom']);
			unset($_SESSION['prenom']);
			
			
     header("Location:index.php");
     
}

?>

