<?php
include_once ("ClasseConnexion.php");
class SMS {

		  function fx_creerStockSMS($Nombre, $Reste, $EtatStock_Sms, $Stock_UserName, $Stock_Key, $Stock_URL){

	          $requete="INSERT INTO stock_sms (IdStock, Nombre, Reste, DateHeur_Save, EtatStock_Sms, Stock_UserName, Stock_Key, Stock_URL) VALUES (NULL, '".$Nombre."', '".$Nombre."', NOW(), '1', '".$Stock_UserName."', '".$Stock_Key."', '".$Stock_URL."');";
				//echo $requete;
			  $conn=new connect();// preperation de la conexion
                $resultat=$conn->fx_ecriture($requete);// execution de la requete
                if ($resultat){
                	return $resultat;
                 }
                else{
                	return false;
                }
		  }

		 function fx_creerCompte($IdStock, $IdTransact, $Num_Tel, $Msg_SMS){

	          $requete="INSERT INTO sms_send (IdSms_Send, IdStock, IdTransact, Num_Tel, Msg_SMS, Etat_Send) VALUES (NULL, '".$IdStock."', '".$IdTransact."', '".$Num_Tel."', '".$Msg_SMS."', '0');";
				//echo $requete;
			  $conn=new connect();// preperation de la conexion
                $resultat=$conn->fx_ecriture($requete);// execution de la requete
                if ($resultat){
                	return $resultat;
                 }
                else{
                	return false;
                }
		  }

		  function fx_AjoutOutBox($IdTransact, $Num_Tel, $Msg_SMS){

	          $requete="INSERT INTO sms_send (IdSms_Send, IdStock, IdTransact, Num_Tel, Msg_SMS, Etat_Send) VALUES (NULL, '0', '".$IdTransact."', '".$Num_Tel."', '".$Msg_SMS."', '0');";
				//echo $requete;
			  $conn=new connect();// preperation de la conexion
                $resultat=$conn->fx_ecriture($requete);// execution de la requete
                if ($resultat){
                	return $resultat;
                 }
                else{
                	return false;
                }
		  }

		  function fx_ModiferEtatSMS($IdSms_send,$Etat_Send, $IdStock){

  	           $requete="update sms_send set Etat_Send='".$Etat_Send."', IdStock='".$IdStock."' where sms_send.IdSms_Send='".$IdSms_send."' limit 1";
               //echo $requete;
               $conn=new connect();// preperation de la conexion (extentier)
               $resultat=$conn-> fx_modifier($requete);

  			}
  		  function fx_ReduitStock($IdStock){

  	           $requete="update stock_sms set Reste=Reste-1 where stock_sms.IdStock='".$IdStock."' limit 1";
               //echo $requete;
               $conn=new connect();// preperation de la conexion (extentier)
               $resultat=$conn-> fx_modifier($requete);

  			}
  		function fx_ModifEtatStock($EtatStock_Sms,$IdStock){

  	           $requete="update stock_sms set EtatStock_Sms=".$EtatStock_Sms." where stock_sms.IdStock='".$IdStock."' limit 1";
               //echo $requete;
               $conn=new connect();// preperation de la conexion (extentier)
               $resultat=$conn-> fx_modifier($requete);

  			}
		  function Prepare_EnvoieSMS(){
		  		$requete="SELECT * FROM stock_sms where EtatStock_Sms=1 and Reste>0 LIMIT 1";
		  		$conn=new connect();
				   $Resultat=$conn->fx_lecture($requete);
					if ($Resultat){
						$this->fx_EnvoieSMS($Resultat);
						return 1;
					}
					else{
						return false;
					}
		  }

		  function fx_EnvoieSMS($Stock){
		  		$requete="SELECT * FROM sms_send where Etat_Send=0";
		  		$conn=new connect();
				   $Resultat=$conn->fx_lecture($requete);
					if ($Resultat){
						//$Stock=Prepare_EnvoieSMS();
						if($Stock){
							while ($row= $Stock->fetch()) {
							$IdStock=$row['IdStock'];
							$Reste=$row['Reste'];
							$Stock_UserName=$row['Stock_UserName'];
							$Stock_Key=$row['Stock_Key'];
							$Stock_URL=$row['Stock_URL'];
							//$Solde=$row['Solde'];
							}
							while ($row= $Resultat->fetch()) {
								if($Reste>0){
									$Num_Tel=$row['Num_Tel'];
									$Msg_SMS=$row['Msg_SMS'];
									$IdSms_Send=$row['IdSms_Send'];
									$this->fx_Api_SMS($Stock_UserName,$Stock_Key,$Stock_URL,$Num_Tel,$Msg_SMS,$IdSms_Send,$IdStock);
								}else{
									//Ferme stock quand si les sms sont fini
									$this->fx_ModifEtatStock("2",$IdStock);
								}
								$Reste--;
							}
						}
						
							//return $Solde;
					}
					else{
						return false;
					}
		  }
		  function fx_Api_SMS($Stock_UserName,$Stock_Key,$Stock_URL,$Num_Tel,$Msg_SMS,$IdSms_send,$IdStock){
		  	
		  	$URL=$Stock_URL;
		  	$username=$Stock_UserName;
		  	$app_key=$Stock_Key;
		  	$tel=$Num_Tel;
		  	$message=$Msg_SMS;
		  	//$message="bonjour";
		  	$message=urlencode($message);
		  	$from="Setram";
		  	$Lien=$Stock_URL."?username=".$username."&app_key=".$app_key."&tel=".$tel."&message=".$message."&from=".$from;
		  	
			//echo "#".$Lien."#";

			if (! function_exists ( 'curl_version' )) {
			    //exit ( "Enable cURL in PHP" );
			    return 0;
			}
		  	$callurl = curl_init();
		  	$timeout = 0; 
			
			curl_setopt ( $callurl, CURLOPT_URL, $Lien );
			curl_setopt ( $callurl, CURLOPT_HEADER, 0 );
			curl_setopt ( $callurl, CURLOPT_RETURNTRANSFER, 1 );
			curl_setopt ( $callurl, CURLOPT_CONNECTTIMEOUT, $timeout );
			$response = curl_exec ( $callurl );

			if (curl_errno ( $callurl )) {
			    //echo "#--".curl_error ( $callurl )."--#";
			    curl_close ( $callurl );
			    //exit ();
			    return 0;
			}

			
			//echo "--*".$response."*--";
			curl_close($callurl);

			$data = json_decode($response); 
  			
			$Etat=$data->state; 
			$Message=$data->message; 
			if($Etat=="success"){
				//Reussi
				$this->fx_ModiferEtatSMS($IdSms_send,"1",$IdStock);
				$this->fx_ReduitStock($IdStock);
				//echo $Message;
				return 1;
			}else{
				//echo $Message;
				return 0;
			}
		  } 
//{"state":"success","message":"Envoi reussi"}
}