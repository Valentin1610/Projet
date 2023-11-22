<main>
    <h2 class="text-center mt-4">Modifier l'Événement</h2>
    <form method="post" enctype="multipart/form-data">
        <div class="form-group text-center mx-auto w-50 mt-4">
            <label for="event">Nom de l'événement :* </label>
            <input class="form-control" type="text" id="event" name="event" placeholder="Ex : Tournoi Mario Kart" value="<?= $event->event ?>">
            <p><?= isset($errors['event']) ? $errors['event'] : "" ?></p>
        </div>
        <div class="form-group text-center mx-auto w-50 mt-4">
            <label for="inaugurate">Date de l'événement :* </label>
            <input class="form-control" type="date" id="inaugurate" name="inaugurate" value="<?= $event->inaugurate ?>">
            <p><?= isset($errors['inaugurate']) ? $errors['inaugurate'] : "" ?></p>
        </div>
        <p class="text-center mt-4">* : signifie que les champs sont obligatoires</p>
        <div class="text-center">
            <button type="submit" class="btn btn-primary mt-3 text-center">Ajouter un événement</button>
        </div>
    </form>
</main>