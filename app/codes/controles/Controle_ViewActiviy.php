<?php
include("app/codes/classes/ClasseActualite.php");
$Format_Date = 'd/m/Y';

$ListeActualite = new Actualites();
$Tab_actualites = $ListeActualite->fx_Liste_Dernieres_6_Actualites();
$Tab_activites = $ListeActualite->fx_Liste_Dernieres_6_Activite();

if (isset($_GET["IdActiv"])) {
    $IdActiv = $_GET["IdActiv"];
} else {
    $IdActiv = 1;
}
$Tab_AfficheImg = $ListeActualite->fx_rechercheAImagesctivite($IdActiv);
$Tab_Affiche = $ListeActualite->fx_rechercheActivite($IdActiv);
if ($Tab_Affiche) {
    while ($row = $Tab_Affiche->fetch()) {

        $chemin = "fichier/site/image/ImportActiviy/";
        $titre = $row['Titre'];
        $contenu = $row['Contenu'];
        $Image = $row['ImageProfile'];
        $dateactu = $row['DatePub'];
    }
}
