<!-- ----- début viewSpecialiteInserted -->
<?php require ($root . '/app/view/fragment/fragmentHeader.html');?>

<body>
<div class="container bg-light">
    <?php
    include $root . '/app/view/fragment/fragmentMenu.php';
    include $root . '/app/view/fragment/fragmentJumbo.html';
    ?>
    <div>
        <h4>Voici la nouvelle spécialité</h4>
        <br/>
        <table class = "table table-striped table-bordered">
            <thead>
            <tr>
                <th scope = "col">id</th>
                <th scope = "col">label</th>
            </tr>
            </thead>
            <tbody>
            <?php
            // La liste des spécialités est dans une variable $results
            foreach ($results as $element) {
                printf("<tr><td>%d</td><td>%s</td></tr>",
                    $element->getId(), $element->getLabel());
            }
            ?>
            </tbody>
        </table>
    </div>
</div>
</body>

<?php include $root . '/app/view/fragment/fragmentFooter.html'; ?>