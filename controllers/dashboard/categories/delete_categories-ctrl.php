<?php 

require __DIR__ . '/../../../models/Category.php';

try {
    $errors = [];
    $id_types = filter_input(INPUT_GET, 'id_types',  FILTER_SANITIZE_NUMBER_INT); 
    $ifDelete = Category::delete($id_types);
    header('location: /controllers/dashboard/categories/list_categories-ctrl.php?delete='.$ifDelete);
    die;

} catch (\Throwable $th) {
    $errors = $th->getMessage();

    include __DIR__ . '/../../../views/dashboard/templates/header.php';
    include __DIR__ . '/../../../views/dashboard/templates/error.php';
    include __DIR__ . '/../../../views/dashboard/templates/footer.php';

}
