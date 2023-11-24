<main>
    <h2 class="text-center mt-4">Modifier la console</h2>
    <form method="post" enctype="multipart/form-data">
        <div class="form-group w-50 mx-auto text-center mt-4">
            <label for="console">Modifier le nom de la console*</label>
            <input value="<?=$consolesObj->console?>" class="form-control" type="text" id="console" name="console">
            <p><?= isset($errors['console']) ? $errors['console'] : "" ?></p>
        </div>
        <div class="form-group w-50 mx-auto text-center mt-5">
            <label for="picture">Logo de la console</label>
            <input class="form-control" type="file" name="picture" id="picture" accept="image/png, image/jpeg, image/jpg">
            <?php if ($consolesObj->logo){ ?>
                <div><img class="w-25 mt-4" src="/public/uploads/consoles/<?= $consolesObj->logo?>" alt="<?=$consolesObj->console?>"></div>
            <?php } ?>
            <p><?= isset($errors['picture']) ? $errors['picture'] : "" ?></p>
        </div>
        <p class="text-center mt-4">* : signifie que les champs sont obligatoires</p>
        <div class="text-center">
            <button type ="submit "class="btn btn-primary mt-5 text-center">Ajouter</button>
        </div>
    </form>
</main>