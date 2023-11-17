<main>
    <h2 class="text-white text-center mt-3">Modifier votre profil</h2>
    <div class="container-fluid mt-4">
        <div class="row">
            <div class="col-sm-6">
                <div class="card bg-transparent border-0">
                    <div class="card-body">

                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="card bg-transparent border-0">
                    <div class="card-body ">
                        <form method="post" enctype="multipart/form-data">
                            <div class="form-label text-center">
                                <label class="text-white" for="username">Votre Pseudo: * </label>
                                <input class="form-control" value="<?= $_SESSION['username']->username ?>" type="text" name="username" id="username">
                            </div>
                            <div class="form-label text-center mt-4">
                                <label class="text-white" for="email">Votre adresse mail: * </label>
                                <input class="form-control" value="<?=$_SESSION['username']->email?>" type="email" name="email" id="email">
                            </div>
                            <div class="form-label text-center mt-4">
                                <label class="text-white" for="profil">Votre photo de profil: * </label>
                                <img class="w-25" src="<?= $_SESSION['username']->profil ?>" alt="<?= $_SESSION['username']->profil ?>">
                                <input class="form-control" type="file" name="profil" id="profil">
                            </div>
                            <div class="text-center">
                                <button class="mt-3" type="submit">
                                    Enregistrez
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>