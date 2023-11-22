<main>
    <div>
        <div class="mt-3 text-center">
            <p class="text-white"> <img class="captaintoad" src="/public/assets/img/captaintoad.png" alt="captaintoad">Vous êtes dans : <a href="/controllers/website/home-ctrl.php" target="_blank">Accueil</a> >> Les Jeux <?= $types->type ?> </p>
        </div>
    </div>
    <h2 class="text-center mt-2 text-white">Jeux <?= $types->type ?></h2>
    <div class="container-fluid mt-1">
        <div class="row align-items-center">
            <?php foreach ($games as $game) { ?>
                <div class="col-sm-4 mt-3">
                    <div class="card bg-transparent border-0 text-center align-items-center mt-4">
                        <div class="card-body p-2">
                            <a href="/controllers/website/list_tips-ctrl.php?id_types=<?= $game->id_types ?>&id_games=<?= $game->id_games ?>">
                                <img class="w-75 card-img-top rounded p-1 p-lg-5" src="/public/uploads/games/<?= $game->picture ?>" alt="<?= $game->picture ?>"></a>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
    <div class="container-fluid mt-4">
        <div class="row align-items-center">
            <?php foreach ($get3Dconsoles as $get3Dconsole) { ?>
                <div class="col-sm-4 mt-3">
                    <div class="card bg-transparent border-0 text-center align-items-center">
                        <div class="card-body p-0">
                            <a href="/controllers/website/list_games_mario3d-ctrl.php?id_types=<?= $get3Dconsole->id_types ?>&id_consoles=<?= $get3Dconsole->id_consoles ?>">
                                <img class="w-75 img-fluid rounded p-4 p-lg-5" src="/public/uploads/consoles/<?= $get3Dconsole->logo ?>" alt="<?= $get3Dconsole->logo ?>"></a>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</main>