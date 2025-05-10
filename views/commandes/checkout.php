<div class="container"><br>
    <h5>Date : <?= $date = date("d-m-y"); ?></h5>
    <hr>
    <h5>Expédition à : <b><?= $_SESSION['Utilisateur']->nom; ?></b></h5>
    <hr>
    <div class="row">
        Nombre d'articles: (<?= $_SESSION['quantite']; ?>)
    </div>


    <div class="row">
        <h3>Prix totale :<?= $_SESSION['taxesTotal']; ?> $</h3>
    </div>
    <hr>
</div>

<h5>Addresse d'expédition : <?php     echo $_SESSION['adresseLivraison']->rue . "," . $_SESSION['adresseLivraison']->ville . "," . $_SESSION['adresseLivraison']->province . "."; ?></h5>
<div class="container">
    <hr>
    <h5>Numero de téléphone:<?php echo $_SESSION['Utilisateur']->telephone;
    ?>
    </h5>
    <hr>
    <?php if (isset($_SESSION['Utilisateur'])) { ?>
        <div id="paypal-button-container"></div>
        <script src="https://www.paypal.com/sdk/js?client-id=ARHzMtx2fgP1Yuqaoqtnpx3vgpclsuy4zkAaWRGYZOtbf8oyqNeeb-HhkKr5ZGo3Vp8eIZgP2_THlT8L&currency=CAD"></script>
        <script>
            paypal.Buttons().render('#paypal-button-container');
        </script>
    <?php } ?>
    <hr>
</div>
<script>
    paypal.Buttons({
        createOrder: function(data, actions) {
            return actions.order.create({
                purchase_units: [{
                    amount: {
                        value: '<?= $total; ?>'
                    }
                }]
            });
        },
        onApprove: async (data, actions) => {
            request.url = "<?= URI . "
        commandes / voirCommande
        "; ?>";
            const order = await actions.order.capture();
            console.log(order);
            alert('Transaction completed by ' + order.payer.name.given_name);
        }
    }).render('#paypal-button-container');
</script>