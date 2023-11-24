<?php

require_once __DIR__ . '/../../models/Category.php';
require_once __DIR__ . '/../../config/init.php';

try {
    $errors = [];
    $title = "Votre compte a bien été crée • Guide Ultime de Super Mario";
    $description = '';
    $css = "confirm.css";
} catch (\Throwable $th) {
    $errors = $th->getMessage();

    include __DIR__ . '/../../views/templates/error.php';
}
include __DIR__ . '/../../views/templates/header.php';
include __DIR__ . '/../../views/confirm.php';
