
<?php
include("app/codes/classes/ClasseActualite.php");
include("app/codes/fonctions/fx_upload.php");
$Format_Date = 'd/m/Y à H:i';
$Format_Affiche = 'd/m/Y';
$Format_Envoie = 'Y/m/d';
$ReservToday = date($Format_Envoie, time());

$Ladate = $ReservToday;
$actu = new Actualites();
$Tab_Rapport = $actu->fx_Liste_Rapport_All();
//$Tabcat = $actu->fx_Liste_Type_Actu();

if (isset($_POST["BtnPubNow"])) {

    if ($_POST["Fichier"] == "") {
        $formulaire_valide = false;
        $msgtitre = "votre champ titre est vide";
    }

    if ($_POST["contenu"] == "") {
        $formulaire_valide = false;
        $msgcontent = "votre champ contenu est vide";
    }
    //$LeFichier = $_POST["Fichier"];
    $nomfich = fx_upload("Fichier", "../fichier/site/docs/rapports/");
    //echo $nomfich;
    $resultat = $actu->fx_AjouterRapport("", $nomfich, $_POST["contenu"],  1);
    if ($resultat) {
        header("location:contenu.php");
    } else {
        echo "Echec d'enregistrement.";
    }
} else if (isset($_POST["BtnPubLater"])) {

    if ($_POST["Fichier"] == "") {
        $formulaire_valide = false;
        $msgtitre = "votre champ titre est vide";
    }

    if ($_POST["contenu"] == "") {
        $formulaire_valide = false;
        $msgcontent = "votre champ contenu est vide";
    }
    //$LeFichier=$_POST["profile"];
    $nomfich = fx_upload("Fichier", "../fichier/site/docs/rapports/");
    //echo $nomfich;
    $resultat = $actu->fx_AjouterRapport("", $nomfich, $_POST["contenu"],  0);
    if ($resultat) {
        header("location:contenu.php");
    } else {
        echo "Echec d'enregistrement.";
    }
}


?>