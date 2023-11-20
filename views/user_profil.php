<main>
    <h2 class="text-white text-center mt-4">Modifier votre profil</h2>
    <div class="container-fluid mt-4">
        <div class="row">
            <div class="col-sm-6">
                <div class="card bg-transparent border-0">
                    <div class="card-body">
                        <h2 class="text-center text-white">Liste des favoris</h2>
                        <table class="table w-100 text-center mx-auto mt-5">
                            <thead>
                                <tr>
                                    <th>Titre de l'astuce</th>
                                    <th>Description de l'astuce</th>
                                    <th>Supprimer</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($favs as $fav) { ?>
                                    <tr>
                                        <td><?= $fav->tip ?></td>
                                        <td><?= $fav->description_tip ?></td>
                                        <td>
                                            <a href="/controllers/website/delete_fav-ctrl.php?id_tips=<?= $fav->id_tips ?>&id_user=<?= $_SESSION['user']->id_user ?>">
                                                <i class="fa-solid fa-trash text-danger"></i>
                                            </a>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="card bg-transparent border-0">
                    <div class="card-body ">
                        <form method="post" enctype="multipart/form-data">
                            <div class="form-label text-center">
                                <label class="text-white" for="username">Votre Pseudo: * </label>
                                <input class="form-control" value="<?= $_SESSION['user']->username ?>" type="text" name="username" id="username">
                            </div>
                            <div class="form-label text-center mt-4">
                                <label class="text-white" for="email">Votre adresse mail: * </label>
                                <input class="form-control" value="<?= $_SESSION['user']->email ?>" type="email" name="email" id="email">
                            </div>
                            <div class="form-label text-center mt-4">
                                <label class="text-white" for="profil">Votre photo de profil: * </label>
                                <img class="w-25" src="<?= $_SESSION['user']->profil ?>" alt="<?= $_SESSION['user']->profil ?>">
                                <input class="form-control" type="file" name="profil" id="profil">
                            </div>
                            <div class="text-center">
                                <button class="mt-3" type="submit">
                                    Modifiez
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>