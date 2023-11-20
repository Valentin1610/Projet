<?php

require_once __DIR__ . '/../../../models/Game.php';
require_once __DIR__ . '/../../../models/Category.php';
require_once __DIR__ . '/../../../models/Console.php';
require_once __DIR__ . '/../../../config/constants.php';

try {
    $title = "Liste de tout les jeux • DashBoard";
    $consoles = Console::getAll();
    $types = Category::getall();
    $page = intval(filter_input(INPUT_GET, 'page', FILTER_SANITIZE_NUMBER_INT));
    
    if (empty($page)) {
        $page = 1;
    }
    // Appelle de la méthode pour récupérer les jeux pour une page donné
    $games = Game::get_all($page, all:false);
    // Appelle de la méthode pour récupérer tous les jeux 
    $totalGames = Game::get_all(all: true);
    
    $nbGames = count($totalGames);
    $nbrPages = ceil($nbGames / NB_ELEMENTS_PER_PAGE);
    
} catch (\Throwable $th) {
    $errors = $th->getMessage();

    include __DIR__ . '/../../../views/dashboard/templates/header.php';
    include __DIR__ . '/../../../views/dashboard/templates/error.php';
    include __DIR__ . '/../../../views/dashboard/templates/footer.php';
}

include __DIR__ . '/../../../views/dashboard/templates/header.php';
include __DIR__ . '/../../../views/dashboard/games/list_games.php';
include __DIR__ . '/../../../views/dashboard/templates/footer.php';
