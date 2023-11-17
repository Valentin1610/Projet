<?php

require __DIR__ .'/../../models/Category.php';
require __DIR__ . '/../../models/Tip.php';
require __DIR__ . '/../../config/init.php';


try{
    $css = 'style.css';
    $categories = Category::getall();
    $title = 'Accueil • Guide Ultime de Mario';
} catch(\Throwable $th){
    $error = $th->getMessage();
    include __DIR__ . '/../../views/templates/header.php';
    include __DIR__ . '/../../views/templates/error.php';
    include __DIR__ . '/../../views/templates/footer.php';
}
require __DIR__. '/../../views/templates/header.php';
require __DIR__ . '/../../views/home/home.php';
require __DIR__ . '/../../views/templates/footer.php';