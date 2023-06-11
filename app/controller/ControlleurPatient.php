<?php
require_once '../model/ModelPersonne.php';
require_once '../model/ModelSpecialite.php';
require_once '../model/ModelRendezVous.php';

class ControlleurPatient{

    public static function MesRdvPatient(){
        $id = $_SESSION["id"];
        $results = ModelRendezVous::getRdvPatient($id);
        include 'config.php';
        $vue = $root . 'app/view/viewPatient/viewRdv.php';
        if (DEBUG) echo ("ControlleurPatient : viewRdv : vue = $vue<br>");
        require ($vue);
    }

    public static function patientChoisirPraticien() {
        $results = ModelPersonne::getNomPraticien();
        include 'config.php';
        $vue = $root . '/app/view/viewPatient/viewPraticien.php';
        require ($vue);
    }
    public static function patientDispo(){
        $id = $_GET['praticien'];
        $results = ModelPersonne::getDispoPraticienPatient($id);
        include 'config.php';
        $vue = $root . '/app/view/viewPatient/viewDispoPraticien.php';
        require ($vue);
    }

    public static function patientInsertedRdv(){
        $idRdv = $_GET['rdv'];
        $idPatient = $_SESSION['id'];
        ModelRendezvous::addRdv($idRdv, $idPatient);
        $results = ModelRendezVous::getRdvPatient($idPatient);
        include 'config.php';
        $vue = $root . 'app/view/viewPatient/viewRdv.php';
        if (DEBUG) echo ("ControlleurPatient : viewRdv : vue = $vue<br>");
        require ($vue);
    }

    public static function praticienHonoraire(){
        $results = ModelPersonne::getPraticienHonoraire();
        include 'config.php';
        $vue = $root . 'app/view/viewPatient/viewHonoraire.php';
        if (DEBUG) echo ("ControlleurPatient : viewHonoraire : vue = $vue<br>");
        require ($vue);
    }

}