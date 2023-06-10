<?php require($root . '/app/view/fragment/fragmentHeader.html') ?>

<body>
<div class="container bg-light rounded">
    <?php require ($root . '/app/view/fragment/fragmentMenu.php');?>
    <h2>Inscription</h2>
    <form role="form" method='POST' action='router.php?action=DoInscription'>
        <div class="form-group">
            <label class='w-25' for="nom">Nom : </label><br>
            <input type="text" name='nom' size='10'> <br/>
            <label class='w-25' for="prenom">Prenom : </label><br>
            <input type="text" name='prenom' size='10'> <br/>
            <label class='w-25' for="adresse">Adresse : </label><br>
            <input type="text" name='adresse' size='10'> <br/>
            <label class='w-25' for="login">Login : </label><br>
            <input type="text" name='login' size='10'> <br/>
            <label class='w-25' for="password">Password : </label><br>
            <input type="password" name='password' size='10'> <br/>
            <label>Votre statut :</label><br/>
            <select name="statut" class="form-select">
                <option value=2>patient</option>
                <option value=1>praticien</option>
                <option value=0>administrateur</option>
            </select><br/>

            <select name="specialite_id" class="form-select">
                <option value=0>je ne suis pas un praticien</option>
                <option value=1>médecin généraliste</option>
                <option value=2>infirmier</option>
                <option value=3>dentiste</option>
                <option value=4>sage-femme</option>
                <option value=5>ostéopathe</option>
                <option value=6>kinésithérapeute</option>
            </select>
        </div>
        <br/>
        <button class="btn btn-primary" type="submit">S'inscrire</button>
    </form>
    <p>Déjà un compte ? <a href="router.php?action=Connexion">Connectez-vous</a></p>
</div>

<?php require ($root . '/app/view/fragment/fragmentFooter.html'); ?>

</body>