<h2 class="text-center mt-4">Liste de toutes les catégories</h2>
<div class="container-fluid text-center mt-4">
    <div class="row justify-content-center">
        <table class="table table-striped w-75">
            <thead>
                <tr class="p-4">
                    <th>ID</th>
                    <th>Nom</th>
                    <th>Modifier</th>
                    <th>Supprimer</th>
                </tr>
            </thead>
            <?php foreach ($types as $type) { ?>
                <tbody>
                    <tr>
                        <td>
                            <?= $type->id_types ?> 
                        </td>
                        <td>
                            <?= $type->type ?>
                        </td>
                        <td>
                            <a href="/controllers/dashboard/categories/update_categories-ctrl.php?id_types=<?= $type->id_types ?>">
                                <i class="fa-solid fa-wrench"></i>
                            </a>
                        </td>
                        <td>
                            <a href="">
                                <i class="fa-solid fa-trash text-danger"></i>
                            </a>
                        </td>
                    </tr>
                </tbody>
            <?php } ?>
        </table>
    </div>
</div>
<div class="text-center">
    <a class="text-decoration-none rounded text-danger" href="/controllers/dashboard/categories/new_categories-ctrl.php">Ajouter une catégorie</a>
</div>