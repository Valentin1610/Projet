<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Bienvenue dans le Guide Ultime de l'univers Mario, vous trouverez un tas d'astuces dans l'univers Mario et pleins d'autres surprises.">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" href="/public/assets/css/style.css">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css" />
    <link rel="shortcut icon" href="/public/assets/img/Mario_emblem.png">
    <title><?= $title?></title>
</head>

<body>

    <!-- Tête de la page -->

    <header>
        <div class="headertitle">
            <div class="text-center">
                <p class="inscription"><a href="">Inscription</a></p>
                <p class="inscription"><a href="">Se connecter</a></p>
            </div>
            <div class="flex-fill">
                <h1 class="text-center text-white">Guide Ultime de Super Mario</h1>
            </div>
        </div>



        <!-- Fin Tête de page -->

        <!-- Menu -->

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
                                <li><a class="dropdown-item text-white" href="">Mario Party</a></li>
                                <li><a class="dropdown-item text-white" href="">Consoles 3D</a></li>
                                <li><a class="dropdown-item text-white" href="">Mario Kart</a></li>
                                <li><a class="dropdown-item text-white" href="">Mario Bros</a></li>
                            </ul>
                        </li>
                        <li class="nav-item ms-5"><a href="">Calendrier / Événements</a></li>
                        <li class="nav-item ms-5"><a href="" >Contact</a></li>
                        <li class="nav-item ms-5"><a href="/controllers/dashboard/dashboard-ctrl.php">Dashboard</a></li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>