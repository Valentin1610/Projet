<?php

require __DIR__ . '/../../../models/Event.php';
require __DIR__ . '/../../../config/regex.php';

try {
    $errors = [];
    $title = "Modifier l'événement • DashBoard";
    $dateTime = new DateTime();
    $dateTime->format('d-m-y H-i');

    if($_SERVER['REQUEST_METHOD'] == 'POST'){

        $event = filter_input(INPUT_POST, 'event', FILTER_SANITIZE_SPECIAL_CHARS);
        if(empty($event)){
            $errors['event'] = "Veuillez entrez le nom de l'événement";
        } else{
            $isOk = filter_var($event, FILTER_VALIDATE_REGEXP, array('options' => array('regexp' => REGEX_CATEGORY )));
            if(!$isOk){
                $errors['event'] = "Certains caractéres ne sont pas autorisés";
            }
        }

        $inaugurate = filter_input(INPUT_POST, 'inaugurate', FILTER_SANITIZE_SPECIAL_CHARS);
        if(empty($inaugurate)){
            $errors['inaugurate'] = "Veuillez entrez une date de l'événement";
        }

        $friend_code = filter_input(INPUT_POST, 'friend_code', FILTER_SANITIZE_SPECIAL_CHARS);
        if(empty($friend_code)){
            $errors['friend_code'] = "Veuillez entrez un code-ami";
        } else{
            $isOk = filter_var($friend_code, FILTER_VALIDATE_REGEXP, array('options' => array('regexp' => REGEX_FRIEND_CODE )));
            if(!$isOk){
                $errors['friend_code'] = "Ce n'est pas le bon format. Respectez ce format : SW-XXX-XXX-XXX";
            }
        }
        if(empty($errors)){
            $newEvent = new Event();
            $newEvent->set_event($event);
            $newEvent->set_inaugurate($inaugurate);
            $newEvent->set_friend_code($friend_code);
            $saved = $newEvent->update();

            if($saved){
                header('location: controllers/events/list_events-ctrl.php');
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
