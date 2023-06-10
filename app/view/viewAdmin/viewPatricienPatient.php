<?php
require ($root . '/app/view/fragment/fragmentHeader.html');
?>

<body>
<div class="container bg-light rounded">
    <?php
    include $root . '/app/view/fragment/fragmentMenu.php';
    include $root . '/app/view/fragment/fragmentJumbo.html';
    ?>
    <h4>Nombre de praticiens par patient</h4><br/>
    <div>
        <table class = "table table-striped table-bordered">
            <thead>
            <tr>
                <th scope = "col">id</th>
                <th scope = "col">nom</th>
                <th scope = "col">prénom</th>
                <th scope = "col">adresse</th>
                <th scope = "col">nombre de praticiens</th>
            </tr>
            </thead>
            <tbody>
            <?php
            foreach ($results as $element) {
                printf("<tr><td>%d</td><td>%s</td><td>%s</td>"
                    . "<td>%s</td><td>%d</td></tr>",
                    $element[0],
                    $element[1],
                    $element[2],
                    $element[3],
                    $element[4]);
            }
            ?>
            </tbody>
        </table>
    </div>
</div>
</body>
<?php include $root . '/app/view/fragment/fragmentFooter.html'; ?>

