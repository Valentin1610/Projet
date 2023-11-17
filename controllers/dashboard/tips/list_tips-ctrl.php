<?php

require __DIR__ . '/../../../models/Tip.php';
require __DIR__ . '/../../../models/Game.php';

try {
    $errors = [];
    $title = "Liste de toutes les astuces • DashBoard";
    $tips = Tip::getAll();
    $game = Game::get_all();
    $page = intval(filter_input(INPUT_GET, 'page', FILTER_SANITIZE_NUMBER_INT));

    if(empty($page)){
        $page = 1;
    }

    $tips = Tip::getAll(page :$page, all:false);
    $totalTips = Tip::getAll(all:true);

    $nbrTips = count($totalTips);
    $nbrPages = ceil($nbrTips / NB_ELEMENTS_PER_PAGE);
    
} catch (\Throwable $th) {
    $errors = $th->getMessage();

    include __DIR__ . '/../../../views/dashboard/templates/header.php';
    include __DIR__ . '/../../../views/dashboard/templates/error.php';
    include __DIR__ . '/../../../views/dashboard/templates/footer.php';
}

include __DIR__ . '/../../../views/dashboard/templates/header.php';
include __DIR__ . '/../../../views/dashboard/tips/list_tips.php';
include __DIR__ . '/../../../views/dashboard/templates/footer.php';
