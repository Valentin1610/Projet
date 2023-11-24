<?php

require_once __DIR__ . '/../../models/User.php';
require_once __DIR__ . '/../../models/Category.php';
require __DIR__ . '/../../config/init.php';


try {
    $errors = [];
    $title = "Se Connecter • Guide Ultime de Super Mario";
    $css = 'connexion.css';
    $categories = Category::getall();
    $script = "script.js";
    $description = "Vous pouvez vous connecter à ce site avec votre pseudo et votre mot de passe associé";

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $user = filter_input(INPUT_POST, 'user', FILTER_SANITIZE_SPECIAL_CHARS);
        if (empty($user)) {
            $errors['user'] = "Veuillez entrez un user";
        }

        $password = filter_input(INPUT_POST, 'password', FILTER_DEFAULT);
        if (empty($password)) {
            $errors['password'] = "Veuillez entrez un mot de passe";
        } elseif (strlen($password) < 12) {
            $errors['password'] = "Veuillez entrez un mot de passe valide";
        }

        if (empty($errors)) {
            $user = User::getByuser($user);
            try {
                if (!$user) {
                    throw new Exception("Le pseudo n'exsite pas", 1);
                }
                $isOk = password_verify($password, $user->password);
                if (!$isOk) {
                    throw new Exception("Mot de passe incorrect", 2);
                }
                unset($user->password);
                $_SESSION['user'] = $user;
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
