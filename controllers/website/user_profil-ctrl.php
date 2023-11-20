<?php

require_once __DIR__ . '/../../config/init.php';
require_once __DIR__ . '/../../models/Category.php';
require_once __DIR__ . '/../../models/Game.php';
require_once __DIR__ . '/../../models/User.php';
require_once __DIR__ . '/../../models/Tip.php';
require_once __DIR__ . '/../../models/User_Tip.php';

try {
    $errors = [];
    $css = 'style.css';
    $categories = Category::getall();
    $title = 'Modifier votre profil • Guide Ultime de Super Mario';

    // Appelle de la méthode getFav() à partir de la classe User_Tip stockée dasn une variable
    $favs = User_Tip::getFav();

} catch (\Throwable $th) {
    $errors = $th->getMessage();

    include __DIR__ . '/../../views/templates/header.php';
    include __DIR__ . '/../../views/templates/error.php';
    include __DIR__ . '/../../views/templates/footer.php';

}
include __DIR__ . '/../../views/templates/header.php';
include __DIR__ . '/../../views/user_profil.php';
include __DIR__ . '/../../views/templates/footer.php';