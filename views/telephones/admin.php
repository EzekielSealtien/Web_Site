<h1 class="text-center m-5">Admin panel</h1>

<div>
    <a class="btn btn-primary " href=<?= URI . "telephones/ajouter" ?>> Ajouter</a>
</div>
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
    <?php
    $cpt = 1;
    foreach ($telephones as $telephone) {
        ?>
        <tr>
            <th scope="row"><?= $cpt++; ?></th>
            <td><img height="100px" width="100px" src="<?=
                (isset($telephone->chemin_image)) ?
                    URI . $telephone->chemin_image :
                    URI . "assets/image.jpeg";

                ?>" alt="..."></td>
            <td><?= $telephone->nom; ?></td>
            <td><?= $telephone->prix; ?></td>
            <td><?= $telephone->quantite; ?></td>
            <td><?= $telephone->courte_description; ?></td>
            <td>
                <div class="col mb-4 mt-2">
                    <a class="btn btn-warning" href=""><i class="bi bi-pencil-square"></i></a>
                </div>
                <div class="col">
                    <a class="btn btn-danger" href="<?= URI . "telephones/supprimer/$telephone->id_telephone"; ?>"><i
                                class="bi bi-trash3-fill"></i></a>
                </div>
            </td>
               


            
        </tr>
        <?php
    }


    ?>

    </tbody>
</table>