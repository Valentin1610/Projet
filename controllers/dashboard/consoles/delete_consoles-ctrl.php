<?php

require __DIR__ . '/../../../models/Console.php';
require_once __DIR__ . '/../../../config/init.php';


try {
    $errors = [];
    $id_consoles = intval(filter_input(INPUT_GET, 'id_consoles', FILTER_SANITIZE_NUMBER_INT));
    $ifDelete = Console::delete($id_consoles);
    header('location: /controllers/dashboard/consoles/list_consoles-ctrl.php?delete=' . $ifDelete);
    die;
} catch (\Throwable $th) {
    $errors = $th->getMessage();

    include __DIR__ . '/../../../views/dashboard/templates/header.php';
    include __DIR__ . '/../../../views/dashboard/templates/error.php';
    include __DIR__ . '/../../../views/dashboard/templates/footer.php';
}
