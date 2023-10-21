<?php

require __DIR__ . '/../../../models/Console.php';

try {
    $title = "Liste de toutes les consoles • DashBoard";
} catch (\Throwable $th) {
    $errors = $th->getMessage();

    include __DIR__ . '/../../../views/dashboard/templates/header.php';
    include __DIR__ . '/../../../views/dashboard/templates/error.php';
    include __DIR__ . '/../../../views/dashboard/templates/footer.php';
}

include __DIR__ . '/../../../views/dashboard/templates/header.php';
include __DIR__ . '/../../../views/dashboard/consoles/list_consoles.php';
include __DIR__ . '/../../../views/dashboard/templates/footer.php';
