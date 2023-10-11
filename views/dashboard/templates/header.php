<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="/public/assets/css/dashboard.css">
    <link rel="shortcut icon" href="/public/assets/img/outils.png">
    <title><?= $title ?></title>
</head>

<body>
    <header>
        <h1 class="text-center fst-italic">DashBoard</h1>
        <nav class="navbar navbar-expand-md">
            <div class="container-fluid text-center">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar" aria-controls="navbar" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbar">
                    <ul class="navbar-nav m-auto mb-2 mb-lg-0">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Catégories
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="">Ajouter une Catégorie</li></a>
                                <li><a class="dropdown-item" href="">Liste de toutes les Catégories</li></a>
                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Consoles
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="">Ajouter une Console</li></a>
                                <li><a class="dropdown-item" href="">Liste de toutes les Consoles</li></a>
                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Jeux
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="">Ajouter un Jeu</li></a>
                                <li><a class="dropdown-item" href="">Liste de tout les Jeux</li></a>
                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Astuces
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="">Ajouter une astuce</li></a>
                                <li><a class="dropdown-item" href="">Liste de toutes les astuces</li></a>
                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Évenements
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="">Ajouter un évenement</li></a>
                                <li><a class="dropdown-item" href="">Liste de tout les évenements</li></a>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header> <!--
                <li>
                    <a href="#tips">
                        Astuces
                    </a>
                </li>
                <li>
                    <a href="#ranksplayers">
                        Classement Meilleurs Joueurs
                    </a>
                </li>
                <li>
                    <a href="#lastranks">
                        Classement Tournoi
                    </a>
                </li>
                <li class="log-out">
                    <a href="">
                        Se déconnectez
                    </a>
                </li> -->