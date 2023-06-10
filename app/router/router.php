
<!-- ----- debut Router -->
<?php
session_start();
require_once '../controller/ControllerBase.php';
require_once '../controller/ControlleurAdmin.php';


// --- récupération de l'action passée dans l'URL
$query_string = $_SERVER['QUERY_STRING'];

// fonction parse_str permet de construire
// une table de hachage (clé + valeur)
parse_str($query_string, $param);

// --- $action contient le nom de la méthode statique recherchée
$action = $param["action"];
// On supprime l'élément action de la structure
unset($param["action"]);

$args= $param;

// --- Liste des méthodes autorisées
switch ($action) {
    case "DoInscription" :
    case "Inscription" :
    case "Deconnexion" :
    case "DoConnexion":
    case "Connexion" : ControllerBase::$action($args);
        break;

    case "specialiteReadId" :
    case "SpecialiteReadOne" :
    case "specialiteInsert" :
    case "specialiteInserted":
    case "ListeSpecialite" :ControlleurAdmin::$action($args);
        break;

    default : ControllerBase::Accueil($args);
        break;
}


?>
<!-- ----- Fin Router -->