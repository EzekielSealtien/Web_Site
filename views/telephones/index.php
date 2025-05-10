<div class="container">
    <h1 class="text-center">Appareils populaires</h1>


    <div class="row row-cols-1 row-cols-md-3 g-4 py-5">
        <?php
        foreach ($telephones as $telephone) {
        ?>
            <div class="col">
                <div class="card">
                    <img height="400px" src="<?=
                                                (isset($telephone->chemin_image)) ?
                                                    URI . $telephone->chemin_image :
                                                    URI . "assets/image.jpeg";

                                                ?>" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title"><?= $telephone->nom; ?></h5>
                        <p class="card-text"><?= $telephone->courte_description; ?></p>
                    </div>
                    <div class="d-flex justify-content-center mb-4">
                        <h3> <?= $telephone->prix; ?>$</h3>
                    </div>
                    <div class="text-center mb-4">
                        <a href="<?= URI . "paniers/ajouter/" . $telephone->id_telephone; ?>" class="btn btn-primary  btn-lg">Ajouter
                            au panier</a>
                    </div>
                </div>

            </div>
        <?php
        }

        ?>

    </div>

</div>