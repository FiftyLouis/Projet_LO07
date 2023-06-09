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
        $username = $_POST['username'];
        $password = $_POST['password'];
        $user = ModelPersonne::connexion($username,$password);
    }

}
?>
<!-- ----- fin ControllerDoctolib -->
