<main>
    <h2 class="text-white mt-3 text-center">Contactez-nous</h2>
    <p class="text-center text-white">En cours de développement</p>
    <section id="contact">
        <div class="container">
            <form method="post" enctype="multipart/form-data">
                <p class="text-white">Si vous avez un problème, une astuce que vous n'avez pas compris, n'hésitez pas à nous contacter.</p>

                <input type="text" name="user" id="user" placeholder="Entrez votre pseudo" required>
                <p class="d-none error text-danger">Entrez un pseudo valide </p>
                <p class="text-danger"><?= isset($errors['user'])? $errors['user'] : ""?></p>

                <input type="email" name="email" id="email" placeholder="Entrez votre adresse mail" required>
                <p class="d-none error text-danger">Entrez une adresse mail</p>
                <p class="text-danger"><?= isset($errors['email']) ? $errors['email'] : "" ?></p>
                <p class="text-danger"><?= isset($errors['contact']) ?></p>

                <input type="text" name="content" id="content" placeholder="Entrez l'objet de votre message" required>
                <p class="d-none error text-danger">Entrez l'objet de votre message</p>
                <p class="text-danger"><?= isset($errors['object']) ? $errors['object'] : "" ?></p>

                <textarea name="text" id="content" placeholder="Entrez votre message ici" cols="45" rows="5" required></textarea>
                <p class="text-danger"><?= isset($errors['content']) ? $errors['content'] : ""  ?></p>

                <button type="submit">Envoyer</button>
            </form>
        </div>
    </section>
</main>
<script src= "/public/assets/js/<?= $script ?>"></script>