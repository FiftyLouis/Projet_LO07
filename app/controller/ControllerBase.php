<!-- ----- debut ControllerDoctolib -->
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

}
?>
<!-- ----- fin ControllerDoctolib -->
