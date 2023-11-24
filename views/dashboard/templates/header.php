<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="/public/assets/css/dashboard.css">
    <link rel="shortcut icon" href="/public/assets/img/outils.png">
    <title><?= $title ?></title>
</head>

<body>
    <header class="bg-primary h-75">
        <nav class="navbar navbar-expand-md">
            <a class="text-decoration-none" href="/controllers/dashboard/dashboard-ctrl.php">
                <h1 class="text-center text-white fst-italic p-2 m-3">DashBoard</h1>
            </a>
            <div class="container-fluid text-center">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar" aria-controls="navbar" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbar">
                    <ul class="navbar-nav m-auto mb-2 mb-lg-0">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-white" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Catégories
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="/controllers/dashboard/categories/new_categories-ctrl.php">Ajouter une Catégorie</a></li>
                                <li><a class="dropdown-item" href="/controllers/dashboard/categories/list_categories-ctrl.php">Liste de toutes les Catégories</a></li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-white" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Consoles
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="/controllers/dashboard/consoles/new_consoles-ctrl.php">Ajouter une Console</a></li>
                                <li><a class="dropdown-item" href="/controllers/dashboard/consoles/list_consoles-ctrl.php">Liste de toutes les Consoles</a></li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-white" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Jeux
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="/controllers/dashboard/games/new_games-ctrl.php">Ajouter un Jeu</a></li>
                                <li><a class="dropdown-item" href="/controllers/dashboard/games/list_games-ctrl.php">Liste de tout les Jeux</a></li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-white" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Astuces
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="/controllers/dashboard/tips/new_tips-ctrl.php">Ajouter une astuce</a></li>
                                <li><a class="dropdown-item" href="/controllers/dashboard/tips/list_tips-ctrl.php">Liste de toutes les astuces</a></li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-white" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Évenements
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="/controllers/dashboard/events/add_events-ctrl.php">Ajouter un évenement</a></li>
                                <li><a class="dropdown-item" href="/controllers/dashboard/events/list_events-ctrl.php">Liste de tout les évenements</a></li>
                            </ul>
                        </li>
                        <a class="text-decoration-none" href="/controllers/website/home-ctrl.php">
                            <p class="text-white fst-italic p-2">Retour sur le site</p>
                        </a>
                    </ul>
                </div>
            </div>
        </nav>
    </header>