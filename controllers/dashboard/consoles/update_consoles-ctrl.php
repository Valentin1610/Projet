<?php

require __DIR__  . '/../../../models/Console.php';
require_once __DIR__ . '/../../../config/regex.php';
require_once __DIR__ . '/../../../config/constants.php';
require_once __DIR__ . '/../../../config/init.php';

try {
    $errors = [];
    $title = 'Modifier la console • DashBoard';
    $id_consoles = intval(filter_input(INPUT_GET, 'id_consoles', FILTER_SANITIZE_NUMBER_INT));
    $consolesObj = Console::get($id_consoles);

    if($_SESSION['user']->role !== 1 ){
        header('location: /');
        die;
    }

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        $console = filter_input(INPUT_POST, 'console', FILTER_SANITIZE_SPECIAL_CHARS);
        if (empty($console)) {
            $errors['console'] = 'Veuillez entrez un nom de console obligatoire';
        } else {
            $isOk = filter_var($console, FILTER_VALIDATE_REGEXP, array('options' => array('regexp' => REGEX_CATEGORY)));
            if (!$isOk) {
                $errors['console'] = 'Ce nom de console n\'est pas valid';
            }
        }
        try {
            $picture = $_FILES['picture'];
            $newNameFile = "";
            if ($picture['error'] != 4) {

                if (!in_array($picture['type'], VALIDATE_EXTENSIONS)) {
                    throw new Exception("L'extension du fichier n'est pas valide");
                }
                if ($picture['size'] >= FILE_SIZE) {
                    throw new Exception("Fichier trop lourd");
                }
                if (empty($errors)) {
                    $extension = pathinfo($picture['name'], PATHINFO_EXTENSION);
                    $newNameFile = uniqid('img_') . '.' . $extension;
                    $from = $picture['tmp_name'];
                    $to = __DIR__ . '/../../../public/uploads/consoles/' . $newNameFile;
                    move_uploaded_file($from, $to);
                }
            }
        } catch (\Throwable $th) {
            $errors = $th->getMessage();
        }
        if (empty($errors)) {
            $newConsole = new Console();
            $newConsole->set_console($console);
            $newConsole->set_logo($newNameFile);
            $newConsole->set_id_consoles($id_consoles);
            $saved = $newConsole->update();
            if ($saved) {
                header('location: /controllers/dashboard/consoles/list_consoles-ctrl.php');
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
include __DIR__ . '/../../../views/dashboard/consoles/update_consoles.php';
include __DIR__ . '/../../../views/dashboard/templates/footer.php';
