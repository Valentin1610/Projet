<?php

require_once __DIR__ . '/../../models/User.php';
require_once __DIR__ . '/../../models/Category.php';
require __DIR__ . '/../../config/init.php';


try {
    $errors = [];
    $title = "Se Connecter • Guide Ultime de Super Mario";
    $css = 'connexion.css';
    $categories = Category::getall();
    $script = 'script.js';

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_SPECIAL_CHARS);
        if (empty($username)) {
            $errors['user'] = "Veuillez entrez un username";
        }

        $password = filter_input(INPUT_POST, 'password', FILTER_DEFAULT);
        if (empty($password)) {
            $errors['password'] = "Veuillez entrez un mot de passe";
        } elseif (strlen($password) < 12) {
            $errors['password'] = "Veuillez entrez un mot de passe avec au moins 12 caractéres";
        }

        if (empty($errors)) {
            $username = User::getByUsername($username);
            try {
                if (!$username) {
                    throw new Exception("Le pseudo n'exsite pas", 1);
                }
                $isOk = password_verify($password, $username->password);
                if (!$isOk) {
                    throw new Exception("Mot de passe incorrect", 2);
                }
                unset($username->password);
                $_SESSION['user'] = $username;
                $_SESSION['role'] = 0;
                header('location: /controllers/website/home-ctrl.php');
                die;
            } catch (\Throwable $th) {
                $errors = $th->getMessage();
            }
        }
    }
} catch (\Throwable $th) {
    $errors[] = $th->getMessage();

    include __DIR__ . '/../../views/templates/header.php';
    include __DIR__ . '/../../views/templates/error.php';
    include __DIR__ . '/../../views/templates/footer.php';
    die;
}

include __DIR__ . '/../../views/templates/header.php';
include __DIR__ . '/../../views/user_connect.php';
include __DIR__ . '/../../views/templates/footer.php';
