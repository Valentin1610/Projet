<main>
    <h2 class="text-center mt-4">Ajouter un jeu</h2>
    <form method="post" enctype="multipart/form-data">
        <div class="col">
            <div class="form-group w-25 mx-auto text-center mt-4">
                <label for="id_types">Catégorie :*</label>
                <select class="form-control" name="id_types" id="id_types">
                    <option disabled selected>--Sélectionnez la Catégorie--</option>
                    <?php foreach ($types as $type) { ?>
                        <option value="<?= $type->id_types ?>"><?= $type->type ?></option>
                    <?php } ?>
                </select>
                <p><?= isset($errors['id_types']) ? $errors['id_types'] : ""  ?></p>
            </div>
        </div>
        <div class="col">
            <div class="form-group w-25 mx-auto text-center mt-4">
                <label for="id_consoles">Console :*</label>
                <select class="form-control" name="id_consoles" id="id_consoles" required>
                    <option disabled selected>--Sélectionnez la console du jeu --</option>
                    <?php foreach ($consoles as $console) { ?>
                        <option value="<?= $console->id_consoles ?>"><?= $console->console ?></option>
                    <?php } ?>
                </select>
                <p><?= isset($errors['id_consoles']) ? $errors['id_consoles'] : ""  ?></p>
            </div>
        </div>
        <div class="col">
            <div class="form-group w-25 mx-auto text-center mt-4">
                <label for="game">Nom du Jeu :*</label>
                <input class="form-control" type="text" name="game" id="game">
                <p><?= isset($errors['game']) ? $errors['game'] : "" ?></p>
            </div>
        </div>
        <div class="col">
            <div class="form-group w-50 mx-auto text-center mt-4">
                <label for="description">Description du Jeu :*</label>
                <textarea class="form-control" name="description" id="description" cols="50" rows="5"></textarea>
                <?= isset($errors['description']) ? $errors['description']: "" ?>
            </div>
        </div>
        <div class="form-group w-50 mx-auto text-center mt-4">
            <label for="picture">Image du jeu :*</label>
            <input class="form-control" type="file" name="picture" id="picture" accept="image/png, image/jpeg, image/jpg">
            <p><?= isset($errors['picture']) ? $errors['picture'] : "" ?></p>
        </div>
        <p class="text-center mt-4">* : signifie que les champs sont obligatoire</p>
        <div class="form-group mt-5 text-center">
            <button type="submit" class="btn btn-primary">Ajouter un jeu</a>
        </div>
    </form>
</main>