<?php
include_once("codes/classes/ClasseConnexion.php");

class Membres
{

    private $noms;
    private $typemembre;
    private $datenaiss;
    private $adresse;
    private $profession;
    private $sexe;
    private $phone;
    private $email;
    private $quotite;
    private $photo;
    private $pieceid;
    private $DateAdhesion;
    private $EtatMembre;


    function fx_CreerAdhesion($noms, $typemembre, $datenaiss, $adresse, $profession, $sexe, $phone, $email, $quotite, $photo, $pieceid, $DateAdhesion, $EtatMembre)
    {

        $this->noms = $noms;
        $this->type = $typemembre;
        $this->datenaiss = $datenaiss;
        $this->adresse = $adresse;
        $this->profession = $profession;
        $this->sexe = $sexe;
        $this->phone = $phone;
        $this->email = $email;
        $this->quotite = $quotite;
        $this->photo = $photo;
        $this->pieceid = $pieceid;
        $this->DateAhesion = $DateAdhesion;
        $this->EtatMembre = $EtatMembre;

        $requete = 'INSERT INTO membres(noms, typemembre, datenaiss, adresse, profession, sexe, phone, email, quotite, photo, pieceid, DateAdhesion, EtatMembre) VALUES ("' . $this->noms . '", "' . $this->type . '", "' . $this->datenaiss . '", "' . $this->adresse . '", "' . $this->profession . '", "' . $this->sexe . '", "' . $this->phone . '", "' . $this->email . '", "' . $this->quotite . '", "' . $this->photo . '", "' . $this->pieceid . '",CURRENT_TIMESTAMP,1)';
        //echo $requete;
        $conn = new connect(); // preperation de la conexion
        $resultat = $conn->fx_ecriture($requete); // execution de la requete
        if ($resultat) {
            return $resultat;
        } else {
            return false;
        }
    }

    function fx_List_Gen_Membre()
    {
        $requete = "select * from membres";
        $conn = new connect(); // preperation de la conexion
        $resultat = $conn->fx_lecture($requete);
        if ($resultat) {
            return $resultat;
        } else {
            return $resultat;
        }
    }
    function fx_List_Gen_Membre_Actif()
    {
        $requete = "select * from membres where EtatMembre=1";
        $conn = new connect(); // preperation de la conexion
        $resultat = $conn->fx_lecture($requete);
        if ($resultat) {
            return $resultat;
        } else {
            return $resultat;
        }
    }
    function fx_Count_All_Membre()
    {
        $requete = "select count(*) as T from membres";
        $conn = new connect(); // preperation de la conexion
        $resultat = $conn->fx_lecture($requete);
        if ($resultat) {
            while ($data = $resultat->fetch()) {
                $Total_G = $data['T'];
            }
            return $Total_G;
        } else {
            return false;
        }
    }
    function fx_Count_All_Membre_Effectif()
    {
        $requete = "select count(*) as TE from membres where typemembre='Membre Effectif'";
        $conn = new connect(); // preperation de la conexion
        $resultat = $conn->fx_lecture($requete);
        if ($resultat) {
            while ($data = $resultat->fetch()) {
                $Total_E = $data['TE'];
            }
            return $Total_E;
        } else {
            return false;
        }
    }
    function fx_Count_All_Membre_Honneur()
    {
        $requete = "select count(*) as TH from membres where typemembre='Membre honneur'";
        $conn = new connect(); // preperation de la conexion
        $resultat = $conn->fx_lecture($requete);
        if ($resultat) {
            while ($data = $resultat->fetch()) {
                $Total_H = $data['TH'];
            }
            return $Total_H;
        } else {
            return false;
        }
    }
    function fx_Count_All_Membre_sympa()
    {
        $requete = "select count(*) as TS from membres where typemembre='Membre Sympatisan'";
        $conn = new connect(); // preperation de la conexion
        $resultat = $conn->fx_lecture($requete);
        if ($resultat) {
            while ($data = $resultat->fetch()) {
                $Total_S = $data['TS'];
            }
            return $Total_S;
        } else {
            return false;
        }
    }
    function fx_Count_All_Membre_InActif()
    {
        $requete = "select count(*) from membres where EtatMembre=0";
        $conn = new connect(); // preperation de la conexion
        $resultat = $conn->fx_lecture($requete);
        if ($resultat) {
            return $resultat;
        } else {
            return $resultat;
        }
    }

    function fx_Changer_Etat_Membre($idmembre, $EtatMembre)
    {
        $this->Etat = $EtatMembre;

        $requete = "UPDATE membres SET EtatMembre='" . $this->Etat . "' WHERE membres.idmembre ='" . $idmembre . "' LIMIT 1";
        $conn = new connect(); // preperation de la conexion
        $Resultat = $conn->fx_modifier($requete);
    }
}
