<?php

class Adresses extends Controllers
{
    public function __construct()
    {
        parent::__construct();
    }


    public function index()
    {
        if (isset($_POST['adresse'])) {
            $_POST['defaut'] = 1;
            $_POST['id_utilisateur'] = $_SESSION["Utilisateur"]->id_utilisateur;
            unset($_POST['adresse']);
            $adresse = new Adresse();
            $adresse->insererAdresse($_POST);
            $tab['id_utilisateur'] = $_SESSION["Utilisateur"]->id_utilisateur;
            $adresseLivraison = $adresse->getOneById($tab);
            if ($adresseLivraison) {
                $_SESSION['adresseLivraison'] = $adresseLivraison;
                header("Location:" . URI . "commandes/checkout");
            } else {
                header("Location:" . URI . "adresses/index");
            }
        }
        $this->render("index");
    }
}
