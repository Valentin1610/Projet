<?php 

require __DIR__ . '/../../../models/Tip.php';
require __DIR__ . '/../../../models/Game.php';
require __DIR__ .'/../../../models/User.php';

try {
    $title = "Ajout d'une nouvelle astuce";
} catch (\Throwable $th) {
    $errors = $th->getMessage();

    include __DIR__ .'/../../../views/dashboard/templates/header.php';
    include __DIR__ .'/../../../views/dashboard/templates/error.php';
    include __DIR__ .'/../../../views/dashboard/templates/footer.php';
}

include __DIR__ .'/../../../views/dashboard/templates/header.php';
include __DIR__ .'/../../../views/dashboard/tips/new-tips.php';
include __DIR__ .'/../../../views/dashboard/templates/footer.php';
