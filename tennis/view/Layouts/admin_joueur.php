<?php require_once(__DIR__ . '/../../view/Partials/head.php'); ?>

<body>
    <?php require_once(__DIR__ . '/../../view/Partials/header_admin.php'); ?>
    <form method="post" action="/">
        <!-- MENU -->
        <div class="card text-center col-md-11 mx-auto mt-4" id='menu'>
            <h5 class="card-header">PANEL CONTROL JOUEUR</h5>
            <div class="card-body d-grid gap-2 col-md-5 mx-auto">
                <button class="btn text-dark border-0 btn-outline-success btn-lg btn-block" type="button" value="1">Ajouter Adhérent/Professeur</button>
                <button class="btn text-dark border-0 btn-outline-info btn-lg btn-block" type="button" value="2">Mettre à jour un Adhérent/Professeur</button>
                <button class="btn text-dark border-0 btn-outline-danger btn-lg btn-block" type="button" value="3">Supprimer un Adhérent/Professeur</button>
            </div>
        </div>
        <!-- FORMULAIRE TO ADD -->
        <div class="card text-center col-md-11 mx-auto mt-4 d-none" id='insert'>
            <h5 class="card-header">Ajouter Adhérent/Professeur</h5>
            <div class="card-body d-grid gap-2 col-md-7 mx-auto">
                <label for="insert_joueur" class="form-label">Entrer le Nom du Joueur</label>
                <input type="text" class="form-control" name="insert_joueur">
            </div>
            <div class="card-body d-grid gap-2 mx-auto">
                <select name="insert_role" class="text-center" data-live-search="true">
                    <option value="adherent" data-tokens="ad">Adhérent</option>
                    <option value="professeur" data-tokens="pr">Professeur</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary btn-lg mx-auto mt-3 mb-3">Envoyé</button>
        </div>
        <!-- FORMULAIRE TO UPDATE -->
        <div class="card text-center col-md-11 mx-auto mt-4 d-none" id='update'>
            <h5 class="card-header">Mettre à jour un Adhérent/Professeur</h5>
            <div id="view_joueurs">
                <?= $joueurs_view ?>
            </div>
            <div class="d-none" id="update_select">
                <div class="card-body d-grid gap-2 col-md-7 mx-auto">
                    <label for="update_joueur_id" class="form-label d-none"></label>
                    <input type="hidden" value="id" class="form-control text-center" name="update_joueur_id" id="update_joueur_id">
                    <label for="update_joueur" class="form-label">Entrer le Nom du Joueur</label>
                    <input type="text" value="name" class="form-control text-center " name="update_joueur" id="update_joueur">
                </div>
                <div class="card-body d-grid gap-2 mx-auto">
                    <select name="update_role" class="text-center" data-live-search="true">
                        <option id="update_role_option" value="" disabled>Actuellement : Chalut </option>
                        <option value="adherent">Adhérent</option>
                        <option value="professeur">Professeur</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary btn-lg mx-auto mt-3 mb-3">Envoyé</button>
            </div>
        </div>
        <!-- FORMULAIRE TO DELETE -->
        <div class="card text-center col-md-11 mx-auto mt-4 d-none" id='delete'>
            <h5 class="card-header">Supprimer un Adhérent/Professeur</h5>
            <!-- <div class="card-body d-grid gap-2 col-5 mx-auto"> -->
            <div id="view_joueurs_delete">
                <?= $joueurs_view_delete ?>
            </div>
            <!-- </div> -->
        </div>
    </form>
    <!-- JavaScript Bundle Bootsrap V5.2.1  -->
    <script src="Js/bootstrap.bundle.min.js"></script>
    <!-- JavaScript Pour le menu  -->
    <script src="Js/admin_menu.js"></script>
    <!-- JavaScript Pour le menu specifique au joueur  -->
    <script src="Js/admin_joueur.js"></script>
</body>


</html>