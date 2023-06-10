<!-- ----- début viewRdv -->
<?php
require ($root . '/app/view/fragment/fragmentHeader.html');
?>

<body>
<div class="container bg-light">
    <?php
    include $root . '/app/view/fragment/fragmentMenu.php';
    include $root . '/app/view/fragment/fragmentJumbo.html';
    ?>
    <h4>Liste des rendez vous</h4><br/>
    <div>
        <table class = "table table-striped table-bordered">
            <thead>
            <tr>
                <th scope = "col">nom patient</th>
                <th scope = "col">prenom patient</th>
                <th scope = "col">adresse</th>
            </tr>
            </thead>
            <tbody>
            <?php
            foreach ($results as $element) {
                $nom = $element->getNom();
                $prenom = $element->getPrenom();
                $adresse = $element->getAdresse();
                printf("<tr><td>%s</td><td>%s</td><td>%s</td></tr>",  $nom, $prenom, $adresse);
            }
            ?>
            </tbody>
        </table>
    </div>
</div>
</body>
<?php include $root . 'app/view/fragment/fragmentFooter.html'; ?>

<!-- ----- fin viewRdv -->