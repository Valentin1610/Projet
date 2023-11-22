<?php

require_once __DIR__ . '/../../models/User.php';
require_once __DIR__ . '/../../config/regex.php';
require_once __DIR__ . '/../../models/Category.php';
require_once __DIR__ . '/../../config/init.php';

try {
    $errors = [];
    $css = "style.css";
    $title = "S'inscrire • Guide Ultime de Super Mario";
    $categories = Category::getall();
    $script = 'registration.js';

    $id_users = intval(filter_input(INPUT_GET, 'id_users', FILTER_SANITIZE_NUMBER_INT));
    $role = intval(filter_input(INPUT_POST, 'role', FILTER_SANITIZE_NUMBER_INT));

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        // Nettoyage des données envoyées par l'utilisateur 

        $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_SPECIAL_CHARS);
        if (empty($username)) {
            $errors['user'] = "Veuillez entrez un pseudo obligatoire";
        } else {
            $isOk = filter_var($username, FILTER_VALIDATE_REGEXP, array('options' => array('regexp' => REGEX_USERNAME)));
            if (!$isOk) {
                $errors['user'] = "Certains caractéres ne sont pas autorisés";
            }
        }
        $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
        if (empty($email)) {
            $errors['email'] = "Veuillez entrez une adresse mail";
        } else {
            $isOk = filter_var($email, FILTER_VALIDATE_EMAIL);
            if (!$isOk) {
                $errors['email'] = "Cette adresse mail n'est pas correct";
            }
        }
        $password = filter_input(INPUT_POST, 'password');
        if (empty($password)) {
            $errors['password'] = "Veuillez entrez un mot de passe";
        } elseif (strlen($password) < 12) {
            $errors['password'] = "Veuillez entrez un mot de passe avec au moins 12 caractéres";
        }
        $passwordVerif = filter_input(INPUT_POST, 'passwordVerif');
        if (empty($passwordVerif)) {
            $errors['passwordVerif'] = "Veuillez entrez le mot de passe";
        }
        try {
            $newProfil = "";
            $profil = $_FILES['profil'];
            if ($profil['error'] == UPLOAD_ERR_OK) {
                if (!in_array($profil['type'], VALIDATE_EXTENSIONS)) {
                    throw new Exception("Extension non valide");
                }
                if ($profil['size'] >= FILE_SIZE) {
                    throw new Exception("Fichier trop lourd");
                }
                if (empty($errors)) {
                    $extension = pathinfo($profil['name'], PATHINFO_EXTENSION);
                    $newProfil = uniqid('img_') . '.' . $extension;
                    $from = $profil['tmp_name'];
                    $to = __DIR__ . '/../../public/uploads/profiles/' . $newProfil;
                    move_uploaded_file($from, $to);
                }
            } else {
                $newProfil = '/../../public/uploads/profiles/profil.png';
            }
        } catch (\Throwable $th) {
            $errors = $th->getMessage();
        }
        if (empty($errors)) {
            // Attribution du rôle utilisateur lors de l'inscription
            $role = 0;
            // Créeation d'un nouvel objet de la class User
            $newUser = new User();
            // Vérification de la disponibilité du pseudo et de l'email
            if (User::ifExists($username, $email)) {
                $errors['user'] = "Le pseudo et/ou l'email existe déjà";
            } {
                // Si il n'y a pas d'erreur, on hydrate l'objet
                $newUser->set_username($username);
                $newUser->set_email($email);
                $newUser->set_password($password);
                $newUser->set_profile($newProfil);
                $newUser->set_role($role);
                // Enregistrement de l'utilisateur dans la base de données
                $saved = $newUser->add();


                if ($saved) {
                    header('location: /controllers/website/user_registration-ctrl.php');
                    die;
                }
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
include __DIR__ . '/../../views/user_registration.php';
include __DIR__ . '/../../views/templates/footer.php';
