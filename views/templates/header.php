<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Bienvenue dans le Guide Ultime de l'univers Mario, vous trouverez un tas d'astuces dans l'univers Mario et pleins d'autres surprises.">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" href="/public/assets/css/<?= $css ?>">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <link rel="shortcut icon" href="/public/assets/img/Mario_emblem.png">
    <title><?= $title ?></title>
</head>

<body>

    <!-- Tête de la page -->

    <header>
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-sm-2">
                    <div class="card bg-transparent border-0 text-center mt-2">
                        <div class="card-body p-0">
                            <?php if (empty($_SESSION['username'])) { ?>
                                <p class="inscription"><a href="/controllers/website/user_registration-ctrl.php">Inscription</a></p>
                                <p class="inscription"><a href="/controllers/website/user_connect-ctrl.php">Se connecter</a></p>
                            <?php } else { ?>
                                <p class="text-white">Bonjour <?= $_SESSION['username']->username ?></p>
                                <a href="/controllers/website/user_profil-ctrl.php?id_user=<?= $_SESSION['username']->id_user ?>"><img class="w-75" src="<?= $_SESSION['username']->profil ?>" alt="<?= $_SESSION['username']->profil ?>"></a>
                                <p class="inscription"><a href="/controllers/website/disconnect_user-ctrl.php">Se déconnecter</a></p>
                            <?php } ?>
                        </div>
                    </div>
                </div>
                <div class="col-sm-10">
                    <div class="card bg-transparent border-0 text-centet mt-4">
                        <div class="card-body pt-0">
                            <h1 class="text-center text-white"> <a href="/controllers/website/home-ctrl.php">Guide Ultime de Super Mario</a></h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>



        <!-- Fin Tête de page -->

        <!-- Menu NavBar -->

        <nav class="navbar navbar-expand-md ">
            <div class="container-fluid text-center">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav m-auto mb-2 mb-lg-0">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-white p-0 ms-5" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Jeux Mario
                            </a>
                            <ul class="dropdown-menu">
                                <?php foreach ($categories as $category) { ?>
                                    <li><a class="dropdown-item text-white" href="/controllers/website/list_games-ctrl.php?id_types=<?= $category->id_types ?>"><?= $category->type ?></a></li>
                                <?php } ?>
                            </ul>
                        </li>
                        <li class="nav-item ms-5"><a href="/controllers/website/events-ctrl.php">Calendrier / Événements</a></li>
                        <li class="nav-item ms-5"><a href="/controllers/website/contact-ctrl.php">Contact</a></li>
                        <?php if (isset($_SESSION['username']) && ($_SESSION['username']->role == 1)) { ?>
                            <li class="nav-item ms-5"><a href="/controllers/dashboard/dashboard-ctrl.php">Dashboard</a></li>
                        <?php } ?>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <!-- Fin du menu NavBar -->