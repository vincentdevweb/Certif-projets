<?php require_once(__DIR__ . '/../../view/Partials/head.php');?>

<body class="bg-image" style="background-image: url('./Imgs/login.webp');">
    <section class="vh-100 gradient-custom">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                    <div class="card bg-dark text-white" style="border-radius: 1rem;">
                        <div class="card-body p-5 text-center">

                            <div class="mb-md-5 mt-md-4 pb-5">

                                <h2 class="fw-bold mb-2 text-uppercase">Login</h2>
                                <p class="text-white-50 mb-5">Entrer votre pseudo et password pour jouer au jeu Bagel-Quizz</p>
                                <form method="post" action="/">
                                    <div class="form-outline form-white mb-4">
                                        <input type="text" id="log-pseudo" name="log-pseudo" class="form-control form-control-lg" />
                                        <label class="form-label" for="log-pseudo">Pseudo</label>
                                    </div>

                                    <div class="form-outline form-white mb-4">
                                        <input type="password" id="log-pass" name="log-pass" class="form-control form-control-lg" />
                                        <label class="form-label" for="log-pass">Password</label>
                                    </div>
                                    <button class="btn btn-outline-light btn-lg px-5" type="submit">Login</button>

                                </form>

                                <!-- <p class="small mb-5 pb-lg-2"><a class="text-white-50" href="#!">password oublié?</a></p> -->


                                <div class="d-flex justify-content-center text-center mt-4 pt-1">
                                    <a href="#!" class="text-white"><i class="fab fa-facebook-f fa-lg"></i></a>
                                    <a href="#!" class="text-white"><i class="fab fa-twitter fa-lg mx-4 px-2"></i></a>
                                    <a href="#!" class="text-white"><i class="fab fa-google fa-lg"></i></a>
                                </div>

                            </div>

                            <div>
                                <p class="mb-0">Vous n'avez pas de compte ? <a href="?register=on" class="text-white-50 fw-bold">S'inscrire</a>
                                </p>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- JavaScript Bundle Bootsrap V5.2.1  -->
    <script src="Js/bootstrap.bundle.min.js"></script>
</body>

</html>