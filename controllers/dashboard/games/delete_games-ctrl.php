<?php

require __DIR__ . '/../../../models/Game.php';

try {
    $errors = [];
    $id_games = intval(filter_input(INPUT_GET, 'id_games', FILTER_SANITIZE_NUMBER_INT));
    $ifDeleted = Game::delete($id_games);
    header('location :/controllers/dashboard/games/list_games-ctrl.php?delete=' . $ifDeleted);
    die;

} catch (\Throwable $th) {
    $errors = $th->getMessage();


    include __DIR__ . '/../../../views/dashboard/templates/header.php';
    include __DIR__ . '/../../../views/dashboard/templates/error.php';
    include __DIR__ . '/../../../views/dashboard/templates/footer.php';
}
