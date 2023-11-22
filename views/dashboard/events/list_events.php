<main>
    <h2 class="mt-4 text-center">Liste de touts les événements</h2>
    <table class="table mt-4">
        <thead>
            <tr>
                <th>Nom de l'événement</th>
                <th>Date de l'événement</th>
                <th>Modifier</th>
                <th>Supprimer</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($events as $event){?>
            <tr>
                <td><?= $event->event ?></td>
                <td><?= formatDateToFrench($event->inaugurate)?></td>
                <td>
                    <a href="/controllers/dashboard/events/update_events-ctrl.php?id_events=<?= $event->id_events?>">
                        <i class="fa-solid fa-wrench"></i>
                    </a>
                </td>
                <td>
                    <a href="/controllers/dashboard/events/delete_events-ctrl.php?id_events=<?= $event->id_events?>">
                        <i class="fa-solid fa-trash text-danger"></i>
                    </a>
                </td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
</main>