<h1 class="text-center m-5">Gestion Commandes</h1>

<table class="table">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Quantite</th>
            <th scope="col">prix</th>
            <th scope="col">Statut</th>
            <th scope="col">Date de commande</th>
            <th scope="col">id utilisateur</th>
            <th scope="col">Mode de paiement</th>
            <th scope="col">Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($commandes as $commande) : ?>
            <tr>
                <td><?= $commande->id_commande; ?></td>
                <td><?= $commande->quantite; ?></td>
                <td><?= $commande->prix; ?></td>
                <td><?= $commande->statut; ?></td>
                <td><?= $commande->date_creation; ?></td>
                <td><?= $commande->id_utilisateur; ?></td>
                <td><?= $commande->mode_paiement; ?></td>
                <td>
                    <div class="btn-group" role="group">
                        <a href="<?= URI . "commandes/modifierCommande/$commande->id_commande"; ?>" class="btn btn-warning"><i class="bi bi-pencil-square"></i> Modifier</a>
                        <a href="<?= URI . "commandes/deleteCommande/$commande->id_commande"; ?>" class="btn btn-danger"><i class="bi bi-trash3-fill"></i> Supprimer</a>

                        <a href="<?= URI . "commandes/voirCommande/$commande->id_commande"; ?>" class="btn btn-primary"><i class="bi bi-trash3-fill"></i> Voir</a>

                    </div>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<a href="<?= URI . "Commandes/ajouterCommande"; ?>" class="btn btn-primary">Ajouter une commande</a><br><br>