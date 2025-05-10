<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <title>Commande</title>
</head>
<body>
<form class="container" method="POST">
<div class="col-md-2">
    <label for="nom" class="form-label">Quantité</label>
    <input type="text" class="form-control" name="quantite" readonly value=<?php if($infoCommande->quantite)echo $infoCommande->quantite;?>>
  </div>

  <div class="col-md-2">
    <label for="Prenom" class="form-label">Prix</label>
    <input type="text" class="form-control" name="prix" readonly  value=<?php if($infoCommande->prix)echo $infoCommande->prix?>>
  </div>
  <div class="col-md-6">
    <label for="inputEmail4" class="form-label">Statut</label>
    <input type="email" class="form-control" name="statut" readonly value=<?php if($infoCommande->statut)echo $infoCommande->statut?>>
  </div>
  <div class="col-md-2">
    <label for="Telephone" class="form-label">Date de commande</label>
    <input type="text" class="form-control" name="date_creation" readonly value=<?php if($infoCommande->date_creation)echo $infoCommande->date_creation?>>
  </div>
 
  <div class="col-md-2">
    <label for="date" class="form-label">Id utilisateur</label>
    <input type="text" class="form-control" name="id_utilisateur" readonly value=<?php if($infoCommande->id_utilisateur)echo $infoCommande->id_utilisateur?>>
  </div>

  <div class="col-md-2">
    <label for="date" class="form-label">Mode de paiement</label>
    <input type="text" class="form-control" name="mode_paiement" readonly value=<?php if($infoCommande->mode_paiement)echo $infoCommande->mode_paiement?>>
  </div>
  
  <br>
</form>
    
</body>
</html>