

<!-- ----- début viewInsert -->

<?php
require ($root . 'app/view/fragment/fragmentHeader.html');
?>

<body>
<div class="container">
    <?php
    include $root . 'app/view/fragment/fragmentMenu.php';
    include $root . 'app/view/fragment/fragmentJumbo.html';
    ?>
    <h4>Créer une nouvelle spécialité</h4>
    <form role="form" method='get' action='router.php'>
        <div class="form-group">
            <input type="hidden" name='action' value='specialiteInserted'>
            <h5>label :</h5> <input type="text" name='label' size='30' value=''> <br/>
        </div>
        <p/>
        <button class="btn btn-primary" type="submit">Créer</button>
    </form>
    <p/>
</div>
<?php include $root . 'app/view/fragment/fragmentFooter.html'; ?>

<!-- ----- fin viewInsert -->