<?php

require __DIR__ . '/../../../models/Category.php';
require __DIR__ . '/../../../config/regex.php';

try {
    $errors = [];
    $title = "Ajouter une catégorie • DashBoard";


    if ($_SERVER["REQUEST_METHOD"] == 'POST') {
        $type = filter_input(INPUT_POST, 'type', FILTER_SANITIZE_SPECIAL_CHARS);
        if (empty($type)) {
            $errors['category'] = 'Veuillez entrez un nom de catégorie obligatoire';
        } else {
            $isOk = filter_var($type, FILTER_VALIDATE_REGEXP, array('options' => array('regexp' => REGEX_CATEGORY)));
            if (!$isOk) {
                $errors['category'] = "Cette catégorie n'est pas valide";
            }
        }
        if (empty($errors)) {
            $newType = new Category();
            $newType->set_type($type);
            $saved = $newType->new();
        }
    }
} catch (\Throwable $th) {
    $errors = $th->getMessage();

    include __DIR__ . '/../../../views/dashboard/templates/header.php';
    include __DIR__ . '/../../../views/dashboard/templates/error.php';
    include __DIR__ . '/../../../views/dashboard/templates/footer.php';
}

include __DIR__ . '/../../../views/dashboard/templates/header.php';
include __DIR__ . '/../../../views/dashboard/categories/new_categories.php';
include __DIR__ . '/../../../views/dashboard/templates/footer.php';
