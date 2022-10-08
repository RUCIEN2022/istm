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
                <div class="">

                    <div class="page-title">
                        <div class="title_left">
                            <h3>Administration</h3>
                        </div>
                    </div>

                    <div class="clearfix"></div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="x_panel">
                                <div class="x_title">
                                    <h2>Gestionnaire des contacts</h2>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="x_content">
                                    <div class="row">
                                        <div class="col-sm-3 mail_list_column">
                                            <button id="compose" class="btn btn-sm btn-success btn-block btn-round" type="button"><i class="fa fa-plus"></i> Nouveau Message </button>
                                            <!--     <a href="#">
                                                <div class="mail_list">
                                                    <div class="left">
                                                        <i class="fa fa-circle"></i> <i class="fa fa-edit"></i>
                                                    </div>
                                                    <div class="right">
                                                        <h3>Dennis Mugo <small>3.00 PM</small></h3>
                                                        <p>Ut enim ad minim veniam, quis nostrud exercitation enim ad minim veniam, quis nostrud exercitation...</p>
                                                    </div>
                                                </div>
                                            </a>
                                            <a href="#">
                                                <div class="mail_list">
                                                    <div class="left">
                                                        <i class="fa fa-star"></i>
                                                    </div>
                                                    <div class="right">
                                                        <h3>Jane Nobert <small>4.09 PM</small></h3>
                                                        <p><span class="badge">To</span> Ut enim ad minim veniam, quis nostrud exercitation enim ad minim veniam, quis nostrud exercitation...</p>
                                                    </div>
                                                </div>
                                            </a>
                                            <a href="#">
                                                <div class="mail_list">
                                                    <div class="left">
                                                        <i class="fa fa-circle-o"></i><i class="fa fa-paperclip"></i>
                                                    </div>
                                                    <div class="right">
                                                        <h3>Musimbi Anne <small>4.09 PM</small></h3>
                                                        <p><span class="badge">CC</span> Ut enim ad minim veniam, quis nostrud exercitation enim ad minim veniam, quis nostrud exercitation...</p>
                                                    </div>
                                                </div>
                                            </a>
                                            <a href="#">
                                                <div class="mail_list">
                                                    <div class="left">
                                                        <i class="fa fa-paperclip"></i>
                                                    </div>
                                                    <div class="right">
                                                        <h3>Jon Dibbs <small>4.09 PM</small></h3>
                                                        <p>Ut enim ad minim veniam, quis nostrud exercitation enim ad minim veniam, quis nostrud exercitation...</p>
                                                    </div>
                                                </div>
                                            </a>
                                            <a href="#">
                                                <div class="mail_list">
                                                    <div class="left">
                                                        .
                                                    </div>
                                                    <div class="right">
                                                        <h3>Debbis & Raymond <small>4.09 PM</small></h3>
                                                        <p>Ut enim ad minim veniam, quis nostrud exercitation enim ad minim veniam, quis nostrud exercitation...</p>
                                                    </div>
                                                </div>
                                            </a>
                                            <a href="#">
                                                <div class="mail_list">
                                                    <div class="left">
                                                        .
                                                    </div>
                                                    <div class="right">
                                                        <h3>Debbis & Raymond <small>4.09 PM</small></h3>
                                                        <p>Ut enim ad minim veniam, quis nostrud exercitation enim ad minim veniam, quis nostrud exercitation...</p>
                                                    </div>
                                                </div>
                                            </a>
                                            <a href="#">
                                                <div class="mail_list">
                                                    <div class="left">
                                                        <i class="fa fa-circle"></i> <i class="fa fa-edit"></i>
                                                    </div>
                                                    <div class="right">
                                                        <h3>Dennis Mugo <small>3.00 PM</small></h3>
                                                        <p>Ut enim ad minim veniam, quis nostrud exercitation enim ad minim veniam, quis nostrud exercitation...</p>
                                                    </div>
                                                </div>
                                            </a>
                                            <a href="#">
                                                <div class="mail_list">
                                                    <div class="left">
                                                        <i class="fa fa-star"></i>
                                                    </div>
                                                    <div class="right">
                                                        <h3>Jane Nobert <small>4.09 PM</small></h3>
                                                        <p>Ut enim ad minim veniam, quis nostrud exercitation enim ad minim veniam, quis nostrud exercitation...</p>
                                                    </div>
                                                </div>
                                            </a> -->
                                        </div>
                                        <!-- /MAIL LIST -->

                                        <!-- CONTENT MAIL -->
                                        <div class="col-sm-9 mail_view">
                                            <div class="inbox-body">
                                                <div class="mail_heading row">
                                                    <div class="col-md-8">

                                                    </div>
                                                    <div class="col-md-4 text-right">
                                                        <!--    <p class="date"> 8:02 PM 12 FEB 2014</p> -->
                                                    </div>
                                                    <div class="col-md-12">
                                                        <!--    <h4> Donec vitae leo at sem lobortis porttitor eu consequat risus. Mauris sed congue orci. Donec ultrices faucibus rutrum.</h4> -->
                                                    </div>
                                                </div>
                                                <div class="sender-info">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <!--    <strong>Jon Doe</strong>
                                                            <span>(jon.doe@gmail.com)</span> to
                                                            <strong>me</strong>
                                                            <a class="sender-dropdown"><i class="fa fa-chevron-down"></i></a>
-->
                                                        </div>
                                                    </div>
                                                </div>
                                                <!--
                                                <div class="view-mail">
                                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                                                        Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. </p>
                                                    <p>Riusmod tempor incididunt ut labor erem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris
                                                        nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt
                                                        mollit anim id est laborum.</p>
                                                    <p>Modesed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate
                                                        velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                                                </div>
-->
                                                <!--
                                                <div class="attachment">
                                                    <p>
                                                        <span><i class="fa fa-paperclip"></i> 3 attachments — </span>
                                                        <a href="#">Download all attachments</a> |
                                                        <a href="#">View all images</a>
                                                    </p>
                                                    <ul>
                                                        <li>
                                                            <a href="#" class="atch-thumb">
                                                                <img src="images/inbox.png" alt="img" />
                                                            </a>

                                                            <div class="file-name">
                                                                image-name.jpg
                                                            </div>
                                                            <span>12KB</span>


                                                            <div class="links">
                                                                <a href="#">View</a> -
                                                                <a href="#">Download</a>
                                                            </div>
                                                        </li>

                                                        <li>
                                                            <a href="#" class="atch-thumb">
                                                                <img src="images/inbox.png" alt="img" />
                                                            </a>

                                                            <div class="file-name">
                                                                img_name.jpg
                                                            </div>
                                                            <span>40KB</span>

                                                            <div class="links">
                                                                <a href="#">View</a> -
                                                                <a href="#">Download</a>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <a href="#" class="atch-thumb">
                                                                <img src="images/inbox.png" alt="img" />
                                                            </a>

                                                            <div class="file-name">
                                                                img_name.jpg
                                                            </div>
                                                            <span>30KB</span>

                                                            <div class="links">
                                                                <a href="#">View</a> -
                                                                <a href="#">Download</a>
                                                            </div>
                                                        </li>

                                                    </ul>
                                                </div>
-->
                                                <!--
                                                <div class="btn-group">
                                                    <button class="btn btn-sm btn-primary" type="button"><i class="fa fa-reply"></i> Reply</button>
                                                    <button class="btn btn-sm btn-default" type="button" data-placement="top" data-toggle="tooltip" data-original-title="Forward"><i class="fa fa-share"></i></button>
                                                    <button class="btn btn-sm btn-default" type="button" data-placement="top" data-toggle="tooltip" data-original-title="Print"><i class="fa fa-print"></i></button>
                                                    <button class="btn btn-sm btn-default" type="button" data-placement="top" data-toggle="tooltip" data-original-title="Trash"><i class="fa fa-trash-o"></i></button>
                                                </div>
-->
                                            </div>

                                        </div>
                                        <!-- /CONTENT MAIL -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
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