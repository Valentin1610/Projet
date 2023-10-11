<?php


try{
    $title = 'Accueil • Guide Ultime de Mario';
} catch(\Throwable $th){
    $error = $th->getMessage();
    include __DIR__ . '/../views/templates/header.php';
    include __DIR__ . '/../views/templates/error.php';
    include __DIR__ . '/../views/templates/footer.php';
}
require __DIR__. '/../views/templates/header.php';
require __DIR__ . '/../views/home.php';
require __DIR__ . '/../views/templates/footer.php';