<?php
// Import the head partial file
require_once(__DIR__ . '/../../view/Partials/head.php'); ?>

<body>
    <?php
    // Import the header partial file
    require_once(__DIR__ . '/../../view/Partials/header.php'); ?>
    <div class="mt-cust1 card">
        <div class="row g-0 bg-secondary bg-gradient bg-opacity-75 text-white">
            <!-- Left Side Image -->
            <div class="card-body col-md-4">
                <img src="./Imgs/tennisman.png" class="img-fluid rounded-start" alt="tennisman-smash-on-space">
            </div>
            <!-- Right Side Content -->
            <div class="card-body col-md-8">
                <div class="card-body">
                    <h4 class="card-title mt-4 fw-bolder">Tennis Club</h4>
                        <p class="card-text lh-sm">Situé dans le 9ème arrondissement de Marseille, venez découvrir notre club dynamique à l’ambiance conviviale grâce à son équipe enseignante motivée
                            et de qualité. Son cadre arboré et ses terrains récents vous permettent de pratiquer votre sport favori en toute quiétude.
                        </p>
                        <h5 class="fw-semibold">Le club Tennis Propose :</h5>
                        <!-- Club Proposal List -->
                        <ul>
                            <li>Quatre courts éclairés (possibilité de jouer jusqu’à 21h)</li>
                            <li>Deux mini tennis éclairés</li>
                            <li>Un apprentissage de qualité assuré par un professionnel qualifié</li>
                            <li>Cours collectifs adultes et enfants</li>
                            <li>Leçons particulières adultes et enfants</li>
                            <li>Une ambiance conviviale et familiale.</li>
                        </ul>
                        <p class="card-text"><small class="text-bg-info">Last updated 3 mins ago</small></p>
                </div>
            </div>
        </div>
    </div>
    <?php
    // Import the footer partial file
    require_once(__DIR__ . '/../../view/Partials/footer.php'); ?>
    <!-- JavaScript Bundle Bootsrap V5.2.1  -->
    <script src="Js/bootstrap.bundle.min.js"></script>
</body>

</html>