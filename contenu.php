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
                                <div class="col-md-6">
                                    <h4>Gestionnaire des contenus</h4>
                                </div>
                            </div>
                            <div class="jumbottron">
                                <div class="x_content">
                                    <div class="card-group">
                                        <div class="card">
                                            <div class="card-header bg-white">
                                                <h2 class="text-dark" style="font-weight:bold;"><span class="btn btn-round bg-primary text-light"><i class="fa fa-bullhorn"></i></span> Actualités</h2>
                                            </div>
                                            <div class="card-body bg-light" style="overflow: scroll;height: 350px;">
                                                <button type="button" class="btn btn-sm btn-round btn-primary" data-toggle="modal" data-target=".bs-example-modal-lg">Créer une actualité</button>

                                                <?php if (isset($Tab_actualites)) {
                                                    while ($data = $Tab_actualites->fetch()) {
                                                ?>
                                                        <div class="card">
                                                            <div class="card-body">

                                                                <p class="card-text"><small class="text-muted float-right"><?php echo date($Format_Affiche, strtotime($data['DatePub'])); ?></small></p><br>
                                                                <span><a href=""><?php echo $data['Titre']; ?></a> </span><br>
                                                                <?php if ($data['Etat'] == "1") {
                                                                    echo '<span class="badge bg-success text-light p-2">Online</span>&nbsp;&nbsp';
                                                                    echo '<a href="DesactiverActu.php"><span class="badge bg-primary text-light p-2">Desactiver</span></a>';
                                                                ?>
                                                                <?php
                                                                } else {
                                                                    echo '<span class="badge bg-danger text-light p-2">Offline</span>&nbsp;&nbsp';
                                                                    echo '<a href="PublierActu.php"><span class="badge bg-primary text-light p-2">Passer online</span></a>';
                                                                ?>
                                                                <?php
                                                                }; ?>
                                                                <a href="#updateactu.php?id=<?php echo $data['IdActualites']; ?>" class="btn btn-sm btn-round btn-warning float-right"><i class="fa fa-pencil"></i></a><br><br>
                                                                <!-- start accordion -->
                                                                <div class="accordion" id="accordion" role="tablist" aria-multiselectable="true">

                                                                    <div class="panel">
                                                                        <a class="panel-heading collapsed" role="tab" id="headingTwo" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                                                            <h4 class="panel-title"><i class="fa fa-bars"></i> Contenu</h4>
                                                                        </a>
                                                                        <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                                                                            <div class="panel-body">
                                                                                <?php echo $data['Contenu']; ?>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <!-- end of accordion -->
                                                            </div>
                                                        </div>
                                                <?php }
                                                } ?>
                                            </div>
                                        </div>
                                        <div class="card">
                                            <div class="card-header bg-white fw-bold">
                                                <h2 class="text-dark" style="font-weight:bold;"><span class="btn btn-round bg-success text-light"><i class="fa fa-send-o"></i></span> Activités</h2>
                                            </div>
                                            <div class="card-body bg-light" style="overflow: scroll;height: 350px;">
                                                <a href="gestion_activity.php" class="btn btn-sm btn-round btn-success">Créer une activité</a>

                                                <?php if (isset($Tab_activite)) {
                                                    while ($data = $Tab_activite->fetch()) {
                                                ?>
                                                        <div class="card">
                                                            <div class="card-body">

                                                                <p class="card-text"><small class="text-muted float-right"><?php echo date($Format_Affiche, strtotime($data['DatePub'])); ?></small></p><br>
                                                                <span><a href=""><?php echo $data['Titre']; ?></a> </span><br>
                                                                <?php if ($data['Etat'] == "1") {
                                                                    echo '<span class="badge bg-success text-light p-2">Online</span>&nbsp;&nbsp';
                                                                    echo '<a href="DesactiverActivite.php"><span class="badge bg-primary text-light p-2">Desactiver</span></a>';
                                                                ?>
                                                                <?php
                                                                } else {
                                                                    echo '<span class="badge bg-danger text-light p-2">Offline</span>&nbsp;&nbsp';
                                                                    echo '<a href="PublierActivite.php"><span class="badge bg-primary text-light p-2">Passer online</span></a>';
                                                                ?>
                                                                <?php
                                                                }; ?>
                                                                <a href="#updateactivite.php?id=<?php echo $data['IdActivite']; ?>" class="btn btn-sm btn-round btn-warning float-right"><i class="fa fa-pencil"></i></a><br><br>
                                                                <!-- start accordion -->
                                                                <div class="accordion" id="accordion" role="tablist" aria-multiselectable="true">

                                                                    <div class="panel">
                                                                        <a class="panel-heading collapsed" role="tab" id="headingTwo" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                                                            <h4 class="panel-title"><i class="fa fa-bars"></i> Contenu</h4>
                                                                        </a>
                                                                        <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                                                                            <div class="panel-body">
                                                                                <?php echo $data['Contenu']; ?>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <!-- end of accordion -->
                                                            </div>
                                                        </div>
                                                <?php }
                                                } ?>

                                            </div>
                                        </div>
                                        <div class="card">
                                            <div class="card-header bg-white">
                                                <h2 class="text-dark" style="font-weight:bold;"><span class="btn btn-round bg-danger text-light"><i class="fa fa-file-text-o"></i></span> Rapport Annuel</h2>
                                            </div>
                                            <div class="card-body bg-light" style="overflow: scroll;height: 350px;">
                                                <a href="gestion_rapports.php" class="btn btn-sm btn-round btn-danger">Créer un rapport</a>

                                                <?php if (isset($Tab_actualites)) {
                                                    while ($data = $Tab_actualites->fetch()) {
                                                ?>
                                                        <div class="card">
                                                            <div class="card-body">

                                                                <p class="card-text"><small class="text-muted"><?php echo date($Format_Affiche, strtotime($data['DatePub'])); ?></small></p>
                                                                <span><?php echo $data['Titre']; ?></span>
                                                            </div>

                                                        </div>


                                                <?php }
                                                } ?>

                                            </div>
                                        </div>
                                    </div>

                                </div>
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

    <!-- Modal -->
    <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header bg-info">
                    <span class="font-weight-bold">
                        <h3 class="text-light font-weight-bold"> Créer une nouvelle actualité</h3>
                    </span>
                    <hr>
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="x_panel">
                            <form method="post" enctype="multipart/form-data">
                                <div class="col-md-12 form-group">
                                    <div class="x_content">
                                        <label for="heard">Catégorie actualité *:</label>
                                        <select id="heard" class="form-control" name="Cat" required>
                                            <option value="">--Choisir--</option>
                                            <?php if (isset($Tabcat)) {
                                                while ($data1 = $Tabcat->fetch()) {
                                            ?>
                                                    <option value="<?php echo $data1['CodeTypeactu']; ?>"><?php echo $data1['NomTypeActu']; ?></option>
                                            <?php
                                                }
                                            } ?>
                                        </select>
                                        <label for="titre">Titre * :</label>
                                        <input type="text" id="titre" class="form-control" name="Titre" data-parsley-trigger="change" required />

                                        <label class="p-2 text-white mt-2" for="message" style="background-color:#3b3b4c">Contenu * :</label>
                                        <textarea id="message" class="form-control" name="contenu" style="height: 200px;" required></textarea>

                                        <br />
                                        <div class="form-group row float-right">

                                            <button class="btn btn-success" type="submit" name="BtnPubNow">Créer et publier maintenant <i class="fa fa-send-o"></i> </button>
                                            <button class="btn btn-warning" type="submit" name="BtnPubLater">Créer et publier plus tard <i class="fa fa-calendar"></i> </button>
                                        </div>
                                    </div>
                                </div>

                            </form>

                        </div>

                    </div>

                </div>
            </div>
        </div>
        <!-- Fin Modal Actualités -->

</body>

</html>