<?php

require __DIR__ . '/../../../models/Category.php';
require_once __DIR__ . '/../../../config/init.php';


try {
    $title = " Liste de toutes les catégories • DashBoard ";
    $types = Category::getall();
} catch (\Throwable $th) {
    $errors = $th->getMessage();

    include __DIR__ . '/../../../views/dashboard/templates/header.php';
    include __DIR__ . '/../../../views/dashboard/templates/error.php';
    include __DIR__ . '/../../../views/dashboard/templates/footer.php';
}

include __DIR__ . '/../../../views/dashboard/templates/header.php';
include __DIR__ . '/../../../views/dashboard/categories/list_categories.php';
include __DIR__ . '/../../../views/dashboard/templates/footer.php';
