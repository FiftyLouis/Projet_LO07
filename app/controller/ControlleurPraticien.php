<?php
require_once '../model/ModelPersonne.php';
require_once '../model/ModelSpecialite.php';
require_once '../model/ModelRendezVous.php';

class ControlleurPraticien{

    public static function RdvDispo(){
        $id = $_SESSION["id"];
        $results = ModelRendezVous::getDispo($id);
        include 'config.php';
        $vue = $root . 'app/view/viewPraticien/viewDispo.php';
        if (DEBUG) echo ("ControlleurPraticien : viewDispo : vue = $vue<br>");
        require ($vue);
    }

    public static function DispoInsert(){
        include 'config.php';
        $vue = $root . 'app/view/viewPraticien/viewDispoInsert.php';
        if (DEBUG)
            echo ("ControllerPraticien : viewDispoInsert : vue = $vue");
        require ($vue);
    }

    public static function DispoInserted(){
        include 'config.php';
        $nbRdv = $_GET['nbRdv'];
        $date = $_GET['date'];
        $id = $_SESSION['id'];
        $horaires = array();
        $exist = ModelRendezVous::Exist($id,$date);
        if($exist){
            //echec rdv déjà existant
            $vue = $root . 'app/view/viewPraticien/viewDispoInsert.php';
            if (DEBUG)
                echo ("ControllerPraticien : viewDispoInsert : vue = $vue");
            require ($vue);
        }else{
            for($i = 0 ; $i < $nbRdv ; $i++){
                $newDate = '';
                $heure = 10 + $i;
                $newDate = $date . ' à ' . $heure . 'h00';
                ModelRendezVous::InsertRdv($id,$newDate);
                array_push($horaires, $newDate);
            }
            $vue = $root . 'app/view/viewPraticien/viewDispoInserted.php';
            if (DEBUG)
                echo ("ControllerPraticien : viewDispoInserted : vue = $vue");
            require ($vue);
        }
    }

}