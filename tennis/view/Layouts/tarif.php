<?php
// Include head partial
require_once(__DIR__ . '/../../view/Partials/head.php'); ?>

<body>
    <?php
    // Include header partial
    require_once(__DIR__ . '/../../view/Partials/header.php');
    ?>
    <div class="mt-cust1">
        <div class="card-group">
            <!-- First card -->
            <div class="card">
                <img src="./Imgs/enfant.webp" class="card-img-top rounded" alt="enfant chat">
                <div class="card-body">
                    <h5 class="card-title fw-bolder">Initiation / Perfectionnement Enfants 7 – 9 ans</h5>
                    <p class="card-text fst-italic fw-semibold">265 € : 1 h/ semaine</p>
                    <p class="card-text">(240 € + 25 € licence)</p>
                </div>
            </div>
            <!-- Second card -->
            <div class="card">
                <img src="./Imgs/ado.webp" class="card-img-top rounded" alt="ado chat">
                <div class="card-body">
                    <h5 class="card-title fw-bolder">Initiation / Perfectionnement Enfants et adolescents</h5>
                    <p class="card-text fst-italic fw-semibold">295 € : 1 h 30 / semaine</p>
                    <p class="card-text">(270 € + 25 € licence)</p>
                    <p class="card-text fst-italic fw-semibold">495 € : 3 h / semaine</p>
                    <p class="card-text">(470 € + 25 € licence)</p>
                </div>
            </div>
            <!-- Third card -->
            <div class="card">
                <img src="./Imgs/etudiant.webp" class="card-img-top rounded" alt="etudiant chat">
                <div class="card-body">
                    <h5 class="card-title fw-bolder">Etudiants (19 ans - 25 ans*) </h5>
                    <p class="card-text fst-italic fw-semibold">315 € : 1 h 30 / semaine</p>
                    <p class="card-text">(285 € + 30 € licence)</p>
                    <p class="card-text fst-italic fw-semibold">530 € : 3 h / semaine</p>
                    <p class="card-text">(500 € + 30 € licence)</p>
                    <p class="card-text"><small class="text-muted">* année sportive en cours</small></p>
                </div>
            </div>
            <!-- Fourth card -->
            <div class="card">
                <img src="./Imgs/adulte.webp" class="card-img-top rounded" alt="adulte chat">
                <div class="card-body">
                    <h5 class="card-title fw-bolder">Adultes</h5>
                    <p class="card-text fst-italic fw-semibold">365 € : 1 h 30 / semaine</p>
                    <p class="card-text">(335 € + 30 € licence)</p>
                    <p class="card-text fst-italic fw-semibold">595 € : 3 h / semaine</p>
                    <p class="card-text">(565 € + 30 € licence)</p>
                </div>
            </div>

        </div>
    </div>
    <!-- Include footer partial file -->
    <?php require_once(__DIR__ . '/../../view/Partials/footer.php'); ?>
    <!-- JavaScript Bundle Bootsrap V5.2.1  -->
    <script src="Js/bootstrap.bundle.min.js"></script>
</body>

</html>