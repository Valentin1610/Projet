<?php

require __DIR__ . '/../../../models/Game.php';
require __DIR__ . '/../../../models/User.php';

try {
    $title = 'Ajouter un Jeu • DashBoard';
} catch (\Throwable $th) {
    $errors = $th->getMessage();

    include __DIR__ . '/../../../views/dashboard/templates/header.php';
    include __DIR__ . '/../../../views/dashboard/templates/error.php';
    include __DIR__ . '/../../../views/dashboard/templates/footer.php';
}

include __DIR__ . '/../../../views/dashboard/templates/header.php';
include __DIR__ . '/../../../views/dashboard/games/new_games.php';
include __DIR__ . '/../../../views/dashboard/templates/footer.php';
