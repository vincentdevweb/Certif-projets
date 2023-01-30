<?php
// Include head partial
require_once(__DIR__ . '/../../view/Partials/head.php'); ?>

<body>
    <?php
    // Include header admin partial
    require_once(__DIR__ . '/../../view/Partials/header_admin.php'); ?>
    <form method="post" action="/">
    <div class="card text-center col-md-11 mx-auto mt-4" id='del_joueur'>
            <input type="hidden" value="<?= (int)$_GET['PID'] ?>" id="id_planning_del" name="id_planning_del">
            <h5 class="card-header">Supprimer un JOUEUR du PLANNING</h5>
            <div id="view_joueurs_del">
                <?= $joueurs_view ?>
            </div>
        </div>
    </form>
    <!-- JavaScript Bundle Bootsrap V5.2.1  -->
    <script src="Js/bootstrap.bundle.min.js"></script>
    <!-- JavaScript specifique au PxJ  -->
    <script src="Js/admin_pxj_del.js"></script>
</body>

</html>