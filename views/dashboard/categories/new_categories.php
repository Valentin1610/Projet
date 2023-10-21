<main>
    <h2 class="text-center mt-4">Ajouter une catégorie</h2>
    <form method="post">
        <div class="form-group w-50 mx-auto text-center mt-4">
            <label for="type">Ajout d'une catégorie</label>
            <input class="form-control" type="text" id="type" name="type">
            <button type ="submit "class="btn btn-primary mt-4">Ajouter</button>
            <p><?= isset($errors['type']) ? $errors['type'] : ''?></p>
        </div>
    </form>
</main>