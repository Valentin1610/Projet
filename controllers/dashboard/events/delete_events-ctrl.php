<?php 

require_once __DIR__ . '/../../../models/Event.php';
require_once __DIR__ . '/../../../config/init.php';


try {
    $errors = [];
    $id_events = intval(filter_input(INPUT_GET, 'id_events', FILTER_SANITIZE_NUMBER_INT));
    $ifDelete = Event::delete($id_events);
    header('location: /controllers/dashboard/events/list_events-ctrl.php?delete='. $ifDelete);
    die;

} catch (\Throwable $th) {
    $errors = $th->getMessage();

    include __DIR__ . '/../../../views/dashboard/templates/header.php';
    include __DIR__ . '/../../../views/dashboard/templates/error.php';
    include __DIR__ . '/../../../views/dashboard/templates/footer.php';


}