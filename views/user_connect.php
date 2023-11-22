<main>
    <div class="form_container text-center bg-transparent mx-auto w-50">
        <div class="form login_form">
            <form method="post">
                <h2 class="text-white">Se connecter</h2>
                <div class="input_box">
                    <input class="text-center" type="text" placeholder="Entrer votre pseudo" id="username" name="username" required>
                    <p id="usernameerrortext" class="d-none text-danger form-text error form-text ">Veuillez entrez un pseudo valide</p>
                    <p><?= isset($errors['user']) ? $errors['user'] : "" ?></p>
                </div>
                <div class="input_box">
                    <input class="text-center" type="password" name="password" id="password" placeholder="Entrer votre Mot de passe" required>
                    <i class="uil uil-lock password"></i>
                    <i class="uil uil-eye-slash pw_hide"></i>
                    <p id="sentenceErrorPassword" class="d-none text-danger form-text error">Entrez votre mot de passe qui doit contenir au moins 12 caractéres</p>
                    <p><?= isset($errors['password']) ? $errors['password'] : "" ?></p>
                </div>
                <div class="option_field">
                    <a class="text-white" href="#" class="forgot_pw text-black">Mot de Passe oublié ?</a>
                </div>
                <div class="text-center">
                    <button type="submit">Se connecter</button>
                </div>
                <div class="login_signup text-white">
                    Tu ne possédes pas de compte ?
                    <a href="/controllers/website/user_registration-ctrl.php" id="login" target="_blank">Inscris-toi</a>
                </div>
            </form>
        </div>
    </div>
    <script src="/public/assets/js/script.js"></script>
</main>