
<!-- ----- début fragmentMenu -->

<nav class="navbar navbar-expand-lg bg-success fixed-top">
    <div class="container-fluid">
        <a class="navbar-brand" href="router.php?action=Accueil">Bonnet Louis</a>
        <?php
        if ($_SESSION['login'] != "vide") {
            $status = $_SESSION['status'];
            printf("%s  | %s %s",$status, $_SESSION['nom'], $_SESSION['prenom'] . " |");
        } else printf(" |  | ");
        ?>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <?php if (!empty($_SESSION) && isset($_SESSION['status'])) : ?>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <?php echo $_SESSION['status']; ?>
                        </a>
                        <ul class="dropdown-menu">
                            <?php if ($_SESSION['status'] == 'Administrateur') : ?>
                                <li><a class="dropdown-item" href="router.php?action=ListeSpecialite">Liste des spécialités</a></li>
                                <li><a class="dropdown-item" href="router.php?action=specialiteReadId">Sélection d'une spécialité par son id</a></li>
                                <li><a class="dropdown-item" href="router.php?action=specialiteInsert">Insertion d'une nouvelle spécialité</a></li>
                                <hr class="dropdown-divider">
                                <li><a class="dropdown-item" href="router.php?action=praticienReadAll">Liste des praticiens et de leur spécialité</a></li>
                                <li><a class="dropdown-item" href="router.php?action=nbrPatricienPatient">Nombre de praticiens par patient</a></li>
                                <hr class="dropdown-divider">
                                <li><a class="dropdown-item" href="router.php?action=info">Info</a></li>
                            <?php elseif ($_SESSION['status'] == 'Praticien') : ?>
                                <li><a class="dropdown-item" href="router.php?action=RdvDispo">Mes disponibilités</a></li>
                                <li><a class="dropdown-item" href="router.php?action=DispoInsert">Ajout de nouvelles disponibilités</a></li>
                                <hr class="dropdown-divider">
                                <li><a class="dropdown-item" href="router.php?action=rdvReadAll">Mes rendez-vous</a></li>
                                <li><a class="dropdown-item" href="router.php?action=listePatientsSansDoublon">Liste des patients (sans doublon)</a></li>
                            <?php elseif ($_SESSION['status'] == 'Patient') : ?>
                                <li><a class="dropdown-item" href="router.php?action=mesRdv">Liste de mes rendez-vous</a></li>
                                <li><a class="dropdown-item" href="router.php?action=selectionPraticien">Prendre un rendez-vous avec un praticien</a></li>
                                <li><a class="dropdown-item" href="router.php?action=praticiensProche">Trouver un praticien près de chez soi</a></li>
                            <?php endif; ?>
                        </ul>
                    </li>
                <?php endif; ?>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-expanded="false">Innovations</a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="router.php?action=fonctionnaliteOriginale">Proposez une fonctionnalité originale</a></li>
                        <li><a class="dropdown-item" href="router.php?action=ameliorationMVC">Proposez une amélioration du code MVC</a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-expanded="false">Profil</a>
                    <ul class="dropdown-menu">
                        <?php if ($_SESSION['login'] != "vide") : ?>
                            <li><a class="dropdown-item" href="router.php?action=monCompte">Mon Compte</a></li>
                            <li><a class="dropdown-item" href="router.php?action=Deconnexion">Déconnexion</a></li>
                        <?php else : ?>
                            <li><a class="dropdown-item" href="router.php?action=Connexion">Connexion</a></li>
                            <li><a class="dropdown-item" href="router.php?action=Inscription">Inscription</a></li>
                        <?php endif; ?>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>

<!-- ----- fin fragmentMenu -->

