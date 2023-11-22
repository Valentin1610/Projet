<?php

require_once __DIR__ . '/../../../models/Tip.php';
require_once __DIR__ . '/../../../models/Game.php';
require_once __DIR__ . '/../../../models/User.php';
require_once __DIR__ . '/../../../config/regex.php';
require_once __DIR__ . '/../../../config/constants.php';
require_once __DIR__ . '/../../../config/init.php';


try {
    $errors = [];
    $title = "Ajout d'une nouvelle astuce";
    $games = Game::get_all_games();

    if($_SESSION['user']->role !== 1 ){
        header('location: /');
        die;
    }

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        $tip = filter_input(INPUT_POST, 'tip');
        if (empty($tip)) {
            $errors['tip'] = 'Veuillez entrez un nom d\'astuce obligatoire';
        } else {
            $isOk = filter_var($tip, FILTER_VALIDATE_REGEXP, array('options' => array('regexp' => REGEX_CATEGORY)));
            if (!$isOk) {
                $errors['tip'] = 'Ce nom d\'astuce n\'est pas valide';
            }
        }

        $description_tip = filter_input(INPUT_POST, 'description_tip', FILTER_SANITIZE_SPECIAL_CHARS);
        if (empty($description_tip)) {
            $errors['description_tip'] = 'Veuillez entrez une description de l\'astuce en question';
        } else {
            if (strlen($description_tip) < 20 || strlen($description_tip) > 500) {
                $errors['description_tip'] = 'Certains caractéres ne sont pas valides';
            }
        }

        $id_users = intval(filter_input(INPUT_POST, 'id_user', FILTER_SANITIZE_NUMBER_INT));

        $id_games = intval(filter_input(INPUT_POST, 'id_games', FILTER_SANITIZE_NUMBER_INT));
        if (!$id_games) {
            $errors['id_games'] = "Veuillez sélectionnez un jeu";
        } else {
            if (empty($id_games)) {
                $errors['id_games'] = 'Ce jeu n\'existe pas';
            }
        }

        if (empty($errors)) {
            $newTip = new Tip();
            $newTip->set_tip($tip);
            $newTip->set_description_tip($description_tip);
            $newTip->set_id_users($id_user);
            $newTip->set_id_games($id_games);
            $saved = $newTip->add();

            if ($saved) {
                header('location: /controllers/dashboard/tips/list_tips-ctrl.php');
                die;
            }
        }
    }
} catch (\Throwable $th) {
    $errors = $th->getMessage();

    include __DIR__ . '/../../../views/dashboard/templates/header.php';
    include __DIR__ . '/../../../views/dashboard/templates/error.php';
    include __DIR__ . '/../../../views/dashboard/templates/footer.php';
}

include __DIR__ . '/../../../views/dashboard/templates/header.php';
include __DIR__ . '/../../../views/dashboard/tips/new-tips.php';
include __DIR__ . '/../../../views/dashboard/templates/footer.php';
