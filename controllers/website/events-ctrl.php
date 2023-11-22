<?php 

require __DIR__ . '/../../models/User.php';
require __DIR__ . '/../../models/User_Event.php';
require __DIR__ . '/../../models/Event.php';
require __DIR__ . '/../../models/Category.php';
require __DIR__ . '/../../config/init.php';


try {
    $title = "Calendrier des événements • Guide Ultime de Super Mario ";
    $errors = [];
    $script = 'calender.js';
    $css = "style.css";
    $categories = Category::getall();

} catch (\Throwable $th) {
    $errors = $th->getMessage();
    include __DIR__ . '/../../views/templates/header.php';
    include __DIR__ . '/../../views/templates/error.php';
    include __DIR__ . '/../../views/templates/footer.php';

}

include __DIR__ . '/../../views/templates/header.php';
include __DIR__ . '/../../views/events.php';
include __DIR__ . '/../../views/templates/footer.php';