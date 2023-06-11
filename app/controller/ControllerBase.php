<!-- ----- debut Controller -->
<?php
require_once '../model/ModelPersonne.php';
class ControllerBase
{
    public static function Accueil()
    {
        include 'config.php';
        $vue = $root . '/app/view/viewBase/viewAccueil.php';
        if (DEBUG)
            echo("ControllerBase : Accueil : vue = $vue");
        require($vue);
    }

    public static function Connexion()
    {
        include 'config.php';
        $vue = $root . '/app/view/viewBase/viewConnexion.php';
        if (DEBUG)
            echo("ControllerBase : Connexion : vue = $vue");
        require($vue);
    }

    public static function DoConnexion()
    {
        include 'config.php';
        $login = $_POST['login'];
        $password = $_POST['password'];
        $user = ModelPersonne::connexion($login,$password);
        if($user){
            //connexion reussi
            $_SESSION['id'] = $user->getId();
            $_SESSION['login'] = $user->getLogin();
            $_SESSION['nom'] = $user->getNom();
            $_SESSION['prenom'] = $user->getPrenom();
            $_SESSION['adresse'] = $user->getAdresse();
            $_SESSION['specialite_id'] = $user->getSpecialiteId();
            $idStatus = $user->getStatut();
            switch ($idStatus) {
                case 0: $status = "Administrateur";
                    break;
                case 1: $status = "Praticien";
                    break;
                default : $status = "Patient";
                    break;
            }
            $_SESSION['status'] = $status;

            header('Location: router.php?action=Accueil');
        }else{
            //echec connexion
            header('Location: router.php?action=Connexion');
        }
    }

    public static function Deconnexion(){
        include 'config.php';
        session_unset();
        $_SESSION['login']='vide';
        $vue = $root . '/app/view/viewBase/viewAccueil.php';
        if (DEBUG)
            echo("ControllerBase : Deconnexion : vue = $vue");
        require($vue);
    }

    public static function Inscription(){
        include 'config.php';
        $vue = $root . '/app/view/viewBase/viewInscription.php';
        if (DEBUG)
            echo("ControllerBase : Inscription : vue = $vue");
        require($vue);
    }

    public static function DoInscription(){
        $nom = $_POST['nom'];
        $prenom = $_POST['prenom'];
        $adresse = $_POST['adresse'];
        $login = $_POST['login'];
        $password = $_POST['password'];
        $statut = intval($_POST['statut']);
        $specialite_id = intval($_POST['specialite_id']);
        $honoraire = intval($_POST['honoraire']);
        $user = ModelPersonne::connexion($login,$password);
        if($user){
            //login déjà utilisé
            header('Location: router.php?action=Inscription');
        }else if(($statut == 0 || $statut == 2) && $specialite_id != 0){
            //erreur specialite id
            header('Location: router.php?action=Inscription');
        } else{
            if($honoraire != 0 && $statut != 1) $honoraire = 0;
            $id = ModelPersonne::InsertPersonne($nom,$prenom,$adresse,$login,$password,$statut,$specialite_id,$honoraire);
            if($id){
                //inscription réussi
                header('Location: router.php?action=Connexion');
            }else{
                //echec inscription
                header('Location: router.php?action=Inscription');
            }
        }
    }

    public static function ameliorationMVC(){
        include 'config.php';
        $vue = $root . '/app/view/viewAmelioration/viewMVC.php';
        if (DEBUG)
            echo("ControllerBase : viewMVC : vue = $vue");
        require($vue);
    }

    public static function innovation(){
        include 'config.php';
        $vue = $root . '/app/view/viewAmelioration/viewInnovation.php';
        if (DEBUG)
            echo("ControllerBase : viewInnovation : vue = $vue");
        require($vue);
    }


    public static function Compte(){
        $id = $_SESSION["id"];
        $results = ModelPersonne::getCompte($id);
        include 'config.php';
        $vue = $root . 'app/view/viewBase/viewCompte.php';
        if (DEBUG) echo ("ControlleurBase : viewCompte : vue = $vue<br>");
        require ($vue);
    }
}
?>
<!-- ----- fin Controller -->
