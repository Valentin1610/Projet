<h2 class="text-center mt-4">Liste de toutes les consoles de Jeu</h2>
<div class="container-fluid text-center mt-4">
    <div class="row justify-content-center">
        <table class="table table-striped w-75">
            <thead>
                <tr class="p-4">
                    <th>Nom</th>
                    <th>Image</th>
                    <th>Modifier</th>
                    <th>Supprimer</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($consoles as $console) { ?>
                    <tr>
                        <td><?= $console->console ?></td>
                        <td>
                            <a target="_blank" href="/public/uploads/consoles/<?= $console->logo ?>">
                                <i class="fa-regular fa-image text-black"></i>
                            </a>
                        </td>
                        <td>
                            <a href="/controllers/dashboard/consoles/update_consoles-ctrl.php?id_consoles=<?= $console->id_consoles ?>">
                                <i class="fa-solid fa-wrench"></i>
                            </a>
                        </td>
                        <td>
                            <a href="/controllers/dashboard/consoles/delete_consoles-ctrl.php?id_consoles=<?= $console->id_consoles ?>">
                                <i class="fa-solid fa-trash text-danger"></i>
                            </a>
                        </td>
                    <?php } ?>
                    </tr>
            </tbody>
        </table>
    </div>
</div>