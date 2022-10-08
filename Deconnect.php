<?php
session_start();

unset($_SESSION['IdCompte']);
unset($_SESSION['role']);
unset($_SESSION['adresseIP']);

unset($_SESSION['Email']);
unset($_SESSION['Pseudo']);

unset($_SESSION['CodeTypeCpte']);


header("Location:login.php");
