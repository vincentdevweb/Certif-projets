<?php
// Include head partial
require_once(__DIR__ . '/../../view/Partials/head.php'); ?>

<body>
    <?php
    // Include header admin partial
    require_once(__DIR__ . '/../../view/Partials/header_admin.php'); ?>
    <form method="post" action="/">
        <div class="card text-center col-md-11 mx-auto mt-4" id='menu'>
            <h5 class="card-header">PANEL CONTROL JOUEURXPLANNING</h5>
            <div class="card-body d-grid gap-2 col-md-5 mx-auto">
                <button class="btn text-dark border-0 btn-outline-success btn-lg btn-block" type="button" value="1">Programmer un JOUEUR au PLANNING</button>
                <button class="btn text-dark border-0 btn-outline-danger btn-lg btn-block" type="button" value="3">Supprimer un JOUEUR du PLANNING</button>
            </div>
        </div>
        <!-- FORMULAIRE TO ADD -->
        <div class="card text-center col-md-11 mx-auto mt-4 d-none" id='insert'>
            <h5 class="card-header">Programmer un JOUEUR au PLANNING</h5>
            <div id="view_plannings_add">
                <?= $plannings_view ?>
            </div>
        </div>
        <div class="card text-center col-md-11 mx-auto mt-4 d-none" id='add_joueur'>
            <input type="hidden" value="" id="id_planning_add" name="id_planning_add">
            <h5 class="card-header">Programmer un JOUEUR au PLANNING</h5>
            <div id="view_joueurs_add">
                <?= $joueurs_view ?>
            </div>
        </div>
        <!-- FORMULAIRE TO DELETE -->
        <div class="card text-center col-md-11 mx-auto mt-4 d-none" id='delete'>
            <h5 class="card-header">Supprimer un JOUEUR du PLANNING</h5>
            <div id="view_plannings_del">
                <?= $plannings_view_del ?>
            </div>
        </div>
        <div class="card text-center col-md-11 mx-auto mt-4 d-none" id='del_joueur'>
            <input type="hidden" value="" id="id_planning_del" name="id_planning_del">
            <h5 class="card-header">Supprimer un JOUEUR du PLANNING</h5>
            <div id="view_joueurs_del">
                <?= $joueurs_view ?>
            </div>
        </div>
    </form>
    <!-- JavaScript Bundle Bootsrap V5.2.1  -->
    <script src="Js/bootstrap.bundle.min.js"></script>
    <!-- JavaScript Pour le menu minifier -->
    <script src="Js/admin_menu.min.js"></script>
    <!-- JavaScript specifique au PxJ minifier -->
    <script src="Js/admin_pxj.min.js"></script>
</body>

</html>