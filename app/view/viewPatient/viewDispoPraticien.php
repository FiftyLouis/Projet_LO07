<?php
require ($root . 'app/view/fragment/fragmentHeader.html');
?>
<div class="container bg-light">
    <?php
    include $root . 'app/view/fragment/fragmentMenu.php';
    include $root . 'app/view/fragment/fragmentJumbo.html';
    ?>

    <div>
        <h4>Rendez vous disponible</h4>
        <?php if (empty($results)) : ?>
        <h3>Ce praticien n'a pas de rdv disponible</h3><br/>
        <?php else : ?>
        <h3>Sélection d'un rdv</h3><br/>
        <form role='form' method='get' action='router.php'>
            <div class='form-group'>
                <input type='hidden' name='action' value='patientInsertedRdv'>
                <label for='rdv'>Rendez-vous disponibles : </label><br/><br/>
                <select class='form-control' id='rdv' name='rdv'>
                    <?php
                    foreach ($results as $element) {
                        $id = $element[0];
                        $date = $element[1];
                        echo ("<option value='$id'>$date</option>");
                    }
                    ?>
                </select>
            </div><br/>
            <button class='btn btn-primary' type='submit'>soumettre</button>
        </form>
        <?php endif;?>
    </div>
</div>
<?php include $root . 'app/view/fragment/fragmentFooter.html'; ?>

