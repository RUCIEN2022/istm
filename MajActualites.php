<?php
//session_start();
include("codes/fonctions/securite.php");
include("codes/controles/ControleListeActualites.php");
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
  <title>Rendez-vous</title>
  <style>
    body {}

    .bg-overlay {
      background: rgba(0, 0, 0, .7);
      position: absolute;
      top: 0;
      bottom: 0;
      left: 0;
      right: 0;
      z-index: 0;
    }



    h2 {
      text-align: center;
      padding: 20px;
    }

    /* Slider */

    .container .engage-txt {
      overflow: hidden;
      /* Ensures the content is not revealed until the animation */
      border-right: .15em orange;
      /* The typwriter cursor */
      white-space: nowrap;
      /* Keeps the content on a single line */
      margin: 0 auto;
      /* Gives that scrolling effect as the typing happens */
      letter-spacing: .15em;
      /* Adjust as needed */
      animation:
        typing 2.5s steps(40, end),
        blink-caret .75s step-end infinite;
    }

    /* The typing effect */
    @keyframes typing {
      from {
        width: 0
      }

      to {
        width: 100%
      }
    }

    /* The typewriter cursor effect */
    @keyframes blink-caret {

      from,
      to {
        border-color: transparent
      }

      50% {
        border-color: orange;
      }
    }
  </style>

<body class="pb-5">
  <?php
  //include_once("entete_admin.php");

  ?>
  <section class=" position-relative pb-1" style="min-height:10vh; background-color:; background-size: cover;background-attachment: fixed;font-family: 'Comfortaa', cursive;">
    <div class="bg-overlay"></div>
    <div class="container position-relative">
      <div class="row d-flex justify-content-between align-items-center">
        <div class="col-xl-10 col-lg-6 col-md-7 text-center text-lg-left mb-2 mb-lg-0">
          <h3 class="font-weight-bold text-white aos-init aos-animate" data-aos="fade-up"> <br>Administration</h1>
        </div>
        <div class="col-xl-6 col-lg-6 col-md-7 text-left">
          <?php if (isset($_SESSION['IdCompte'])) { ?>
            <span class="text-white text-center font-weight-bold"><i class="fa fa-user text-success"></i>
              <?php if (isset($_SESSION['Email'])) {
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
                <li class="breadcrumb-item active" aria-current="page">Gestion des actualités <i class="fa fa-users"></i></li>
              </ol>
            </nav>

          </div>
          <h2 class="font-weight-bold">Liste des publications</h2><a href="Publication.php" class="badge bg-success text-white p-2 pb-2 float-right">Nouvelle publication</a>

          <table class="table table-condensed table-striped">
            <thead>
              <tr>
                <th scope="col">Date public.</th>
                <th scope="col">Titre</th>
                <th scope="col">Contenu</th>
                <th scope="col">Image</th>
                <th scope="col">Statut</th>


              </tr>
            </thead>
            <tbody>
              <?php if (isset($Tab_actualites)) {
                while ($data = $Tab_actualites->fetch()) {
              ?>

                  <tr class="">
                    <td><?php echo date($Format_Affiche, strtotime($data['DatePub'])); ?></td>
                    <td><?php echo $data['Titre']; ?></td>
                    <td><?php echo substr($data['Contenu'], 0, 120) . "..."; ?></td>
                    <td><img class="img-fluid" style="width: 80px;" src="fichier/site/image/ImageImport/<?php echo $data['ImageActu']; ?>">
                    </td>

                    <td>
                      <?php
                      if ($data['Etat'] == "1") {
                      ?>
                        <?php
                        echo '<a href="EtatActu.php?idactu=' . $data['IdActualites'] . '&etat=0' . '&statut=Bloqué" class="badge bg-white" id="Bdge">&nbsp;&nbsp;Offline</a>';
                        ?>
                      <?php
                      } else {
                        echo '<a href="EtatActu.php?idactu=' . $data['IdActualites'] . '&etat=1' . '&statut=Actif" class="badge bg-white" id="Bdge">&nbsp;Publier</a>';
                      }
                      ?>
                    </td>
                    <td>
                      <a href="#modifierActu.php?idactu=<?php echo $data['IdActualites']; ?>&titre=<?php echo $data['Titre']; ?>&contenu=<?php echo $data['Contenu']; ?>&typeactu=<?php echo $data['CodeTypeActu']; ?>&etat=<?php echo $data['Etat']; ?>" class="badge bg-white" id="Bdge">&nbsp;&nbsp;<i class="fa fa-pencil-square-o"></i>&nbsp;&nbsp;Voir détails&nbsp;&nbsp;</a>
                    </td>

                  </tr>

              <?php }
              } ?>
            </tbody>
          </table>
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
      $(document).ready(function() {
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