<main>
    <h2 class="text-center mt-4">Ajouter un jeu</h2>
    <form method="post" enctype="multipart/form-data">
        <div class="row">
            <div class="col">
                <div class="form-group w-75 mx-auto text-center mt-4">
                    <label for="category">Catégorie*</label>
                    <select class="form-control" name="category" id="category">
                        <option disabled selected>--Sélectionnez la Catégorie du jeu souhaité--</option>
                    </select>
                </div>
            </div>
            <div class="col">
                <div class="form-group w-75 mx-auto text-center mt-4">
                    <label for="console">Console*</label>
                    <select class="form-control" name="console" id="console" required>
                        <option disabled selected>--Sélectionnez la console du jeu souhaité--</option>
                    </select>
                </div>
            </div>
            <div class="col">
                <div class="form-group w-75 mx-auto text-center mt-4">
                    <label for="name">Nom du Jeu*</label>
                    <input class="form-control" type="text" name="name" id="name">
                </div>
            </div>
            <div class="col">
                <div class="form-group w-75 mx-auto text-center mt-4">
                    <label for="description">Description du Jeu*</label>
                    <textarea class="form-control" name="description" id="description" cols="20" rows="5"></textarea>
                </div>
            </div>
        </div>
        <div class="form-group w-75 mx-auto text-center mt-4">
            <label for="picture">Image du jeu</label>
            <input class="form-control" type="file" name="picture" id="picture">
        </div>
        <p class="text-center mt-4">* : signifie que les champs sont obligatoire</p>
        <div class="form-group mt-4 text-center">
            <button type="submit" class="btn btn-primary">Ajouter un jeu</button>
        </div>
    </form>
</main>