<?php 

try{
    $title = 'Accueil du Dashboard';

} catch (\Throwable $th){
    $errors = $th->getMessage();
    include __DIR__ . '/../../views/dashboard/templates/header.php';
    include __DIR__ . '/../../views/dashboard/templates/error.php';
    include __DIR__ . '/../../views/dashboard/templates/footer.php';
}

include __DIR__ . '/../../views/dashboard/templates/header.php';
include __DIR__ . '/../../views/dashboard/dashboard.php';
include __DIR__ . '/../../views/dashboard/templates/footer.php';
