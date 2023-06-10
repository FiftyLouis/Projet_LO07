<?php
require ($root . '/app/view/fragment/fragmentHeader.html');
?>

<body>
<div class="container bg-light">
    <?php
    include $root . '/app/view/fragment/fragmentMenu.php';
    include $root . '/app/view/fragment/fragmentJumbo.html';
    ?>
    <h4>Compte</h4><br/>
    <div>
        <table class = "table table-striped table-bordered">
            <thead>
            <tr>
                <th scope = "col">id</th>
                <th scope = "col">nom</th>
                <th scope = "col">prénom</th>
                <th scope = "col">adresse</th>
                <th scope = "col">login</th>
                <th scope = "col">password</th>
                <th scope = "col">statut</th>
                <th scope = "col">specialite</th>
            </tr>
            </thead>
            <tbody>
            <?php
            foreach ($results as $element) {
                printf("<tr><td>%d</td><td>%s</td><td>%s</td>"
                    . "<td>%s</td><td>%s</td><td>%s</td><td>%d</td><td>%d</td></tr>",
                    $element[0],
                    $element[1],
                    $element[2],
                    $element[3],
                    $element[4],
                    $element[5],
                    $element[6],
                    $element[7]);
            }
            ?>
            </tbody>
        </table>
    </div>
</div>
</body>
<?php include $root . 'app/view/fragment/fragmentFooter.html'; ?>

