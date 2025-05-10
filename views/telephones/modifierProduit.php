<h1 class="m-4">Modifier les informations d'un Produit</h1>

<form method="post" class="container" enctype="multipart/form-data">
    <div class="mb-3">
        <label for="nom" class="form-label">Nom</label>
        <input type="text" class="form-control" name="nom" id="nom" value=<?php if($telephone->nom)echo $telephone->nom;?>>
    </div>
    <div class="mb-3">
        <label for="prix" class="form-label">Prix</label>
        <input type="text" class="form-control" name="prix" id="prix" value=<?php if($telephone->prix)echo $telephone->prix;?>>
    </div>
    <div class="mb-3">
        <label for="quantite" class="form-label">Quantite</label>
        <input type="number" class="form-control" name="quantite" id="quantite" value=<?php if($telephone->quantite)echo $telephone->quantite;?>>
    </div>
    <div class="mb-3">
        <input type="file" name="image">
    </div>
    <div class="form-floating">
        <textarea style="height: 100px" class="form-control" name="courte_description"
                  placeholder="Entrer votre courte description"
                  id="courte_description"><?php if($telephone->courte_description)echo $telephone->courte_description;?></textarea>
        <label for="courte_description">Courte description</label>
    </div>
    <br>

    <div class="form-floating">
        <textarea style="height: 100px" class="form-control" name="description" placeholder="Entrer votre description"
                  id="description"><?php if($telephone->description)echo $telephone->description;?></textarea>
        <label for="description">Descriptions</label>
    </div><br>


    <input type="submit" class="btn btn-success" name="modify" value="Modifier les informations du produit">
</form>
    
