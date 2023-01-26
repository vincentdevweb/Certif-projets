<?php require_once(__DIR__ . '/../../view/Partials/head.php');?>
<body>
    <?php
    require_once(__DIR__ . '/../../view/Partials/header.php');
    ?>
    <form method="post" action="/">
        <div class="d-flex justify-content-between">
            <button type="button" class="btn btn-light disabled animate__animated animate__heartBeat animate__slower animate__infinite animate__delay-1s" value="stop">
                TIMER : <span class="badge text-bg-info" id="timer">00:00</span>
            </button>
            <div class="h3">
                <button id="dark_theme" type="button" class="btn btn-outline-dark btn-rounded">
                    DARK MODE !!!
                </button>
            </div>
        </div>
        <?php
        foreach ($questions as $question) {
            extract($question);
            $result = '<div class="card text-center d-none col-11 mx-auto" data-id="' . $id . '"><h5 class="card-header">Q°' . $numero_question . ' ' . $libelle_q . '</h5><div class="card-body d-grid gap-2 col-9 mx-auto">';
            $numero_question++;
            $lettre_reponse = "A) ";
            foreach ($reponses as $reponse) {
                extract($reponse);
                if ($id_question == $id) {
                    $result .= '<button class="btn btn-outline-warning btn-lg btn-block animate__animated animate__rubberBand" type="button" value="' . $rep_id . '" data-buttonid="' . $id . '">' . $lettre_reponse . $libelle_rep . '</button>';
                    if ($lettre_reponse == "A) ") {
                        $lettre_reponse = "B) ";
                    } elseif ($lettre_reponse == "B) ") {
                        $lettre_reponse = "C) ";
                    } else {
                        $lettre_reponse = "D) ";
                    };
                };
            };
            $result .= '</div></div>';
            echo $result;
        };
        ?>

        <div class="card text-center d-none col-11 mx-auto" id="try_again">
            <h5 class="card-header">Merci d'avoir joué à Bagel-Quiz</h5>
            <div class="d-none col-9 mx-auto" id="show_pseudo"><label for="escobard">Enter your Pseudo: </label><input type="text" name="escobard" id="escobard" required="required"></div>
            <div class="card-body d-grid gap-2 col-9 mx-auto justify-content-center" id="div_button_try_again"></div>
        </div>
    </form>
    <div class="progress" id="taux_de_reussite">
        <div class="progress-bar" role="progressbar" aria-label="Example with label" style="width: 0%;" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
    </div>
    <div class="progress" id="taux_de_progression">
        <div class="progress-bar progress-bar-striped bg-danger progress-bar-animated" role="progressbar" aria-label="Danger striped example" style="width: 0%" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">PROGRESS BAR</div>
    </div>

    <?php
    require_once(__DIR__ . '/../../view/Partials/footer.php');
    ?>
    <!-- JavaScript Bundle Bootsrap V5.2.1  -->
    <script src="Js/bootstrap.bundle.min.js"></script>
    <!-- JS-Cookie V3.0.1  -->
    <script src="Js/js.cookie.min.js"></script>
    <!-- JS burger-game -->
    <script src="Js/gamehard.js"></script>
</body>

</html>