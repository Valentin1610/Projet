<?php

require_once __DIR__ . '/../../config/init.php';
require_once __DIR__ . '/../../models/Category.php';
require __DIR__ . '/../../models/User.php';
require_once __DIR__ . '/../../models/Tip.php';
require_once __DIR__ . '/../../models/User_Tip.php';

if (!$_SESSION['username']) {
    header('location: ');
}
try {
    $errors = [];
    $css = 'style.css';
    $categories = Category::getall();
    $title = 'Modifier votre profil • Guide Ultime de Super Mario';

    $id_user = intval(filter_input(INPUT_GET, 'id_user', FILTER_SANITIZE_NUMBER_INT));
    $users = User::get($id_user);
} catch (\Throwable $th) {
    $errors = $th->getMessage();

    include __DIR__ . '/../../views/templates/header.php';
    include __DIR__ . '/../../views/templates/error.php';
    include __DIR__ . '/../../views/templates/footer.php';

}
include __DIR__ . '/../../views/templates/header.php';
include __DIR__ . '/../../views/user_profil.php';
include __DIR__ . '/../../views/templates/footer.php';