<!-- ----- début viewDispo -->
<?php
require ($root . '/app/view/fragment/fragmentHeader.html');
?>

<body>
<div class="container bg-light">
    <?php
    include $root . '/app/view/fragment/fragmentMenu.php';
    include $root . '/app/view/fragment/fragmentJumbo.html';
    ?>
    <h4>Liste des rendez vous disponible</h4><br/>
    <div>
        <table class = "table table-striped table-bordered">
            <thead>
            <tr>
                <th scope = "col">dates et horaires</th>
            </tr>
            </thead>
            <tbody>
            <?php
            foreach ($results as $element) {
                $rdv = $element->getRdvDate();
                printf("<tr><td>%s</td></tr>", $rdv);
            }
            ?>
            </tbody>
        </table>
    </div>
</div>
</body>
<?php include $root . 'app/view/fragment/fragmentFooter.html'; ?>

<!-- ----- fin viewDispo -->