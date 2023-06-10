<?php
require_once '../model/ModelPersonne.php';
require_once '../model/ModelSpecialite.php';
require_once '../model/ModelRendezVous.php';

class ControlleurAdmin{

    public static function ListeSpecialite(){
        $result = ModelSpecialite::getAll();
        include 'config.php';
        $vue = $root . 'app/view/viewAdmin/viewListeSpecialite.php';
        if (DEBUG) echo ("ControlleurAdmin : ListeSpecialite : vue = $vue<br>");
        require ($vue);
    }
}