<?php 

require __DIR__ . '/../../../models/Game.php';

try {
    $title = "Liste de tout les jeux • DashBoard";
} catch (\Throwable $th) {
    $errors = $th->getMessage();

    include __DIR__ . '/../../../views/dashboard/templates/header.php';
    include __DIR__ . '/../../../views/dashboard/templates/error.php';
    include __DIR__ . '/../../../views/dashboard/templates/footer.php';
}

include __DIR__ . '/../../../views/dashboard/templates/header.php';
include __DIR__ . '/../../../views/dashboard/games/list_games.php';
include __DIR__ . '/../../../views/dashboard/templates/footer.php';
