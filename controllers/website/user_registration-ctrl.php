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

        $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_SPECIAL_CHARS);
        if (empty($username)) {
            $errors['username'] = "Veuillez entrez un pseudo obligatoire";
        } else {
            $isOk = filter_var($username, FILTER_VALIDATE_REGEXP, array('options' => array('regexp' => REGEX_USERNAME)));
            if (!$isOk) {
                $errors['username'] = "Certains caractéres ne sont pas autorisés";
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
                    $to = __DIR__ . '/../../public/uploads/profiles/'. $newProfil;
                    move_uploaded_file($from, $to);
                }
            } else {
                $newProfil = '/../../public/uploads/profiles/profil.png';
            }
        } catch (\Throwable $th) {
            $errors = $th->getMessage();
        }
        if (empty($errors)) {
            $newUser = new User();
            if (User::ifExists($username, $email)) {
                $errors['username'] = "Le pseudo existe déjà";
                $errors['email'] = "L'email existe déjà";
            } else {
                $newUser->set_username($username);
                $newUser->set_email($email);
                $newUser->set_password($password);
                $newUser->set_profile($newProfil);
                $userType = filter_input(INPUT_POST, 'role');
                $role = ($UserType === 1) ? 1 : 0;
                $newUser->set_role($role);
                $saved = $newUser->add();

                if (!empty($errors)) {
                    $errors['general'] = "Une erreur s'est produite lors de la vérification de l'existence du pseudo ou de l'email.";
                }
                if ($saved) {
                    $message = "Votre compte a bien été crée, vous pouvez vous connecter";
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
