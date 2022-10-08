<?php
//session_start();
include("app/codes/fonctions/securite.php");
include("app/codes/controles/ControleAjoutPublication.php");
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="images/favicon.ico" type="image/ico" />

    <title> Administration </title>

    <!-- Bootstrap -->
    <link href="vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="vendors/iCheck/skins/flat/green.css" rel="stylesheet">

    <!-- bootstrap-progressbar -->
    <link href="vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">
    <!-- JQVMap -->
    <link href="vendors/jqvmap/dist/jqvmap.min.css" rel="stylesheet" />
    <!-- bootstrap-daterangepicker -->
    <link href="vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="build/css/custom.min.css" rel="stylesheet">
</head>

<body class="nav-md">
    <div class="container body">
        <div class="main_container">
            <div class="col-md-3 left_col">
                <div class="left_col scroll-view">
                    <div class="navbar nav_title" style="border: 0;">
                        <a href="./" class="site_title"> <span>www.refec.net</span></a>
                    </div>

                    <div class="clearfix"></div>
                    <?php include("leftnav.php"); ?>
                    <!-- /sidebar menu -->
                </div>
            </div>

            <!-- top navigation -->
            <?php include("topnav.php"); ?>
            <!-- /top navigation -->

            <!-- page content -->
            <div class="right_col" role="main">
                <!-- top tiles -->
                <div class="row" style="display: inline-block;">
                    <div class="tile_count">
                        <h1>Administration du site</h1>
                    </div>
                </div>
                <!-- /top tiles -->

                <div class="row">
                    <div class="col-md-12 col-sm-12 ">
                        <div class="dashboard_graph">

                            <div class="row x_title">
                                <div class="col-md-12">
                                    <h3>Gestionnaire d'actualités</h3>
                                    <a href="Creer_Compte.php" class="badge bg-success text-white p-2 pb-2 float-right" data-toggle="modal" data-target=".bs-example-modal-lg">Nouvelle publication</a><br><br>
                                </div>
                                <table class="table table-condensed table-striped">
                                    <thead>
                                        <tr>
                                            <th scope="col">Date</th>
                                            <th scope="col">Titre</th>
                                            <th scope="col">Contenu</th>
                                            <th scope="col">Image</th>
                                            <th scope="col"></th>
                                            <th scope="col"></th>
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
                                                    <td><img class="img-fluid" style="width: 80px;" src="../fichier/site/image/ImportNews/<?php echo $data['ImageActu']; ?>">
                                                    </td>

                                                    <td>
                                                        <?php
                                                        if ($data['Etat'] == "1") {
                                                        ?>
                                                            <?php
                                                            echo '<a href="EtatActu.php?idactu=' . $data['IdActualites'] . '&etat=0' . '&statut=Bloqué" class="badge bg-white" id="Bdge">&nbsp;&nbsp;Mettre offline</a>';
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
                                <!-- Modal -->
                                <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">

                                            <div class="modal-header" style="background-color:#3b3b4c;">
                                                <span class="font-weight-bold">
                                                    <h3 class="text-white font-weight-bold"> Ajouter une nouvelle actualité</h3>
                                                </span>
                                                <hr>
                                                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">

                                            </div>
                                        </div>
                                    </div>
                                    <!-- Fin Modal -->
                                </div>

                                <div class="clearfix"></div>
                            </div>
                        </div>

                    </div>
                    <br />

                </div>
                <!-- /page content -->

                <!-- footer content -->
                <footer>
                    <div class="pull-right">
                        Powered by <a href="#">Golden Consult</a>
                    </div>
                    <div class="clearfix"></div>
                </footer>
                <!-- /footer content -->
            </div>
        </div>

        <!-- jQuery -->
        <script src="vendors/jquery/dist/jquery.min.js"></script>
        <!-- Bootstrap -->
        <script src="vendors/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
        <!-- FastClick -->
        <script src="vendors/fastclick/lib/fastclick.js"></script>
        <!-- NProgress -->
        <script src="vendors/nprogress/nprogress.js"></script>
        <!-- Chart.js -->
        <script src="vendors/Chart.js/dist/Chart.min.js"></script>
        <!-- gauge.js -->
        <script src="vendors/gauge.js/dist/gauge.min.js"></script>
        <!-- bootstrap-progressbar -->
        <script src="vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
        <!-- iCheck -->
        <script src="vendors/iCheck/icheck.min.js"></script>
        <!-- Skycons -->
        <script src="vendors/skycons/skycons.js"></script>
        <!-- Flot -->
        <script src="vendors/Flot/jquery.flot.js"></script>
        <script src="vendors/Flot/jquery.flot.pie.js"></script>
        <script src="vendors/Flot/jquery.flot.time.js"></script>
        <script src="vendors/Flot/jquery.flot.stack.js"></script>
        <script src="vendors/Flot/jquery.flot.resize.js"></script>
        <!-- Flot plugins -->
        <script src="vendors/flot.orderbars/js/jquery.flot.orderBars.js"></script>
        <script src="vendors/flot-spline/js/jquery.flot.spline.min.js"></script>
        <script src="vendors/flot.curvedlines/curvedLines.js"></script>
        <!-- DateJS -->
        <script src="vendors/DateJS/build/date.js"></script>
        <!-- JQVMap -->
        <script src="vendors/jqvmap/dist/jquery.vmap.js"></script>
        <script src="vendors/jqvmap/dist/maps/jquery.vmap.world.js"></script>
        <script src="vendors/jqvmap/examples/js/jquery.vmap.sampledata.js"></script>
        <!-- bootstrap-daterangepicker -->
        <script src="vendors/moment/min/moment.min.js"></script>
        <script src="vendors/bootstrap-daterangepicker/daterangepicker.js"></script>

        <!-- Custom Theme Scripts -->
        <script src="build/js/custom.min.js"></script>

</body>

</html>