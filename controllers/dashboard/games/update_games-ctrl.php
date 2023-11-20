<?php

require_once __DIR__ . '/../../../models/Category.php';
require_once __DIR__ . '/../../../models/Console.php';
require_once __DIR__ . '/../../../models/Game.php';
require_once __DIR__ . '/../../../config/constants.php';
require_once __DIR__ . '/../../../config/regex.php';

try {
    $errors = [];
    $title = "Modifier le Jeu • Dashboard";
    $types = Category::getall();
    $consoles = Console::getAll();
    $id_games = intval(filter_input(INPUT_GET, 'id_games', FILTER_SANITIZE_NUMBER_INT));
    $games = Game::get($id_games);

    // Les données de l'utilisateur sont transmis en post afin de récupérer les données

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        // Nettoyage et validation des données

        $id_types = intval(filter_input(INPUT_POST, 'id_types', FILTER_SANITIZE_NUMBER_INT));
        if (!$id_types) {
            $errors['id_types'] = 'Veuillez entrez une catégorie';
        } else {
            if (empty($id_types)) {
                $errors['id_types'] = 'Cette catégorie n\'existe pas  ';
            }
        }

        $id_consoles = intval(filter_input(INPUT_POST, 'id_consoles', FILTER_SANITIZE_NUMBER_INT));
        if (!$id_consoles) {
            $errors['id_consoles'] = 'Veuillez entrez une console';
        } else {
            if (empty($id_consoles)) {
                $errors['id_consoles']  = 'Cette console n\'exsite pas';
            }
        }

        $game = filter_input(INPUT_POST, 'game', FILTER_SANITIZE_SPECIAL_CHARS);
        if (empty($game)) {
            $errors['game'] = 'Veuillez entrez un nom de jeu obligatoire';
        } else {
            $isOk = filter_var($game, FILTER_VALIDATE_REGEXP, array('options' => array('regexp' => REGEX_NAME_GAME)));
            if (!$isOk) {
                $errors['game'] = 'Ce nom de jeu n\'est pas valide';
            }
        }

        $description = filter_input(INPUT_POST, 'description', FILTER_SANITIZE_SPECIAL_CHARS);
        if (empty($description)) {
            $errors['description'] = 'Veuillez entrez obligatoirement une description';
        } else {
            if (strlen($description) < 20 || strlen($description) > 450) {
                $errors['description'] = 'Entrez un la description compris entre 20 et 450 caractéres';
            }
        }
        // Vérification du fichier 

        $picture = $_FILES['picture'];
        $newNameFile = NULL;
        if ($picture['error'] != 4) {
            try {
                if ($picture['error'] != 0) {
                    throw new Exception("Fichier non envoyé");
                }
                if (!in_array($picture['type'], VALIDATE_EXTENSIONS)) {
                    throw new Exception("Ce format de fichier n'est pas autorisé");
                }
                if ($picture['size'] >= FILE_SIZE) {
                    throw new Exception("Ce fichier est trop lourd");
                }
                $extension = pathinfo($picture['name'], PATHINFO_EXTENSION);
                $newNameFile = uniqid('img_') . '.' . $extension;
                $from = $picture['tmp_name'];
                $to = __DIR__ . '/../../../public/uploads/games/' . $newNameFile;
                move_uploaded_file($from, $to);
            } catch (\Throwable $th) {
                $errors = $th->getMessage();
            }
        }
        if (empty($errors)) {
            // Création d'un nouvel objet
            $newGame = new Game;
            // Hydratation de l'objet 
            $newGame->set_id_games($id_games);
            $newGame->set_game($game);
            $newGame->set_description($description);
            $newGame->set_picture($newNameFile);
            $newGame->set_id_types($id_types);
            $newGame->set_id_consoles($id_consoles);
            // Appel de la méthode pour mettre à jour le jeu
            $saved = $newGame->update_game();
            // Si $saved est vrai alors on redirige vers la liste des jeux
            if ($saved) {
                header('location: /controllers/dashboard/games/list_games-ctrl.php');
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
include __DIR__ . '/../../../views/dashboard/games/update_games.php';
include __DIR__ . '/../../../views/dashboard/templates/footer.php';
