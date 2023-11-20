<?php

require __DIR__ . '/../../../models/Game.php';

try {
    $errors = [];

    // Récupération de l'id à supprimer et appelle de la méthode delete()

    $id_games = intval(filter_input(INPUT_GET, 'id_games', FILTER_SANITIZE_NUMBER_INT));
    $ifDeleted = Game::delete($id_games);
    
    // Si la méthode nous retourne true, on fait une redirection vers la liste des jeux
    header('location :/controllers/dashboard/games/list_games-ctrl.php?delete=' . $ifDeleted);
    die;

} catch (\Throwable $th) {
    $errors = $th->getMessage();


    include __DIR__ . '/../../../views/dashboard/templates/header.php';
    include __DIR__ . '/../../../views/dashboard/templates/error.php';
    include __DIR__ . '/../../../views/dashboard/templates/footer.php';
}
