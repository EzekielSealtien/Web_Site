<h1 class="m-4">Modifier les informations d'un utilisateur</h1>
<form class="container" method="POST">
<div class="col-md-2">
    <label for="nom" class="form-label">Nom</label>
    <input type="text" class="form-control" name="nom" value=<?php if($user->nom)echo $user->nom;?>>
  </div>

  <div class="col-md-2">
    <label for="Prenom" class="form-label">Prenom</label>
    <input type="text" class="form-control" name="prenom"  value=<?php if($user->prenom)echo $user->prenom?>>
  </div>
  <div class="col-md-6">
    <label for="inputEmail4" class="form-label">Email</label>
    <input type="email" class="form-control" name="email" value=<?php if($user->email)echo $user->email?>>
  </div>
  <div class="col-md-2">
    <label for="Telephone" class="form-label">Telephone</label>
    <input type="text" class="form-control" name="telephone" value=<?php if($user->telephone)echo $user->telephone?>>
  </div>
 
  <div class="col-md-2">
    <label for="date" class="form-label">Date de naissance</label>
    <input type="text" class="form-control" name="date_naissance" value=<?php if($user->date_naissance)echo $user->date_naissance?>>
  </div><br>
 <input type="submit" class="btn btn-primary btn-block-btn-lg" name="enregistrer" value="Enregistrer les modifications">
</form>
    
