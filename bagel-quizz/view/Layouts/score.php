<?php require_once(__DIR__ . '/../../view/Partials/head.php');?>

<body>
    <?php
    require_once(__DIR__ . '/../../view/Partials/header.php');
    ?>

        <div class="d-flex justify-content-between">
            <a class="btn btn-outline-success h3" href="/" role="button">Play Bagel Game</a>
            <div class="h3">
                <button id="dark_theme" type="button" class="btn btn-outline-dark btn-rounded">
                    DARK MODE !!!
                </button>
            </div>
        </div>

        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Date</th>
                    <th scope="col">Heure</th>
                    <th scope="col">Score</th>
                </tr>
            </thead>
            <tbody>
                <?= $tablephp_scores ?>
            </tbody>
        </table>

        <?php
        require_once(__DIR__ . '/../../view/Partials/footer.php');
        ?>
        <!-- JavaScript Bundle Bootsrap V5.2.1  -->
        <script src="Js/bootstrap.bundle.min.js"></script>
        <!-- JS-Cookie V3.0.1  -->
        <script src="Js/js.cookie.min.js"></script>
        <!-- JS Cookie + Sound effect + Dark mode -->
        <script src="Js/sound_theme.js"></script>
</body>

</html>