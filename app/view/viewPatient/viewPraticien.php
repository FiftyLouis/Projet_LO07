<?php
require ($root . 'app/view/fragment/fragmentHeader.html');
?>

<body>
<div class="container bg-light">
    <?php
    include $root . '/app/view/fragment/fragmentMenu.php';
    include $root . '/app/view/fragment/fragmentJumbo.html';
    ?>

    <div class="form-group">
        <h4>Sélection d'un praticien</h4><br/>
        <form role="form" method='get' action='router.php'>
            <div class="form-group">
                <input type="hidden" name='action' value='patientDispo'>
                <label for="praticien">Praticiens : </label>
                <select class="form-control" id='praticien' name='praticien'>
                    <?php
                    foreach ($results as $element) {
                        $id = $element[0];
                        $nom = $element[1];
                        $prenom = $element[2];
                        echo ("<option value='$id'>$nom $prenom</option>");
                    }
                    ?>
                </select>
            </div>
            <p/><br/>
            <button class="btn btn-primary" type="submit">soumettre</button>
        </form>
    </div>
</div>
</body>
<?php include $root . '/app/view/fragment/fragmentFooter.html'; ?>
