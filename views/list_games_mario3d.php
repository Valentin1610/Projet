<main>
    <div>
        <div class="p-3 text-center">
            <p class="text-white"> <img class="captaintoad" src="/public/assets/img/captaintoad.png" alt="captaintoad">Vous êtes dans : <a href="/controllers/website/home-ctrl.php" target="_blank">Accueil</a> >> <a href="/controllers/website/list_games-ctrl.php?id_types=<?=$types->$id_types ?>">Les Consoles 3D</a> >> <?= $consoles->console ?> </p>
        </div>
    </div>
    <h2 class="text-center text-white mt-3">Liste des Jeux <?= $consoles->console ?></h2>
    <div class="container-fluid mt-4">
        <div class="row">
            <?php foreach ($getGames as $getGame) { ?>
                <div class="col-sm-4">
                    <div class="card bg-transparent border-0">
                        <div class="card-body text-center">
                            <a href="/controllers/website/list_tips-ctrl.php?id_types=<?=$getGame->id_types?>&id_consoles=<?=$getGame->id_consoles?>&id_games=<?=$getGame->$id_games?>"><img class="img-fluid w-50 p-3" src="/public/uploads/games/<?=$getGame->picture ?>" alt="<?= $getGame->game ?>"></a>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</main>