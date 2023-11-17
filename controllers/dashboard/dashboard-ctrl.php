<?php 

require __DIR__ . '/../../models/User.php';
require_once __DIR__ . '/../../config/init.php';

try{
    $title = 'Accueil';
    $users = User::get_all();

    $id_user = intval(filter_input(INPUT_GET, 'id_user', FILTER_SANITIZE_NUMBER_INT));
    $user= User::get($id_user);

} catch (\Throwable $th){
    $errors = $th->getMessage();
    include __DIR__ . '/../../views/dashboard/templates/header.php';
    include __DIR__ . '/../../views/dashboard/templates/error.php';
    include __DIR__ . '/../../views/dashboard/templates/footer.php';
}

include __DIR__ . '/../../views/dashboard/templates/header.php';
include __DIR__ . '/../../views/dashboard/dashboard.php';
include __DIR__ . '/../../views/dashboard/templates/footer.php';
