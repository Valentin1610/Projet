<div>
    <div class="p-4 text-center">
        <p class="text-white"> <img class="captaintoad" src="/public/assets/img/captaintoad.png" alt="captaintoad">Vous êtes dans : Accueil</p>
    </div>
</div>

<!-- Fin de Guide Toad -->

<!-- Présentation du site -->

<section class="p-3 text-white text-center">
    <h2>Présentation du Site</h2>
    <p class="p-4">
        Bienvenue au Royaume Champignon ou plutôt bienvenue sur mon Site Internet où vous trouverez pleins d'astuces sur les différents Jeux Mario. <br>Mais aussi des inscriptions à des Tournois sur différents Jeux Mario.
        Créer par Valentin Sucaud.
    </p>
</section>

<!-- Fin De présentation du site -->

<!-- Cards Astuce Ajoutées et News -->

<div class="container-fluid p-3">
    <div class="row">
        <div class="col-sm md-4 mb-3 ">
            <div class="card w-50 mx-auto">
                <div class="card-body">
                    <p class="text-center">Derniéres astuces ajoutées</p>
                    <div>
                        <hr class="line">
                    </div>
                    <?php foreach($tips as $tip){ ?>
                    <p><?= $tip->tip?> (<?=$tip->game?>)</p>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Fin des Cards Astuce Ajoutées et News -->