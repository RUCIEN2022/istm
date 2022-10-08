<?php 
include("codes/fonctions/securite.php");
include("codes/controles/ControleAgent.php");
?>
<!DOCTYPE html>
<html lang="fr">
  
  <head>
    
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    
    <link rel="stylesheet" href="bootstrap_4_1_3/css/bootstrap.min.css" crossorigin="anonymous">
    <link href="fontawesome5_13/css/all.css" rel="stylesheet">
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    
    <!-- Custom styles for this template -->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

     
    <style>
      body {
     
    }
    @media all{
      #Paneau{
        border-radius: 12px 0px 12px 0px;
          box-shadow: 6px 3px 6px 3px #686868;
          
          background-color: #bfbfbf;
          padding-top: 2rem;
      }
       #TitlPanel{
            font-size: 16px;
            font-weight: 700;
        }
      #Titre{
       
        padding-bottom: 10px;
        font-size: 25px;
        font-family: Maiandra GD;

      }
      #BtnEnvoye{
         
          box-shadow: 2px 2px 2px #9a9a9a;
          font-size: 13px;
          
          padding-left: 20px;
          padding-right: 20px;
          padding-bottom: 5px;
          font-style: normal;
      }
      

    }
    
      
    </style>

    <!--<link rel="stylesheet" type="text/css" media="screen" href="UniCodes/Styles/Liste_Actu.css" />-->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Classe Virtuelle | Cours</title>

    <!-- Custom fonts for this template -->
    <link rel="stylesheet" href="bootstrap_4_1_3/css/bootstrap.min.css" crossorigin="anonymous">
    <link href="fontawesome5_13/css/all.css" rel="stylesheet">
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    
    <!-- Custom styles for this template -->
    <link href="css/sb-admin-2.min.css" rel="stylesheet"> 
    <!-- dtpicker -->
     <link href = "PickDate/css/jquery-ui.css" rel = "stylesheet">
      <script src = "PickDate/js/jquery-1.10.2.js"></script>
      <script src = "PickDate/js/jquery-ui.js"></script>

    
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    
  </head>
  <style type="text/css">
    #TitreMenu:hover{
      background-color: #ffffff;

    }
    #lien:hover{
      background-color:#f0f8ff;
    }
    #TitreEns{
      font-family: Maiandra GD;
      font-size: 25px;
      font-weight: bold;
    }
    
  </style>

  <body style="background: #f4f2f2;">

  <?php 
    require_once("entete_admin.php");
  ?>
    
        <div class="container pt-4" > 
          <div class="row">
            <div class="col-md-4">
              
            </div>
            <div class="col-md-8 pt-5">
              <span class=" text-center" id="TitreEns">Création Compte Agent</span>
              <div class="row">
               
                  <form method="POST" enctype="">
                      <div class=" card shadow" id="Paneau">
                        <div class="card-body">
                              <label class="text-white" >Email :</label>
                              
                        <div class="input-group mb-2">
                            
                            <input type="text" class="form-control mt-0" placeholder="Entrer l'email"  name="Email">
                            
                            
                        </div>
                        <label  class="text-white">Nom Utilisateur :</label>
                        <div class="input-group mb-2">
                            <input type="text" class="form-control mt-0 ml-2" placeholder="Entrer votre pseudo" name="UserName">
                        </div>
                        <label  class="text-white">Mot de passe :</label>
                        <div class="input-group mb-2">
                            
                          <input type="password" class="form-control mt-0" placeholder="Entrer Mot de passe"  name="Pass">
                          <input type="password" class="form-control mt-0 ml-2" placeholder="Repeter Mot de passe" name="RptMdp">
                        </div>
                        
                        <?php if(isset($res_msge)){ echo $res_msge; } ?>
                    <div class="form-group">
                        <button type="submit" class=" p-2" name="BtnCreer" id="BtnCreer"><i class="fa fa-user-circle"></i> Créer Compte</button>
                    </div>
                        
                        </div>
                        </div>
                  </form>
              
              </div>
            </div>
          </div>
         
          
          

        
          
   </div>
   
    <!-- //////////////////////////////////////////////////////////////////////////////////////// -->
    <?php //require_once("pieds.php");?>
   
    <script>
        $(function() {
            $( "#dtcheckout" ).datepicker({
               showWeek:true,
               
               showAnim: "slide",
              
               dateFormat:"dd-mm-yy"
            });
        });

    </script>

    <!--<script src="bootstrap_4_1_3/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>-->
    <script src="bootstrap_4_1_3/js/bootstrap.min.js" crossorigin="anonymous"></script>
   <!-- <script src="codes/machine/TraitementDate.js"></script> -->
      <script src="codes/machine/Cours.js"></script>
  </body>

</html>
