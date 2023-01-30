<?php
// Include head partial
require_once(__DIR__ . '/../../view/Partials/head.php'); ?>

<body>
    <?php
    // Include header admin partial
    require_once(__DIR__ . '/../../view/Partials/header_admin.php'); ?>
    <form method="post" action="/">
        <!-- MENU -->
        <div class="card text-center col-md-11 mx-auto mt-4" id='menu'>
            <h5 class="card-header">PANEL CONTROL PLANNING</h5>
            <div class="card-body d-grid gap-2 col-md-5 mx-auto">
                <button class="btn text-dark border-0 btn-outline-success btn-lg btn-block" type="button" value="1">Ajouter PLANNING</button>
                <button class="btn text-dark border-0 btn-outline-info btn-lg btn-block" type="button" value="2">Mettre à jour un PLANNING</button>
                <button class="btn text-dark border-0 btn-outline-danger btn-lg btn-block" type="button" value="3">Supprimer un PLANNING</button>
            </div>
        </div>
        <!-- FORMULAIRE TO ADD -->
        <div class="card text-center col-md-11 mx-auto mt-4 d-none" id='insert'>
            <h5 class="card-header">Ajouter PLANNING</h5>
            <div class="card-body d-grid gap-2 mx-auto col-auto">
                <label for="insert_date" class="form-label">Entrer la date et heure</label>
                <input type="datetime-local" class="form-control col-md-3 text-center" name="insert_date" required="required">
            </div>
            <div class="card-body d-grid gap-2 mx-auto">
                <select name="insert_terrain_id" class="text-center" data-live-search="true">
                    <?= $plannings_view_insert ?>
                </select>
            </div>
            <button type="submit" class="btn btn-primary btn-lg mx-auto mt-3 mb-3">Envoyé</button>
        </div>
        <!-- FORMULAIRE TO DELETE -->
        <div class="card text-center col-md-11 mx-auto mt-4 d-none" id='delete'>
            <h5 class="card-header">Supprimer un Adhérent/Professeur</h5>
            <div id="view_plannings_delete">
                <?= $plannings_view_delete ?>
            </div>
        </div>
    </form>
    <form method="post" action="/">

        <!-- FORMULAIRE TO UPDATE -->
        <div class="card text-center col-md-11 mx-auto mt-4 d-none" id='update'>
            <h5 class="card-header">Mettre à jour un PLANNING</h5>
            <div id="view_plannings">
                <?= $plannings_view_update ?>
            </div>
            <div class="d-none" id="update_select">
                <div class="card-body d-grid gap-2 col-md-7 mx-auto">
                    <label for="update_planning_id" class="form-label d-none"></label>
                    <input type="hidden" value="id" class="form-control text-center" name="update_planning_id" id="update_planning_id">
                    <label for="update_planning" class="form-label">Entrer la date et heure</label>
                    <input type="datetime-local" class="form-control col-3 text-center " name="update_planning" id="update_planning" required="required">
                </div>
                <div class="card-body d-grid gap-2 mx-auto">
                    <select name="update_terrain_id" class="text-center" data-live-search="true">
                        <option id="update_planning_option" value="" disabled>Actuellement : terrain </option>
                        <?= $plannings_view_insert ?>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary btn-lg mx-auto mt-3 mb-3">Envoyé</button>
            </div>
        </div>
    </form>
    <!-- JavaScript Bundle Bootsrap V5.2.1  -->
    <script src="Js/bootstrap.bundle.min.js"></script>
    <!-- JavaScript Pour le menu minifier -->
    <script src="Js/admin_menu.min.js"></script>
    <!-- JavaScript specifique au planning minifier -->
    <script src="Js/admin_planning.min.js"></script>
</body>

</html>