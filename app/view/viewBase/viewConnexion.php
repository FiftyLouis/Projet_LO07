<?php require($root . '/app/view/fragment/fragmentHeader.html') ?>

<body>
<div class="container">
    <?php require ($root . '/app/view/fragment/fragmentMenu.php');?>
    <h2>Connexion</h2>
    <form role="form" method='POST' action='router.php?action=DoConnexion'>
        <div class="form-group">
            <label class='w-25' for="username">Nom d'utilisateur : </label><br>
            <input type="text" name='username' size='10'> <br/>
            <label class='w-25' for="password">password : </label><br>
            <input type="password" name='password' size='10'> <br/>
        </div>
        <p/>
        <br/>
        <button class="btn btn-primary" type="submit">Se connecter</button>
    </form>
    <p>Pas de compte ?<a href="router.php?action=Inscription">Inscrivez-vous</a></p>
</div>

<?php require ($root . '/app/view/fragment/fragmentFooter.html'); ?>

</body>
