<form method="post">
    <div class="mb-3">
        <label for="nom" class="form-label">Nom</label>
        <input type="text" class="form-control" name="nom" id="nom">
    </div>
    <div class="mb-3">
        <label for="prenom" class="form-label">Prenom</label>
        <input type="text" class="form-control" name="prenom" >
    </div>
    <div class="mb-3">
        <label for="courriel" class="form-label">Courriel</label>
        <input type="email" class="form-control" name="email" >
    </div>
    <div class="mb-3">
        <label for="telephone" class="form-label">Numero telephone</label>
        <input type="text" class="form-control" name="telephone" >
    </div>
    <div class="mb-3">
        <label for="date_naissance" class="form-label">Date de naissance</label>
        <input type="date" class="form-control" name="date_naissance" >
    </div>
    
    <div class="mb-3">
        <label for="date_naissance" class="form-label">Role</label>
        <input type="text" class="form-control" name="id_role">
    </div>

    <div class="mb-3">
        <label for="mot_de_passe" class="form-label">Mot de passe</label>
        <input type="password" class="form-control" name="mot_de_passe">
    </div>

    <div class="mb-3">
        <label for="c_mot_de_passe" class="form-label">Confirme mot de passe</label>
        <input type="password" class="form-control" name="c_mot_de_passe">
    </div>
   

    <input type="submit" class="btn btn-success" name="ajouter" value="Ajouter">


</form>