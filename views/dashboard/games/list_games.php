<main>
    <h2 class="text-center fst-italic mt-4">Liste de tous les jeux</h2>
    <div class="container-fluid text-center mt-4">
        <div class="row">
            <div class="col">
                <table class="table-responsive">
                    <thead>
                        <tr>
                            <th>Catégorie</th>
                            <th>Console</th>
                            <th>Nom</th>
                            <th>Description</th>
                            <th>Image</th>
                            <th>Modifier</th>
                            <th>Suppprimer</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($games as $game) { ?>
                            <tr>
                                <td><?= $game->type ?></td>
                                <td><?= $game->console ?></td>
                                <td><?= $game->game ?></td>
                                <td><?= $game->description ?></td>
                                <td><?php if (isset($game->picture)) { ?>
                                        <a href="/public/uploads/games/<?= $game->picture ?>" target="_blank"><i class="fa-regular fa-image"></i></a>
                                    <?php } ?>
                                </td>
                                <td>
                                    <a target="_blank" href="/controllers/dashboard/games/update_games-ctrl.php?id_games=<?= $game->id_games ?>">
                                        <i class="fa-solid fa-wrench"></i>
                                    </a>
                                </td>
                                <td>
                                    <a href="/controllers/dashboard/games/delete_games-ctrl.php?id_games=<?= $game->id_games ?>">
                                        <i class="fa-solid fa-trash text-danger"></i>
                                    </a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <nav class="text-center mt-5">
        <ul class="pagination justify-content-center">
            <?php $disable = ($page == 1) ? "disabled" : ""; ?>
            <li class="page-item <?= $disable ?>">
                <a class="page-link" href="?page=<?= $page - 1 ?>">Précédent</a>
            </li>
            <?php for ($currentPage = 1; $currentPage <= $nbrPages; $currentPage++) {
                $active = ($currentPage == $page) ? "active" : "";
            ?>
                <li class="page-item <?= $active ?>">
                    <a class="page-link" href="?page=<?= $currentPage ?>"><?= $currentPage ?></a>
                </li>
            <?php } ?>

            <?php $disable = ($page == $nbrPages) ? 'disabled' : ""; ?>
            <li class='page-item <?= $disable ?>'>
                <a class="page-link" href="?page=<?= $page + 1 ?>">Suivant</a>
            </li>
        </ul>
    </nav>
</main>