<main>
    <h2 class="text-center mt-4">Liste de tous les utilisateurs</h2>
    <div class="container-fluid text-center mt-5">
        <div class="row justify-content-center">
            <table class="table table-striped w-75" >
                <thead>
                    <tr>
                        <th>Pseudo</th>
                        <th>Adresse Mail</th>
                        <th>Modifier</th>
                        <th>Supprimer</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($users as $user){ ?>
                    <tr>
                        <td><?= $user->user ?></td>
                        <td><?= $user->email ?></td>
                        <td>
                            <a href="/controllers/dashboard/users/update_users-ctrl.php">
                                <i class="fa-solid fa-wrench"></i> 
                            </a>
                        </td>
                        <td>
                            <a href="/controllers/dashboard/users/delete_users-ctrl.php">
                                <i class="fa-solid fa-trash text-danger"></i>
                            </a>
                        </td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</main>