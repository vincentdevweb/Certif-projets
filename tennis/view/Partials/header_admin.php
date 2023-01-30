<!-- Navigation bar code using Bootstrap 5.2.1-->
<nav class="navbar navbar-expand-md navbar-dark bg-primary">
    <!-- Navbar Container -->
    <div class="container-fluid">
        <!-- Home Link -->
        <a class="navbar-brand abs" href="/">HOME</a>
        <!-- Navbar Toggler Icon -->
        <button class="navbar-toggler ms-auto" type="button" data-bs-toggle="collapse" data-bs-target="#collapseNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>
        <!-- Start of Navbar Collapse -->
        <div class="navbar-collapse collapse" id="collapseNavbar">
            <!-- Navbar Links List-->
            <ul class="navbar-nav">
                <!-- Active Planning Link -->
                <li class="nav-item active">
                    <a class="nav-link" href="?planning">PLANNING</a>
                </li>
                <!-- Joueur Link -->
                <li class="nav-item">
                    <a class="nav-link" href="?joueur">JOUEUR</a>
                </li>
                <!-- Planning x Joueur Link -->
                <li class="nav-item">
                    <a class="nav-link" href="?joueurxplanning">PLANNINGxJOUEUR</a>
                </li>
            </ul>
            <!-- Right Navbar Links List-->
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link fw-bolder text-danger" href="?disconnect">DISCONNECT</a>
                </li>
            </ul>
        </div>
    </div>
</nav>