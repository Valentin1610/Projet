<main>
    <h2 class="text-center mt-4">Modifier la catégorie</h2>
    <form method="post" class="">
        <div class="form-group w-50 mx-auto mt-4 text-center">
            <label for="type">Modifier la catégorie : *</label>
            <input class="form-control" type="text" name="type" id="name" value="<?= $typesObj->type ?>">
            <button type="submit" class="btn btn-primary mt-4">Modifier</button>
            <p class="mt-2"><?= isset($errors['type']) ? $errors['type'] : "" ?></p>
        </div>
    </form>
</main>