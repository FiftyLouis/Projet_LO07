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

    public static function specialiteReadId(){
        include 'config.php';

        $result = ModelSpecialite::getAllId();
        $vue = $root . 'app/view/viewAdmin/viewSpecialiteId.php';

        require ($vue);
    }
    // Affiche un spe particulier (id)
    public static function SpecialiteReadOne() {
        $id = $_GET['id'];
        $result = ModelSpecialite::getOne($id);

        // ----- Construction chemin de la vue
        include 'config.php';
        $vue = $root . '/app/view/viewAdmin/viewListeSpecialite.php';
        require ($vue);
    }
}