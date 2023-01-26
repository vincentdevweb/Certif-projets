<?php require_once(__DIR__ . '/../../view/Partials/head.php'); ?>

<body class="bg-image" style="background-image: url('./Imgs/register.jpg');">

    <section class="vh-100">
        <div class="mask d-flex align-items-center h-100 gradient-custom-3">
            <div class="container h-100">
                <div class="row d-flex justify-content-center align-items-center h-100">
                    <div class="col-12 col-md-9 col-lg-7 col-xl-6">
                        <div class="card" style="border-radius: 15px;">
                            <div class="card-body p-5">
                                <h2 class="text-uppercase text-center mb-5">Créer un compte</h2>

                                <form method="post" action="/">

                                    <div class="form-outline mb-4">
                                        <label class="form-label" for="reg-pseudo">Pseudo</label>
                                        <input type="text" id="reg-pseudo" name="reg-pseudo" required="required" class="form-control form-control-lg" maxlength="24">
                                        <div class="invalid-feedback">
                                            Le Pseudo existe déjà veuillez en prendre un autre
                                        </div>
                                        <div class="valid-feedback">
                                            Ce Pseudo est disponible
                                        </div>
                                    </div>

                                    <div class="form-outline mb-4">
                                        <label class="form-label" for="reg-pass">Password</label>
                                        <input type="password" id="reg-pass" name="reg-pass" required="required" class="form-control form-control-lg">
                                    </div>

                                    <div class="form-outline mb-4">
                                        <label class="form-label" for="reg-rep-pass">Repeat password</label>
                                        <input type="password" id="reg-rep-pass" name="reg-rep-pass" required="required" class="form-control form-control-lg">
                                        <div class="invalid-feedback">
                                            Erreur sur la répetition du mot de passe
                                        </div>
                                        <div class="valid-feedback">
                                            Le mot de passe valide
                                        </div>
                                    </div>

                                    <div class="form-check d-flex justify-content-center mb-5">
                                        <input class="form-check-input me-2" required="required" type="checkbox" value="" id="reg-check">
                                        <label class="form-check-label" for="reg-check">
                                            J'accepte toutes les <a href="#!" class="text-body"><u>conditions d'utilisation</u></a>
                                        </label>
                                    </div>

                                    <div id="reg-btn" class="d-flex justify-content-center">
                                        <button type="submit" class="btn btn-success btn-block btn-lg gradient-custom-4 text-body">Register</button>
                                    </div>

                                </form>

                                <p class="text-center text-muted mt-5 mb-0">Vous avez déjà un compte ? <a href="\" class="fw-bold text-body"><u>Connectez-vous ici</u></a></p>


                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- JavaScript Bundle Bootsrap V5.2.1  -->
    <script src="Js/bootstrap.bundle.min.js"></script>
    <!-- test le pseudo dans la BDD et si le mot de passe retapper est bon  -->
    <script src="Js/reg_pseudo_and_doublepass.js"></script>
</body>

</html>