<h1 class="text-center m-5">Gestion Utilisateurs</h1>

<table class="table">
    <thead>
    <tr>
        <th scope="col">#</th>
        <th scope="col">Nom</th>
        <th scope="col">Prenom</th>
        <th scope="col">Email</th>
        <th scope="col">Telephone</th>
        <th scope="col">Date de naissance</th>
        <th scope="col">Role</th>
        <th scope="col">Actions</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($users as $user): ?>
        <tr>
            <td><?= $user->id_utilisateur; ?></td>
            <td><?= $user->nom; ?></td>
            <td><?= $user->prenom; ?></td>
            <td><?= $user->email; ?></td>
            <td><?= $user->telephone; ?></td>
            <td><?= $user->date_naissance; ?></td>
            <td><?= $user->id_role; ?></td>
            <td>
                <div class="btn-group" role="group">
                <a href="<?= URI . "auths/modifierInfoUser/$user->id_utilisateur"; ?>" class="btn btn-warning"><i class="bi bi-pencil-square"></i> Modifier</a>

                    <a href="<?= URI . "auths/deleteUser/$user->id_utilisateur";?>" class="btn btn-danger"><i
                                class="bi bi-trash3-fill"></i> Supprimer</a>
                </div>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>

<a href="<?= URI . "auths/ajouterUtilisateur"; ?>" class="btn btn-primary">Ajouter un utilisateur</a><br><br>

