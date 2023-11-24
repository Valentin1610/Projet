<main>
    <h2 class="text-center mt-4">Modifier le jeu</h2>
    <form method="post" enctype="multipart/form-data">
        <div class="col">
            <div class="form-group w-25 mx-auto text-center mt-4">
                <label for="id_types">Catégorie :*</label>
                <select class="form-control" name="id_types" id="id_types">
                    <option disabled selected>--Sélectionner la Catégorie--</option>
                    <?php foreach ($types as $type) { ?>
                        <option value="<?= $type->id_types ?>" selected><?= $type->type ?></option>
                    <?php } ?>
                </select>
                <p><?= isset($errors['id_types']) ? $errors['id_types'] : ""  ?></p>
            </div>
        </div>
        <div class="col">
            <div class="form-group w-25 mx-auto text-center mt-4">
                <label for="id_consoles">Console :*</label>
                <select class="form-control" name="id_consoles" id="id_consoles" required>
                    <option disabled selected>--Sélectionner la console du jeu--</option>
                    <?php foreach ($consoles as $console) { ?>
                        <option value="<?= $console->id_consoles ?>" selected><?= $console->console ?></option>
                    <?php } ?>
                </select>
                <p><?= isset($errors['id_consoles']) ? $errors['id_consoles'] : ""  ?></p>

            </div>
        </div>
        <div class="col">
            <div class="form-group w-25 mx-auto text-center mt-4">
                <label for="game">Nom du Jeu : *</label>
                <input value="<?= $games->game ?>" class="form-control" type="text" name="game" id="game">
                <p><?= isset($errors['game']) ? $errors['game'] : ""  ?></p>
            </div>
        </div>
        <div class="col">
            <div class="form-group w-50 mx-auto text-center mt-4">
                <label for="description">Description du Jeu*</label>
                <textarea class="form-control" name="description" id="description" cols="50" rows="5"><?= $games->description ?></textarea>
                <p><?= isset($errors['description']) ? $errors['description'] : ""  ?></p>
            </div>
        </div>
        </div>
        <div class="form-group text-center mt-4">
            <label for="picture">Image du jeu : </label>
            <img class="w-25" src="/public/uploads/games/<?= $games->picture ?>" alt="<?= $games->picture ?>">
            <input class="form-control w-50 mx-auto mt-4" type="file" name="picture" id="picture" accept="image/png, image/jpeg, image/jpg">
            <p><?= isset ($errors['picture']) ? $errors['picture'] : "" ?></p>
        </div>
        <p class="text-center mt-4">* : signifie que les champs sont obligatoires</p>
        <div class="form-group mt-4 text-center">
            <button type="submit" class="btn btn-primary">Ajouter un jeu</a>
        </div>
    </form>
</main>