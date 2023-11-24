<?php

require_once __DIR__ . '/../../models/Category.php';
require_once __DIR__ . '/../../config/init.php';

try {
    $errors = [];
    $title = 'Mentions légales • Guide Ultime de Super Mario';
    $css = 'style.css';
    $description = "Voici les mentions légales du site.";
    $categories = Category::getall();
} catch (\Throwable $th) {
    $errors = $th->getMessage();

    include __DIR__ . '/../../views/templates/header.php';
    include __DIR__ . '/../../views/templates/error.php';
    include __DIR__ . '/../../views/templates/footer.php';
}

include __DIR__ . '/../../views/templates/header.php';
include __DIR__ . '/../../views/legal_notice.php';
include __DIR__ . '/../../views/templates/footer.php';
