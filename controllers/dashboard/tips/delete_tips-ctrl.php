<?php

require __DIR__ . '/../../../models/Tip.php';
require_once __DIR__ . '/../../../config/init.php';


try {
    $errors = [];
    $id_tips = intval(filter_input(INPUT_GET, 'id_tips', FILTER_SANITIZE_NUMBER_INT));
    $ifDeleted = Tip::delete($id_tips);
    header('location :/controllers/dashboard/games/list_tips-ctrl.php?delete='. $ifDeleted);
    die;

} catch (\Throwable $th) {
    $errors = $th->getMessage();

    include __DIR__ . '/../../../views/dashboard/templates/header.php';
    include __DIR__ . '/../../../views/dashboard/templates/error.php';
    include __DIR__ . '/../../../views/dashboard/templates/footer.php';
}
