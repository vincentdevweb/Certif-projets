<?php
// Include head partial
require_once(__DIR__ . '/../../view/Partials/head.php'); ?>

<body>
    <?php
    // Include header partial
    require_once(__DIR__ . '/../../view/Partials/header.php');
    ?>
    <!-- Contact form container -->
    <div class="container my-5 mt-cust1">
        <!-- Contact form header -->
        <h1>Contactez-nous</h1>
        <!-- Contact form description -->
        <p>Vous avez des questions ou des commentaires? N'hésitez pas à nous contacter en utilisant les informations ci-dessous.</p>
        <!-- Contact form details container -->
        <div class="row">
            <!-- Contact address container  -->
            <div class="col-md-4">
                <!-- Contact address header -->
                <h3>Adresse</h3>
                <!-- Contact address details -->
                <p>35 Rue Maxime La Tour<br>Marseille 13009<br>France</p>
            </div>
            <!-- Contact phone container -->
            <div class="col-md-4">
                <!-- Contact phone header -->
                <h3>Téléphone</h3>
                <!-- Contact phone number -->
                <p>06 99 99 99 99</p>
            </div>
            <!-- Contact email container -->
            <div class="col-md-4">
                <!-- Contact email header -->
                <h3>Email</h3>
                <!-- Contact email address -->
                <p>tennis-club@gmail.com</p>
            </div>
        </div>
    </div>
    <!-- Include footer partial file -->
    <?php require_once(__DIR__ . '/../../view/Partials/footer.php'); ?>
    <!-- JavaScript Bundle Bootsrap V5.2.1  -->
    <script src="Js/bootstrap.bundle.min.js"></script>
</body>

</html>