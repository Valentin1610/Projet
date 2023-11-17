<?php

require __DIR__ . '/../../../models/Event.php';

try {
    $errors = [];
    $title = "Liste des événements • DashBoard";
    $events = Event::get_all();
} catch (\Throwable $th) {
    $errors = $th->getMessage();
    include __DIR__ . '/../../../views/dashboard/templates/header.php';
    include __DIR__ . '/../../../views/dashboard/templates/error.php';
    include __DIR__ . '/../../../views/dashboard/templates/footer.php';
}

include __DIR__ . '/../../../views/dashboard/templates/header.php';
include __DIR__ . '/../../../views/dashboard/events/list_events.php';
include __DIR__ . '/../../../views/dashboard/templates/footer.php';
