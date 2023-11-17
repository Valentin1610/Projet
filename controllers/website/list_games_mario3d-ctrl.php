<?php 

include __DIR__ . '/../../models/Game.php';
include __DIR__ . '/../../models/Category.php';
include __DIR__ . '/../../models/Console.php';
include __DIR__ . '/../../config/init.php';

try {
    $errors = [];
    $css = 'style.css';
    
    $categories = Category::getall();
    
    $id_types = intval(filter_input(INPUT_GET, 'id_types', FILTER_SANITIZE_NUMBER_INT));
    $types = Category::get($id_types);
    
    $id_consoles = intval(filter_input(INPUT_GET, 'id_consoles'));
    $consoles = Console::get($id_consoles);
    $title = "Liste des jeux " . $consoles->console. " • Guide Ultime de Super Mario";
    
    $id_games = intval(filter_input(INPUT_GET, 'id_games', FILTER_SANITIZE_NUMBER_INT));
    $games = Game::get($id_games);
    
    $getGames = Game::getByClause($id_types, $id_consoles, $id_games);
    
} catch (\Throwable $th) {
    $errors = $th->getMessage();

    include __DIR__ . '/../../views/templates/header.php';
    include __DIR__ . '/../../views/templates/error.php';
    include __DIR__ . '/../../views/templates/footer.php';
    die;
}
    include __DIR__ . '/../../views/templates/header.php';
    include __DIR__ . '/../../views/list_games_mario3d.php';
    include __DIR__ . '/../../views/templates/footer.php';