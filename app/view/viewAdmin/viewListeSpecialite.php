<!-- ----- début viewListe -->
<?php

require ($root . 'app/view/fragment/fragmentHeader.html');

?>

<body>
<div class="container">
    <?php
    include $root . 'app/view/fragment/fragmentMenu.php';
    include $root . 'app/view/fragment/fragmentJumbo.html';
    ?>

    <table class = "table table-striped table-bordered">
        <thead>
        <tr>
            <th scope = "col">id</th>
            <th scope = "col">label</th>
        </tr>
        </thead>
        <tbody>
        <br/>
        <?php
        // La liste des spe est dans une variable $result
        foreach ($result as $element) {
            printf("<tr><td>%d</td><td>%s</td></tr>", $element->getId(),
                $element->getLabel());
        }
        ?>
        </tbody>
    </table>
</div>
<?php include $root . 'app/view/fragment/fragmentFooter.html'; ?>

<!-- ----- fin viewListe -->