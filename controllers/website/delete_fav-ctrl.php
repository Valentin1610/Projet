<?php

require __DIR__ . '/../../models/User_Tip.php';
require_once __DIR__ . '/../../config/init.php';

try {
    $errors = [];
    $id_tips = intval(filter_input(INPUT_GET, 'id_tips', FILTER_SANITIZE_NUMBER_INT));
    $id_user = intval(filter_input(INPUT_GET, 'id_user', FILTER_SANITIZE_NUMBER_INT));
    $ifDeleted = User_Tip::delete($id_user, $id_tips);
    header('location: /controllers/website/user_profil-ctrl.php?delete='. $ifDeleted);
    die;
} catch (\Throwable $th) {
    $errors = $th->getMessage();

    include __DIR__ . '/../../views/templates/header.php';
    include __DIR__ . '/../../views/templates/error.php';
    include __DIR__ . '/../../views/templates/footer.php';
}