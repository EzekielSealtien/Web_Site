<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <title>Document</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary justify-content-center ">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse " id="navbarSupportedContent">

                <a class="nav-link active navbar-brand" aria-current="page" href="<?= URI . "telephone/index" ?>"><img height="80px" width="80px" src="<?= URI . "assets/logo.png" ?>" alt=""></a>

                <ul class="navbar-nav me-auto mb-2 mb-lg-0">

                    <li class="nav-item ">
                        <a class="nav-link active" aria-current="page" href="<?= URI . "telephone/index" ?>">Accueil</a>
                    </li>
                    <?php
                    if (!isset($_SESSION['Utilisateur'])) {
                    ?>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= URI . "auths/connexion"; ?>">Connexion</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= URI . "auths/inscription"; ?>">Inscription</a>
                        </li>

                    <?php
                    } else {
                    ?>
                        <li class="nav-item">
                            <a class="nav-link" href=<?= URI . "auths/profil"; ?>>Profil</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href=<?= URI . "auths/deconnexion"; ?>>Deconnexion</a>
                        </li>
                        <?php
                        if (isset($_SESSION['Utilisateur'])) {
                            $user = $_SESSION['Utilisateur'];
                            $role = $user->id_role;
                            if ($role == 1) {
                        ?>
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        Gestion
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href=<?= URI . "auths/gestionUtilisateurs"; ?>>Gestion Utilisateurs</a></li>
                                        <li><a class="dropdown-item" href=<?= URI . "telephones/gestionProduits"; ?>>Gestion Produits</a></li>
                                        <li><a class="dropdown-item" href=<?= URI . "commandes/gestionCommandes"; ?>>Gestion Commandes</a></li>
                                    </ul>
                                </li>
                    <?php
                            }
                        }
                    }

                    ?>
                    <li>
                        <a class="btn btn-primary" href="<?= URI . "paniers/index"; ?>"><i class="bi bi-cart4"><?=
                                                                                                                (isset($_SESSION[Panier::PANIERS])) ?
                                                                                                                    count($_SESSION[Panier::PANIERS]) : 0;
                                                                                                                ?></i></a>
                    </li>
                </ul>
                <form class="d-flex" role="search" method="post" action="<?= URI . "telephones/recherche"; ?>">
                    <input class="form-control me-2" name="recherche" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
            </div>
        </div>
    </nav>