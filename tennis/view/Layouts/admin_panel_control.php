<?php
// Include head partial
require_once(__DIR__ . '/../../view/Partials/head.php'); ?>

<body>
    <?php
    // Include header admin partial
    require_once(__DIR__ . '/../../view/Partials/header_admin.php'); ?>
    <!-- Card header for the Planning HUB -->
    <div class="card text-center mx-auto rounded-1 ">
        <h5 class="card-header">HUB PLANNING</h5>
    </div>

    <!-- Background image -->
    <div class="bg-image" style="background-image: url('./Imgs/bg_planning.jpg');">

        <!-- Table for displaying the planning data -->
        <div class="table-responsive card col-md-6 mx-auto">
            <table class="table table-dark table-borderless mb-0 text-center">
                <!-- Display the global view -->
                <?= $global_view ?>
            </table>
        </div>
    </div>

    <!-- JavaScript Bundle Bootsrap V5.2.1  -->
    <script src="Js/bootstrap.bundle.min.js"></script>
</body>

</html>