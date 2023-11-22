<?php

require_once __DIR__ . '/../../models/Category.php';
require_once __DIR__ . '/../../models/Game.php';
require_once __DIR__ . '/../../models/Tip.php';
require_once __DIR__ . '/../../models/User.php';
require_once __DIR__ . '/../../models/User_Tip.php';
require __DIR__ . '/../../config/init.php';


try {
    $errors = [];
    $title = "Liste des astuces • Guide Ultime de Super Mario";
    $css = "style.css";

    $id_types = intval(filter_input(INPUT_GET, 'id_types', FILTER_SANITIZE_NUMBER_INT));
    $types = Category::get($id_types);

    $id_games = intval(filter_input(INPUT_GET, 'id_games', FILTER_SANITIZE_NUMBER_INT));
    $games = Game::get($id_games);
    
    $users = "";
    if(isset($_SESSION['user']) && !empty($_SESSION['user']->id_user)){
        $id_user = $_SESSION['user']->id_user;
        $users = User::get($id_user);
    }  
        

    $categories = Category::getall();

    $id_tips = intval(filter_input(INPUT_GET, 'id_tips', FILTER_SANITIZE_NUMBER_INT));
    $tips = Tip::get_all_tips($id_games);

    // Les données de l'utilisateur sont transmis en post afin de récupérer les données

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $selected_tips = $_POST['selected_tips'];

        // Enregistrez les astuces sélectionnées en base de données
        foreach ($selected_tips as $id_tips) {
            $user_tip = new User_Tip();
            $user_tip->insert($id_user, $id_tips);
        }
        // Redirigez l'utilisateur vers la page list_tips.php après l'enregistrement
        header('location: /controllers/website/user_profil-ctrl.php?id_user='. $id_user);
        die;
    }
} catch (\Throwable $th) {
    $errors = $th->getMessage();

    include __DIR__ . '/../../views/templates/header.php';
    include __DIR__ . '/../../views/templates/error.php';
    include __DIR__ . '/../../views/templates/footer.php';
}

include __DIR__ . '/../../views/templates/header.php';
include __DIR__ . '/../../views/list_tips.php';
include __DIR__ . '/../../views/templates/footer.php';
