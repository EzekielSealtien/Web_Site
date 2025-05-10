<form method="post" class="container" enctype="multipart/form-data">
    <div class="mb-3">
        <label for="nom" class="form-label">Nom</label>
        <input type="text" class="form-control" name="nom" id="nom">
    </div>
    <div class="mb-3">
        <label for="prix" class="form-label">Prix</label>
        <input type="text" class="form-control" name="prix" id="prix">
    </div>
    <div class="mb-3">
        <label for="quantite" class="form-label">Quantite</label>
        <input type="number" class="form-control" name="quantite" id="quantite">
    </div>
    <div class="mb-3">
        <input type="file" name="image">
    </div>
    <div class="form-floating">
        <textarea style="height: 100px" class="form-control" name="courte_description"
                  placeholder="Entrer votre courte description"
                  id="courte_description"></textarea>
        <label for="courte_description">Courte description</label>
    </div>
    <br>

    <div class="form-floating">
        <textarea style="height: 100px" class="form-control" name="description" placeholder="Entrer votre description"
                  id="description"></textarea>
        <label for="description">Descriptions</label>
    </div><br>


    <input type="submit" class="btn btn-success" name="ajouter" value="Ajouter un Telephone">
</form>