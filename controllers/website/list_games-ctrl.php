<?php

require_once __DIR__ . '/../../models/Category.php';
require_once __DIR__ . '/../../models/Console.php';
require_once __DIR__ . '/../../models/Game.php';
require __DIR__ . '/../../config/init.php';


try {
    $errors = [];
    $css = 'style.css';
    $title = "Liste des jeux • Guide Ultime de Super Mario";
    $description = "Voici une liste des jeux qui correspondent à la catégorie.";

    $id_types = intval(filter_input(INPUT_GET, 'id_types', FILTER_SANITIZE_NUMBER_INT));
    $types = Category::get($id_types);

    $id_consoles = intval(filter_input(INPUT_GET, 'id_consoles', FILTER_SANITIZE_NUMBER_INT));
    $consoles = Console::get($id_consoles);

    $id_games = intval(filter_input(INPUT_GET,'id_games', FILTER_SANITIZE_NUMBER_INT));
    $getGames = Game::get($id_games);
    
    $categories= Category::getall();


    $games = Game::getGames($id_types);
    $get3Dconsoles = Console::get_all_consoles3D($id_types);


} catch (\Throwable $th) {
    $errors = $th->getMessage();

    include __DIR__ . '/../../views/templates/header.php';
    include __DIR__ . '/../../views/templates/error.php';
    include __DIR__ . '/../../views/templates/footer.php';

}

include __DIR__ . '/../../views/templates/header.php';
include __DIR__ . '/../../views/list_games.php';
include __DIR__ . '/../../views/templates/footer.php';

