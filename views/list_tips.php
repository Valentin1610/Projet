<main>
    <div>
        <div class="p-3 text-center">
            <p class="text-white">
                <img class="captaintoad" src="/public/assets/img/captaintoad.png" alt="captaintoad">
                Vous êtes dans : <a href="/controllers/website/home-ctrl.php" target="_blank">Accueil</a> >> <a href="/controllers/website/list_games-ctrl.php?id_types=<?= $types->id_types ?>">Les Jeux <?= $types->type ?> </a> >> <?= $games->game ?>
            </p>
        </div>
    </div>
    <h2 class="text-center text-white mt-2"><?= $games->game ?></h2>
    <p class="text-center text-white mt-4"><?= $games->description ?></p>
    <form method="post" enctype="multipart/form-data">
        <table class="table w-75 text-center mx-auto mt-5">
            <thead>
                <tr>
                    <th>Titre de l'astuce</th>
                    <th>Description de l'astuce</th>
                    <th>Case à cocher</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($tips as $tip) { ?>
                    <tr>
                        <td><?= $tip->tip ?></td>
                        <td><?= $tip->description_tip ?></td>
                        <td>
                            <?php if (isset($_SESSION['user'])) { ?>
                                <input type="checkbox" name="selected_tips[]" id="validate<?= $tip->id_tips ?>" value="<?= $tip->id_tips ?>">
                            <?php } else { ?>
                                <p>Veuillez vous connecter</p>
                            <?php } ?>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
        <div class="text-center">
            <?php if (isset($_SESSION['user'])) { ?>
                <button class="bg-primary" type="submit">Enregistrer</button>
            <?php } ?>
        </div>
    </form>
</main>