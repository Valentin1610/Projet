<main>
    <h2 class="text-center mt-4">Ajouter une console</h2>
    <form method="post" enctype="multipart/form-data">
        <div class="form-group w-50 mx-auto text-center mt-4">
            <label for="console">Ajout le nom d'une console*</label>
            <input class="form-control" type="text" id="console" name="console">
        </div>
        <div class="form-group w-50 mx-auto text-center mt-5">
            <label for="picture">Logo de la console</label>
            <input class="form-control" type="file" name="picture" id="picture" accept="image/png, image/jpeg, image/jpg">
            <p><?= $errors['error'] ?? '' ?></p>
        </div>
        <p class="text-center mt-4">* : signifie que les champs sont obligatoires</p>
        <div class="text-center">
            <button type ="submit "class="btn btn-primary mt-5 text-center">Ajouter</button>
        </div>
    </form>
</main>