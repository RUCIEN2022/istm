<?php
session_start();
//if((!isset($_SESSION['idagent']))or($_SESSION['adresseIP']!=$_SERVER['REMOTE_ADDR'])or(!isset($_SESSION['IdAgence']))){
if ((!isset($_SESSION['IdCompte'])) or (!isset($_SESSION['CodeTypeCpte'])) or ($_SESSION['adresseIP'] != $_SERVER['REMOTE_ADDR'])) {
    header("location:login.php");
    exit();
}
