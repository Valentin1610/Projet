<main>
    <h2 class="mt-3 text-center">Liste de toutes les astuces</h2>
    <table class="table mt-3 text-center">
        <thead>
            <tr class="text-center">
                <th>Nom du Jeu</th>
                <th>Titre de l'astuce</th>
                <th>Description de l'astuce</th>
                <th>Modifier</th>
                <th>Supprimer</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($tips as $tip) { ?>
                <tr>
                    <td><?= $tip->game ?></td>
                    <td><?= $tip->tip ?></td>
                    <td><?= $tip->description_tip ?></td>
                    <td>
                        <a href="/controllers/dashboard/tips/update_tips-ctrl.php?id_tips=<?= $tip->id_tips?>">
                            <i class="fa-solid fa-wrench"></i>
                        </a>
                    </td>
                    <td>
                        <a href="/controllers/dashboard/tips/delete_tips-ctrl.php?id_tips=<?=$tip->id_tips?>">
                            <i class="fa-solid fa-trash text-danger"></i>
                        </a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
    <nav class="text-center mt-4">
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
            <?php $disable = ($page == $nbrPages) ? 'disabled' : "" ?>
            <li class="page-item <?= $disable ?>">
                <a class="page-link" href="?page=<?= $page + 1?>">Suivant</a>
            </li>
        </ul>
    </nav>
</main>