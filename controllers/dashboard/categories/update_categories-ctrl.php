<?php

require __DIR__ . '/../../../models/Category.php';
require __DIR__ . '/../../../config/regex.php';
require_once __DIR__ . '/../../../config/init.php';


try {
    $errors = [];
    $title = 'Modifier la catégorie • DashBoard';
    $id_types = intval(filter_input(INPUT_GET, 'id_types', FILTER_SANITIZE_NUMBER_INT));
    $typesObj = Category::get($id_types);

    if ($_SERVER["REQUEST_METHOD"] == 'POST') {
        $type = filter_input(INPUT_POST, 'type', FILTER_SANITIZE_SPECIAL_CHARS);
        if (empty($type)) {
            $errors['type'] = 'Veuillez entrez une catégorie obligatoire';
        } else {
            $isOk = filter_var($type, FILTER_VALIDATE_REGEXP, array('options' => array('regexp' => REGEX_CATEGORY)));
            if (!$isOk) {
                $errors['type'] = 'Cette catégorie n\'est pas valide';
            }
        }
        if (empty($errors)) {
            $newType = new Category();
            $newType->set_type($type);
            $newType->set_id_types($id_types);
            $saved = $newType->update();
            if ($saved == true) {
                header('location: /controllers/dashboard/categories/list_categories-ctrl.php');
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
include __DIR__ . '/../../../views/dashboard/categories/update_categories.php';
include __DIR__ . '/../../../views/dashboard/templates/footer.php';
