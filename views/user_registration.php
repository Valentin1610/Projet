<main>
    <div>
        <div class="mt-4 text-center">
            <p class="text-white"> <img class="captaintoad" src="/public/assets/img/captaintoad.png" alt="captaintoad">Vous êtes dans : Inscription</p>
        </div>
    </div>
    <fieldset>
        <div class="form_container">
            <form method="post" enctype="multipart/form-data">
                <h2 class="text-center mt-2">S'inscrire</h2>
                <div class="input_box">
                    <label for="username">Pseudo : *</label>
                    <input class="form-control" type="text" id="username" name="username" placeholder="Entrez votre pseudo" required>
                    <p class="d-none form-text error text-danger" id="helpusername">Veuillez entrez un Pseudo valide qui contient au moins 4 caractéres</p>
                    <p><?= isset($errors['user']) ? $errors['user'] : "" ?></p>
                </div>
                <div class="input_box">
                    <label for="email">Adresse Mail : *</label>
                    <input class="form-control" type="email" name="email" id="email" placeholder="Entrez votre adresse mail" required>
                    <p class="d-none form-text error text-danger" id="helpmail">Veuillez entrez un email valide</p>
                    <p><?= isset($errors['email']) ? $errors['email'] : "" ?></p>
                </div>
                <div class="input_box">
                    <label for="password">Mot de passe : *</label>
                    <input class="form-control" type="password" name="password" id="password" placeholder="Entrez votre mot de passe" required>
                    <i class="uil uil-eye-slash pw_hide"></i>
                    <p id='contentpassword' class="d-none error form-text text-danger">Veuillez créer un mot de passe d'au moins 12 caractéres, comprenant au moins une lettre minuscule, un chiffre, une lettre majuscule et un caractére spécial.</p>
                    <p><?= isset($errors['password']) ? $errors['password'] : "" ?></p>
                </div>
                <div class="input_box">
                    <label for="passwordVerif">Confirmez votre mot de passe : *</label>
                    <input class="form-control" type="password" name="passwordVerif" id="passwordVerif" placeholder="Confirmez votre mot de passe" required>
                    <i class="uil uil-eye-slash pw_hide"></i>
                    <p id="passwordHelp" class="d-none form-text error text-danger">Votre mot de passe n'est pas identique</p>
                    <p><?= isset($errors['passwordVerif']) ? $errors['passwordVerif'] : "" ?></p>
                </div>
                <div class="input_box">
                    <label for="profil">Photo de profil : </label>
                    <input type="file" name="profil" id="profil" accept="image/jpeg, .jpg, .png">
                </div>
                <div class="mt-3">
                    <p>* : signifie que les champs sont obligatoires</p>
                </div>
                <div class="text-center">
                    <button type="submit">
                        S'inscrire
                    </button>
                </div>
            </form>
        </div>
    </fieldset>
</main>
<script src="/public/assets/js/<?= $script ?>"></script>