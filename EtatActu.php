<?php
include_once("app/codes/classes/ClasseActualite.php");

$UpdateActu = new Actualites();
$Res_Actu = $UpdateActu->fx_ChangementEtatActualite($_GET["idactu"], $_GET["etat"]);

header("location:MajActualites.php");
