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
    $description = "Vous pouvez modifier votre profil et consulter les astuces que vous avez cochées sur le site.";

    if(empty($_SESSION['user'])){
        header('location: /');
        die;
    }

    // Appelle de la méthode getFav() à partir de la classe User_Tip stockée dasn une variable
    $id_user = intval(filter_input(INPUT_GET, 'id_user', FILTER_SANITIZE_NUMBER_INT));
    $favs = User_Tip::getFav($id_user);

    if($_SERVER["REQUEST_METHOD"] == 'POST'){

        $user = filter_input(INPUT_POST, 'user', FILTER_SANITIZE_SPECIAL_CHARS);
        if(empty($user)){
            $errors['user'] = "Veuillez entrez un pseudo";
        } else{
            $isOk = intval($user, FILTER_VALIDATE_REGEXP, array('options' => array('regexp' => REGEX_user)));
            if(!$isOk){
                $errors['user'] = "Veuillez entrez un pseudo valide";
            }
        }

        $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
        if(empty($email)){
            $errors['user'] = 'Veuillez entrez un email';
        } else{
            $isOk = intval($email, FILTER_VALIDATE_EMAIL);
            if(!$isOk){
                $errors ['user'] = "Veuillez entrez une adresse mail valide";
            }
        }
    }

} catch (\Throwable $th) {
    $errors = $th->getMessage();

    include __DIR__ . '/../../views/templates/header.php';
    include __DIR__ . '/../../views/templates/error.php';
    include __DIR__ . '/../../views/templates/footer.php';

}
include __DIR__ . '/../../views/templates/header.php';
include __DIR__ . '/../../views/user_profil.php';
include __DIR__ . '/../../views/templates/footer.php';