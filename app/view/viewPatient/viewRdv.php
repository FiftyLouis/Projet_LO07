<?php
require ($root . '/app/view/fragment/fragmentHeader.html');
?>

<body>
<div class="container bg-light">
    <?php
    include $root . '/app/view/fragment/fragmentMenu.php';
    include $root . '/app/view/fragment/fragmentJumbo.html';
    ?>
    <h4>Mes rendez vous</h4><br/>
    <div>
        <table class = "table table-striped table-bordered">
            <thead>
            <tr>
                <th scope = "col">nom</th>
                <th scope = "col">prénom</th>
                <th scope = "col">date et horaire</th>
            </tr>
            </thead>
            <tbody>
            <?php
            foreach ($results as $element) {
                printf("<tr>"
                    . "<td>%s</td><td>%s</td><td>%s</td>",
                    $element[0],
                    $element[1],
                    $element[2]);
            }
            ?>
            </tbody>
        </table>
    </div>
</div>
</body>
<?php include $root . 'app/view/fragment/fragmentFooter.html'; ?>

