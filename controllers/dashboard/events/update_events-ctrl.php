<?php

require __DIR__ . '/../../../models/Event.php';
require __DIR__ . '/../../../config/regex.php';
require_once __DIR__ . '/../../../config/init.php';

try {
    $errors = [];
    $title = "Modifier l'événement • DashBoard";
    $id_events = intval(filter_input(INPUT_GET, 'id_events', FILTER_SANITIZE_NUMBER_INT));
    $event = Event::get($id_events);


    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        $event = filter_input(INPUT_POST, 'event', FILTER_SANITIZE_SPECIAL_CHARS);
        if (empty($event)) {
            $errors['event'] = "Veuillez entrez le nom de l'événement";
        } else {
            $isOk = filter_var($event, FILTER_VALIDATE_REGEXP, array('options' => array('regexp' => REGEX_CATEGORY)));
            if (!$isOk) {
                $errors['event'] = "Certains caractéres ne sont pas autorisés";
            }
        }

        $inaugurate = filter_input(INPUT_POST, 'inaugurate', FILTER_SANITIZE_SPECIAL_CHARS);
        if (empty($inaugurate)) {
            $errors['inaugurate'] = "Veuillez entrez une date de l'événement";
        } else {
            $timedate = new DateTime($inaugurate);
            $timestamp_date = $timedate->getTimestamp();
            $timestamp_currentdate = $timedate->getTimestamp();
            if ($timestamp_date < $timestamp_currentdate) {
                $errors['inaugurate'] = "Veuillez entrez une date passé";
            }
        }
        if (empty($errors)) {
            $newEvent = new Event();
            $newEvent->set_event($event);
            $newEvent->set_inaugurate($inaugurate);
            $newEvent->set_id_events($id_events);
            $saved = $newEvent->update();

            if ($saved) {
                header('location: /controllers/dashboard/events/list_events-ctrl.php');
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
include __DIR__ . '/../../../views/dashboard/events/update_events.php';
include __DIR__ . '/../../../views/dashboard/templates/footer.php';
