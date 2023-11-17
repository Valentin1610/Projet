<main>
    <h2 class="text-center mt-4">Ajout d'une astuce</h2>
    <form method="post" enctype="multipart/form-data">
        <div class="align-items-center">
            <div class="col">
                <div class="form-group w-50 mx-auto text-center mt-4">
                    <label for="tip">Titre de l'astuce :*</label>
                    <input class="form-control" type="text" name="tip" id="tip">
                    <p><?= isset($errors['tip']) ? $errors['tip'] : "" ?></p>
                </div>
            </div>
            <div class="col">
                <div class="form-group w-50 mx-auto mt-5 text-center">
                    <label for="description_tip">Description de l'astuce :*</label>
                    <textarea class="form-control" name="description_tip" id="description_tip" cols="30" rows="5"></textarea>
                    <p><?=isset($errors['description_tip']) ? $errors['description_tip']  : "" ?></p>
                </div>
            </div>
        </div>
        <div class="form-group w-50 mx-auto mt-4 text-center">
            <label for="id_games">Nom du jeu : * </label>
            <select name="id_games" id="id_games">
                <option disabled selected>-- Sélectionnez un jeu --</option>
                <?php foreach ($games as $game) { ?>
                    <option value="<?= $game->id_games ?>"><?= $game->game ?></option>
                <?php } ?>
            </select>
            <p><?= isset($errors['id_games']) ? $errors['id_games'] : "" ?></p>
        </div>
        <p class="text-center mt-3">* : signifie que les champs sont obligatoires</p>
        <div class="text-center mt-4">
            <button type="submit" class="text-white btn btn-rounded bg-primary">Ajouter une astuce</button>
        </div>
    </form>
</main>