<h1 class="text-center m-5">Mes Produits</h1>

<table class="table">
    <thead>
    <tr>
        <th scope="col">#</th>
        <th scope="col">Image</th>
        <th scope="col">Nom</th>
        <th scope="col">Prix</th>
        <th scope="col">Quantite</th>
        <th scope="col">Courte Description</th>
        <th scope="col">Actions</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($telephones as $telephone): ?>
        <tr>
            <td><?= $telephone->id_telephone; ?></td>
            <td><img height="100px" width="100px" src="<?= (isset($telephone->chemin_image)) ? URI . $telephone->chemin_image : URI . "assets/image.jpeg"; ?>" alt="..."></td>
            <td><?= $telephone->nom; ?></td>
            <td><?= $telephone->prix . "$"; ?></td>
            <td><?= $telephone->quantite; ?></td>
            <td><?= $telephone->courte_description; ?></td>
            <td>
                <div class="btn-group" role="group">
                    <a href="<?= URI . "telephones/modifierProduit/$telephone->id_telephone" ; ?>" class="btn btn-warning"><i class="bi bi-pencil-square"></i></a>
                    
                    <a href="<?= URI . "telephones/supprimer/" . $telephone->id_telephone; ?>" class="btn btn-danger"><i class="bi bi-trash3-fill"></i></a>
                </div>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>

<a href="<?= URI . "telephones/ajouterProduit"; ?>" class="btn btn-primary">Ajouter un Produit</a><br><br>