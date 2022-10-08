<?php
//session_start();
include("codes/fonctions/securite.php");
include("codes/controles/ControleAjoutPublication.php");
?>
<!DOCTYPE html>
<html lang="fr">
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<!------ Include the above in your HEAD tag ---------->

<head>
  <link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Comfortaa:wght@300&display=swap" rel="stylesheet"> 

    <link rel="stylesheet" href="bootstrap_4_1_3/css/bootstrap.min.css" crossorigin="anonymous">
    <link href="fontawesome5_13/css/all.css" rel="stylesheet">
    <link rel="icon" type="image/png" href="fichier/site/image/logoeureka1.png" />
    <title>Publication</title>
    <style>
      body{

      }
      .bg-overlay{
          background: rgba(0,0,0, .7);
          position: absolute;
          top: 0;
          bottom: 0;
          left: 0;
          right:0;
          z-index: 0;
        }
      

     
h2{
  text-align:center;
  padding: 5px;
}


.form-data{

  width: 100%;  
  
  display: -webkit-box;
  display: -webkit-flex;
  display: -moz-box;
  display: -ms-flexbox;
  display: flex;
  flex-wrap: wrap;
  justify-content: center;
  align-items: center;
  padding: 50px;
  background-repeat: no-repeat;
  background-size: cover;
  background-position: center;
  
  position: relative;

}
#Paneau{
  width: 60rem;  
}

    </style>

<body class="">
      <?php
        //include_once("entete_admin.php");

        ?>
      <section class=" position-relative pb-1" style="min-height:10vh; background-color:; background-size: cover;background-attachment: fixed;">
        <div class="bg-overlay"></div>
        <div class="container position-relative">
          <div class="row d-flex justify-content-between align-items-center">
            <div class="col-xl-10 col-lg-6 col-md-7 text-center text-lg-left mb-2 mb-lg-0">
              <h1 class="display-5 font-weight-bold text-white aos-init aos-animate" data-aos="fade-up"> <br> Opérations d'administration</h1>
            </div>
            <div class="col-xl-6 col-lg-6 col-md-7 text-left">
              <?php if (isset($_SESSION['IdCompte'])){?>
        <span class="text-white text-center font-weight-bold"><i class="fa fa-user text-success"></i>
            <?php if(isset($_SESSION['Email'])){
              echo $_SESSION['Email'];
              } ?>
        </span>
            <?php } ?>
            </div>

            
          </div>
        </div>

      </section>
      <section class="pt-2" style="font-family:;background-attachment: fixed;">
          <div class="container  pt-2">
            <div class="row d-flex justify-content-between">
             
              <div class="col-md-12">
               
             <?php include_once("menuoperation.php"); ?>
              
              </div>
            
             
            </div>
          </div>
        </section>
       <section class="contact pt-2 bg-light" id="contact">
        <div class="container">
          <div class="row">
     
         <div class="col-md-12">
           <div class="col-md-5">
                
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.php">admin</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Gestion des publications <i class="fa fa-users"></i></li>
                </ol>
            </nav>
              
              </div>
              <div class="">
                <h2 class="font-weight-bold">Ajouter Nouvelle publication</h2><a href="MajActualites.php" class="badge bg-success text-white p-2 pb-2 mr-5 float-right" id="LP">Liste des Publications</a>
              </div>
              
              <form method="POST" enctype="multipart/form-data" class="form-data pt-1" style="width:">
                      <div class=" card shadow" id="Paneau">
                        <div class="card-body">
                        <label class="" >Titre de la publication <span class="text-danger">*</span></label> 
                        <div class="input-group mb-2">
                            <input type="text" class="form-control mt-0" placeholder="Entrer le titre"  name="Titre">
                        </div>
                        <label class="" >Contenu de la publication <span class="text-danger">*</span></label>
                        <div class="input-group mb-2">
                            <textarea class="form-control" name="contenu" style="height: 350px"></textarea>
                        </div>
                        <label class="" >Image <span class="text-danger">*</span> (Max 2Mo)</label> 
                        <div class="input-group mb-2">
                            <input type="file" class="form-control" id="Fichier" name="Fichier">
                        </div>
                        
                        <?php if(isset($res_msge)){ echo $res_msge; } ?>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary p-2 float-right" name="BtnCreer" id="BtnCreer"><i class="fa fa-user-circle"></i> Créer Publication</button>
                    </div>
                        
                        </div>
                        </div>
                  </form>
          </div>
   
          </div>
  </div>
  
   

      <?php
        //include_once("footer.php");

        ?>
 
    <script src="bootstrap_4_1_3/js/jquery_3_3_1.js" crossorigin="anonymous"></script>
    <!--<script src="bootstrap_4_1_3/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>-->
    <script src="bootstrap_4_1_3/js/bootstrap.min.js" crossorigin="anonymous"></script>
    <script src="codes/machine/MachineInvest.js" crossorigin="anonymous"></script>
    <!--<script src="codes/machine/MachineCompteInvest.js" crossorigin="anonymous"></script>-->
    <script src="https://code.jquery.com/jquery-2.2.0.min.js" type="text/javascript"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.6.0/slick.js"></script>
    <script>
      $(document).ready(function(){
    $('.customer-logos').slick({
        slidesToShow: 6,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 1500,
        arrows: false,
        dots: false,
        pauseOnHover: false,
        responsive: [{
            breakpoint: 768,
            settings: {
                slidesToShow: 4
            }
        }, {
            breakpoint: 520,
            settings: {
                slidesToShow: 3
            }
        }]
    });
});
    </script>

</body>  
</html>