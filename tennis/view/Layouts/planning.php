<?php
// Include head partial
require_once(__DIR__ . '/../../view/Partials/head.php'); ?>

<body>
    <?php
    // Include header partial
    require_once(__DIR__ . '/../../view/Partials/header.php');
    ?>
    <div class="card text-center mx-auto rounded-1 mt-cust1 rounded-0 bg-gradient bg-info">
        <h5 class="card-header">PLANNING</h5>
    </div>
    <div class="bg-image" style="background-image: url('./Imgs/bg_planning.jpg');">
        <div class="table-responsive card col-md-6 mx-auto">
            <table class="table table-dark table-borderless mb-0 text-center">
                <?= $global_view ?>
            </table>
        </div>
    </div>

    <!-- Include footer partial file -->
    <?php require_once(__DIR__ . '/../../view/Partials/footer.php'); ?>
    <!-- JavaScript Bundle Bootsrap V5.2.1  -->
    <script src="Js/bootstrap.bundle.min.js"></script>
</body>

</html>