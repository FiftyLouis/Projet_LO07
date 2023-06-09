
<!-- ----- début fragmentCaveMenu -->

<nav class="navbar navbar-expand-lg bg-success fixed-top">
    <div class="container-fluid">
        <a class="navbar-brand" href="router1.php?action=CaveAccueil">Bonnet Louis</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-expanded="false">VIN</a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="router1.php?action=vinReadAll">Liste des vins</a></li>
                        <li><a class="dropdown-item" href="router1.php?action=vinReadId">Sélection d'un vin par son id</a></li>
                        <li><a class="dropdown-item" href="router1.php?action=vinCreate">Insertion d'un vin</a></li>
                    </ul>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-expanded="false">PRODUCTEUR</a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="router1.php?action=producteurReadAll">Liste des producteurs</a></li>
                        <li><a class="dropdown-item" href="router1.php?action=producteurReadId">Sélection d'un producteur par son id</a></li>
                        <li><a class="dropdown-item" href="router1.php?action=producteurCreate">Insertion d'un producteur</a></li>
                        <li><a class="dropdown-item" href="router1.php?action=sansDoublon">Liste sans doublon des régions</a></li>
                        <li><a class="dropdown-item" href="router1.php?action=nbrProducteur">Nombre de producteurs par région</a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-expanded="false">DOCUMENTATION</a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="router1.php?action=mesPropositions">Proposition d'amélioration</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>

<!-- ----- fin fragmentCaveMenu -->

