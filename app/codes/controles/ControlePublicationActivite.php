
<?php
include("app/codes/classes/ClasseActualite.php");
include("app/codes/fonctions/fx_upload.php");
$Format_Date = 'd/m/Y à H:i';
$Format_Affiche = 'd/m/Y';
$Format_Envoie = 'Y/m/d';
$ReservToday = date($Format_Envoie, time());

$Ladate = $ReservToday;
$actu = new Actualites();
$Tab_actualites = $actu->fx_Liste_Actualites_All();
$Tabcat = $actu->fx_Liste_Type_Actu();

if (isset($_POST["BtnPubNow"])) {

    if ($_POST["Titre"] == "") {
        $formulaire_valide = false;
        $msgtitre = "votre champ titre est vide";
    }

    if ($_POST["contenu"] == "") {
        $formulaire_valide = false;
        $msgcontent = "votre champ contenu est vide";
    }
    //$LeFichier = $_POST["Fichier"];
    $nomfich = fx_upload("Fichier", "../fichier/site/image/ImportActiviy/");
    //echo $nomfich;
    $resultat = $actu->fx_AjouterActivites("", $_POST["Titre"], $_POST["contenu"], $nomfich, 1);
    if ($resultat) {
        //header("location:gestion_activity.php");
    } else {
        echo "Echec d'enregistrement.";
    }
} else if (isset($_POST["BtnPubLater"])) {

    if ($_POST["Titre"] == "") {
        $formulaire_valide = false;
        $msgtitre = "votre champ titre est vide";
    }

    if ($_POST["contenu"] == "") {
        $formulaire_valide = false;
        $msgcontent = "votre champ contenu est vide";
    }
    //$LeFichier=$_POST["profile"];
    $nomfich = fx_upload("Fichier", "../fichier/site/image/ImportActiviy/");
    $resultat = $actu->fx_AjouterActivites("", $_POST["Titre"], $_POST["contenu"], $nomfich, 0);
    if ($resultat) {
        // header("location:gestion_activity.php");
    } else {
        echo "Echec d'enregistrement.";
    }
}


?>