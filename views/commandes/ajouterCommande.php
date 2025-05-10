<form method="post">
    <div class="mb-3">
        <label for="nom" class="form-label">Quantite</label>
        <input type="text" class="form-control" name="quantite" >
    </div>
    <div class="mb-3">
        <label for="prenom" class="form-label">Prix</label>
        <input type="text" class="form-control" name="prix" >
    </div>
    <div class="mb-3">
        <label for="courriel" class="form-label">Statut</label>
        <input type="text" class="form-control" name="statut" >
    </div>
    <div class="mb-3">
        <label for="telephone" class="form-label">Date de commande</label>
        <input type="date" class="form-control" name="date_creation" >
    </div>
    <div class="mb-3">
        <label for="date_naissance" class="form-label">identifiant de l'utilisateur</label>
        <input type="text" class="form-control" name="id_utilisateur" >
    </div>
    
    <div class="mb-3">
        <label for="date_naissance" class="form-label">Mode de paiement</label>
        <input type="text" class="form-control" name="mode_paiement">
    </div>
   

    <input type="submit" class="btn btn-success" name="ajouter" value="Ajouter commande">


</form>