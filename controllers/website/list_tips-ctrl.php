<?php 

require_once __DIR__ . '/../../models/Category.php';
require_once __DIR__ . '/../../models/Game.php';
require_once __DIR__ . '/../../models/Tip.php';
require_once __DIR__ . '/../../models/User.php';
require_once __DIR__ . '/../../models/User_Tip.php';
require __DIR__ . '/../../config/init.php';


try {
    $errors = [];
    $title = "Liste des astuces • Guide Ultime de Super Mario";
    $css = "style.css";
    
    $id_types = intval(filter_input(INPUT_GET, 'id_types', FILTER_SANITIZE_NUMBER_INT));
    $types = Category::get($id_types);

    $id_games = intval(filter_input(INPUT_GET, 'id_games', FILTER_SANITIZE_NUMBER_INT));
    $games = Game::get($id_games);
    
    $categories = Category::getall();

    $tips = Tip::get_all_tips($id_games);

} catch (\Throwable $th) {
    $errors =$th->getMessage();

    include __DIR__ . '/../../views/templates/header.php';
    include __DIR__ . '/../../views/templates/error.php';
    include __DIR__ . '/../../views/templates/footer.php';
}

include __DIR__ . '/../../views/templates/header.php';
include __DIR__ . '/../../views/list_tips.php';
include __DIR__ . '/../../views/templates/footer.php';