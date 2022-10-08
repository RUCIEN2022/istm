<?php
//session_start();
include("app/codes/fonctions/securite.php");
include("app/codes/controles/ControleAgent.php");
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
                        <a href="./" class="site_title"> <span>www.istm-tshikapa.org</span></a>
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
                                    <h3>Comptes utilisateurs</h3>
                                    <a href="Creer_Compte.php" class="badge bg-success text-white p-2 pb-2 float-right" data-toggle="modal" data-target=".bs-example-modal-lg">Nouveau Compte</a><br><br>
                                </div>
                                <table class="table table-condensed table-striped">
                                    <thead>
                                        <tr>
                                            <th scope="col">Email</th>
                                            <th scope="col">Pseudo</th>
                                            <th scope="col">Role</th>
                                            <th scope="col">Type Compte</th>
                                            <th scope="col">Date Créat</th>
                                            <th scope="col">Statut</th>
                                            <th scope="col">Opération</th>


                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if (isset($Res_List)) {
                                            while ($data = $Res_List->fetch()) {
                                        ?>

                                                <tr class="">
                                                    <td><?php echo $data['Email']; ?></td>
                                                    <td><?php echo $data['Pseudo']; ?></td>
                                                    <td><?php echo $data['role']; ?></td>
                                                    <td><?php echo $data['CodeTypeCpte']; ?></td>
                                                    <td><?php echo $data['DateCrea']; ?></td>


                                                    <td>
                                                        <?php
                                                        if ($data['EtatCompte'] == "1") {
                                                        ?>
                                                            <?php
                                                            echo '<span class="text-success">Compte Actif</span>&nbsp;&nbsp; <a href="EtatCompte.php?idCompte=' . $data['IdCompte'] . '&etat=0' . '&statut=Bloqué" class="badge bg-success text-white p-2" id="Bdge">&nbsp;&nbsp;Bloquer</a>';
                                                            ?>
                                                        <?php
                                                        } else {
                                                            echo '<span class="text-danger">Compte Bloqué</span>&nbsp;&nbsp; <a href="EtatCompte.php?idCompte=' . $data['IdCompte'] . '&etat=1' . '&statut=Actif" class="badge bg-danger text-white p-2" id="Bdge">&nbsp;Débloquer</a>';
                                                        }
                                                        ?>


                                                    </td>
                                                    <td>
                                                        <a href="#modifierCompte.php?idCompte=<?php echo $data['IdCompte']; ?>&email=<?php echo $data['Email']; ?>&pseudo=<?php echo $data['Pseudo']; ?>&role=<?php echo $data['role']; ?>&typecpte=<?php echo $data['CodeTypeCpte']; ?>&etat=<?php echo $data['EtatCompte']; ?>" class="badge bg-white" id="Bdge">&nbsp;&nbsp;<i class="fa fa-pencil-square-o"></i>&nbsp;&nbsp;Modifier&nbsp;&nbsp;</a>
                                                        <a href="SupprimerCompte.php?idCompte=<?php echo $data['IdCompte']; ?>&email=<?php echo $data['Email']; ?>&pseudo=<?php echo $data['Pseudo']; ?>&role=<?php echo $data['role']; ?>&typecpte=<?php echo $data['CodeTypeCpte']; ?>&etat=<?php echo $data['EtatCompte']; ?>" class="badge bg-white" id="Bdge">&nbsp;&nbsp;<i class="fa fa-clear-square-o"></i>&nbsp;&nbsp;Supprimer&nbsp;&nbsp;</a>
                                                   
                                                    
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

                                            <div class="modal-header">
                                                <span class="font-weight-bold">
                                                    <h3> Nouveau Compte utilisateur</h3>
                                                </span>
                                                <hr>
                                                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form method="POST" enctype="" class="form-data pt-3 width:50">
                                                    <div class=" card shadow" id="Paneau">
                                                        <div class="card-body">
                                                            <label class="">Email :</label>

                                                            <div class="input-group mb-2">

                                                                <input type="text" class="form-control mt-0" placeholder="Entrer l'email" name="Email">


                                                            </div>
                                                            <label class="">Nom Utilisateur :</label>
                                                            <div class="input-group mb-2">
                                                                <input type="text" class="form-control mt-0 ml-2" placeholder="Entrer votre pseudo" name="UserName">
                                                            </div>
                                                            <label class="">Mot de passe :</label>
                                                            <div class="input-group mb-2">

                                                                <input type="password" class="form-control mt-0" placeholder="Entrer Mot de passe" name="Pass">

                                                                <input type="password" class="form-control mt-0 ml-2" placeholder="Repeter Mot de passe" name="RptMdp">
                                                            </div>

                                                            <?php if (isset($res_msge)) {
                                                                echo $res_msge;
                                                            } ?>


                                                        </div>
                                                    </div>

                                            </div>
                                            <div class="modal-footer">

                                                <div class="form-group">
                                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Annuler</button>
                                                    <button type="submit" class="btn btn-primary float-right" name="BtnCreer" id="BtnCreer"><i class="fa fa-user-circle"></i> Créer Compte</button>
                                                </div>
                                            </div>
                                            </form>
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