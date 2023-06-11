<!-- ----- début viewAllPraticien -->
<?php
require ($root . '/app/view/fragment/fragmentHeader.html');
?>

<body>
<div class="container mt-4 p-5 bg-light rounded">
    <?php
    include $root . '/app/view/fragment/fragmentMenu.php';
    include $root . '/app/view/fragment/fragmentJumbo.html';
    ?>
    <div>
        <h4>Liste des spécialité</h4>
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
            foreach ($specialite as $element) {
                printf("<tr><td>%d</td><td>%s</td></tr>", $element->getId(),
                    $element->getLabel());
            }
            ?>
            </tbody>
        </table>
    </div>
    <div>
        <h4>Liste des praticiens</h4>
        <table class = "table table-striped table-bordered">
            <thead>
            <tr>
                <th scope = "col">id</th>
                <th scope = "col">nom</th>
                <th scope = "col">prénom</th>
                <th scope = "col">adresse</th>
                <th scope = "col">spécialité</th>
                <th scope = "col">honoraire</th>
            </tr>
            </thead>
            <tbody>
            <?php
            foreach ($praticiens as $element) {
                printf("<tr><td>%d</td><td>%s</td><td>%s</td>"
                    . "<td>%s</td><td>%s</td><td>%d</td></tr>",
                    $element[0],
                    $element[1],
                    $element[2],
                    $element[3],
                    $element[4],
                    $element[5]);
            }
            ?>
            </tbody>
        </table>
    </div>
    <div>
        <h4>Liste des patients</h4><br/>
        <table class = "table table-striped table-bordered">
            <thead>
            <tr>
                <th scope = "col">nom</th>
                <th scope = "col">prénom</th>
                <th scope = "col">adresse</th>

            </tr>
            </thead>
            <tbody>
            <?php
            foreach ($patients as $element) {
                printf("<tr><td>%s</td>"
                    . "<td>%s</td><td>%s</td></tr>",
                    $element[0],
                    $element[1],
                    $element[2]);
            }
            ?>
            </tbody>
        </table>
    </div>
    <div>
        <h4>Liste des administrateurs</h4><br/>
        <table class = "table table-striped table-bordered">
            <thead>
            <tr>
                <th scope = "col">nom</th>
                <th scope = "col">prénom</th>
                <th scope = "col">adresse</th>

            </tr>
            </thead>
            <tbody>
            <?php
            foreach ($admin as $element) {
                printf("<tr><td>%s</td>"
                    . "<td>%s</td><td>%s</td></tr>",
                    $element[0],
                    $element[1],
                    $element[2]);
            }
            ?>
            </tbody>
        </table>
    </div>
    <div>
        <h4>Liste des rendez vous</h4><br/>
        <table class = "table table-striped table-bordered">
            <thead>
            <tr>
                <th scope = "col">patients</th>
                <th scope = "col">praticiens</th>
                <th scope = "col">date</th>
            </tr>
            </thead>
            <tbody>
            <?php
            foreach ($rdv as $element) {
                printf("<tr><td>%s</td>"
                    . "<td>%s</td><td>%s</td></tr>",
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