<?php require ($root . 'app/view/fragment/fragmentHeader.html');?>
<body>
<div class="container bg-light">
    <?php
    include $root . 'app/view/fragment/fragmentMenu.php';
    include $root . 'app/view/fragment/fragmentJumbo.html';?>
    <form role="form" method='get' action='router.php'>
        <div class="form-group">
            <h4">Ajouter des disponibilités</h4><br/>
            <input type="hidden" name='action' value='dispoInserted'>
            <label>Date RDV : </label><br/>
            <input class="form-control" type="date" name="date" min="2023-05-01" max="2033-05-31" required><br/>

            <label>Nombre de RDV : </label><br/>
            <input class="form-control" type="number" min="1" value = "1" name="nbRdv"/><br/>
            <br/>
            <button class="btn btn-primary" type="submit">soumettre</button>
            <br/>
        </div>
    </form>
</div>

<?php include $root . 'app/view/fragment/fragmentFooter.html'; ?>
