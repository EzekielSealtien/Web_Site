<h1 class="text-center m-5">Mon panier</h1>
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
        $nbreDeCommande = 0;
        $soustotal = 0;
        $total = 0;
        $_SESSION['quantite'] = 0;
        foreach ($telephones as $telephone) {
            $quantite = $telephone[0];
            $telephone = $telephone[1];
            $soustotal += $quantite * $telephone->prix;
            $total = $soustotal + 9  + ($soustotal * 0.05) + ($soustotal * 0.0998);
            $_SESSION['quantite'] += $quantite;
            $_SESSION['total'] = $total;
            $_SESSION['soustotal'] = $soustotal;
            $_SESSION['taxesTotal'] =  ($soustotal * 0.05) + $soustotal * 0.0998;
        ?>
            <form action="<?= URI . "paniers/modifier/$telephone->id_telephone"; ?>" method="post">
                <tr>
                    <th scope="row"><?= $cpt++; ?></th>
                    <td><img height="100px" width="100px" src="<?=
                                                                (isset($telephone->chemin_image)) ?
                                                                    URI . $telephone->chemin_image :
                                                                    URI . "assets/image.jpeg";

                                                                ?>" alt="..."></td>
                    <td><?= $telephone->nom; ?></td>
                    <td><?= $telephone->prix; ?></td>
                    <td><input type="number" name="quantite" min="0" max="<?= $telephone->quantite; ?>" value="<?= $quantite; ?>">
                    </td>
                    <td><?= $telephone->courte_description; ?></td>
                    <td>
                        <div class="col mb-4 mt-2">
                            <button type="submit" class="btn btn-warning"><i class="bi bi-pencil-square"></i></button>
                        </div>
                        <div class="col">
                            <a class="btn btn-danger" href="<?= URI . "paniers/supprimer/$telephone->id_telephone"; ?>"><i class="bi bi-trash3-fill"></i></a>
                        </div>
                    </td>
                </tr>
            </form>
        <?php
        }
        ?>
    </tbody>
</table>
<?php
if ($total != 0) {
    $_SESSION['taxesTotal']=$total
?>
    <div class="row justify-content-end">
        <div class="col-6">
            <p>Sous-total : <?= $soustotal ?>$</p>
            <p>5% TPS : <?= $soustotal * 0.05 ?>$</p>
            <p>9,98% TVQ : <?= $soustotal * 0.0998 ?>$</p>
            <p>Frais de livraison : 9$</p>

            <hr>
            <p>Total : <?= $total ?>$</p>
        </div>
    </div>

    <form method="post">
        <input type="submit" class="btn btn-success" name="paiement" value="Passer au paiement">
    </form>
<?php
} else {
?>
    <h1 class="text-center m-5"><i class="bi bi-bag"></i>Votre panier est vide.</h1>

<?php
}
?>