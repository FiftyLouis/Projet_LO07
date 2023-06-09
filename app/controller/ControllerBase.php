<!-- ----- debut ControllerDoctolib -->
<?php

class ControllerBase
{
    public static function Accueil()
    {
        include 'config.php';
        $vue = $root . '/app/view/viewBase/viewAccueil.php';
        if (DEBUG)
            echo("ControllerDoctolib : doctolibAccueil : vue = $vue");
        require($vue);
    }

}
?>
<!-- ----- fin ControllerDoctolib -->
