<!-- ----- début viewSpecialiteId -->
<?php require ($root . '/app/view/fragment/fragmentHeader.html')?>

<body>
<div class="container bg-light rounded">
    <?php
    include $root . '/app/view/fragment/fragmentMenu.php';
    include $root . '/app/view/fragment/fragmentJumbo.html';
    ?>
    <h4>Choisir une spécialité</h4><br/>
    <form role="form" method='get' action='router.php'>
        <div class="form-group">
            <input type="hidden" name='action' value='SpecialiteReadOne'>
            <label for="id">id : </label> <select class="form-control" id='id' name='id' style="width: 100px">
                <?php foreach ($result as $id) echo ("<option>$id</option>"); ?>
            </select>
        </div>
        <br/>
        <button class="btn btn-primary" type="submit">rechercher</button>
    </form>
</div>

<?php include $root . '/app/view/fragment/fragmentFooter.html'; ?>
<!-- ----- fin viewSpecialiteId -->