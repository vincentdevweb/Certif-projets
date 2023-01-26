<?php require_once(__DIR__ . '/../../view/Partials/head.php'); ?>

<body>
    <?php require_once(__DIR__ . '/../../view/Partials/header_admin.php'); ?>
    <form method="post" action="/">
    <div class="card text-center col-md-11 mx-auto mt-4" id='del_joueur'>
            <input type="hidden" value="<?= (int)$_GET['PID'] ?>" id="id_planning_del" name="id_planning_del">
            <h5 class="card-header">Supprimer un JOUEUR du PLANNING</h5>
            <!-- <div class="card-body d-grid gap-2 col-5 mx-auto"> -->
            <div id="view_joueurs_del">
                <?= $joueurs_view ?>
            </div>
            <!-- </div> -->
        </div>
    </form>
    <!-- JavaScript Bundle Bootsrap V5.2.1  -->
    <script src="Js/bootstrap.bundle.min.js"></script>
    <!-- JavaScript Pour le menu  -->
    <!-- <script src="Js/admin_menu.js"></script> -->
    <!-- JavaScript specifique au PxJ  -->
    <script src="Js/admin_pxj_del.js"></script>
</body>

</html>