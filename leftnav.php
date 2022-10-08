<div class="left_col scroll-view">
    <!-- menu profile quick info -->
    <div class="profile clearfix">

        <div class="profile_info">
            <?php if (isset($_SESSION['IdCompte'])) { ?>
                <span class="text-white text-center font-weight-bold"><i class="fa fa-user text-success"> En ligne</i><br>
                    <?php if (isset($_SESSION['Pseudo'])) {
                        echo $_SESSION['Pseudo'];
                    } ?>
                </span>
                <span class="text-white text-center"><br>
                    <?php if (isset($_SESSION['Email'])) {
                        echo $_SESSION['Email'];
                    } ?>
                </span>
            <?php } ?>
        </div>
    </div>
    <!-- /menu profile quick info -->

    <br />

    <!-- sidebar menu -->
    <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
        <div class="menu_section">
            <ul class="nav side-menu">
                <li><a><i class="fa fa-paw"></i> Activités <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                        <li><a href="comptes.php"><i class="fa fa-users"></i> Utilisateurs</a></li>
                        <li><a href="contenu.php"><i class="fa fa-pencil"></i> Gestion des contenus</a></li>
                       <!-- <li><a href="inbox.php"><i class="fa fa-envelope"></i>Contacts Visiteurs <span class="badge bg-warning text-dark">0</span></a></li>  -->
                    </ul>
                </li>
            </ul>
        </div>
    </div>
    <!-- /sidebar menu -->

</div>