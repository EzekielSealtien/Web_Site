<?php

class Paniers extends Controllers
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {

        $panier = new Panier();
        $telephones = $panier->getAll();
        $tableauCommande = [];
        if (isset($_POST['paiement'])) {
            $tableauCommande['quantite'] = $_SESSION['quantite'];
            $tableauCommande['prix'] = $_SESSION['total'];
            $tableauCommande['statut'] = "En cours";
            $date_actuelle = date("Y-m-d");
            $tableauCommande['date_creation'] = $date_actuelle;
            $user = $_SESSION['Utilisateur'];
            $id_utilisateur = $user->id_utilisateur;
            $tableauCommande['id_utilisateur'] = $id_utilisateur;
            $tableauCommande['mode_paiement'] = "Paypal";
            $commande = new Commande();
            $commande->insererCommande($tableauCommande);
            if (isset($_SESSION['Utilisateur'])) {
                header("Location:" . URI . "adresses/index");
            } else {
                header("Location:" . URI . "auths/connexion");
            }
        }


        $this->render("index", compact('telephones'));
    }

    public function modifier($id_telephone)
    {

        if (is_numeric($id_telephone)) {
            $quantite = $_POST['quantite'];
            if (isset($quantite) && is_numeric($quantite)) {
                $panier = new Panier();
                $panier->ajouter($id_telephone, $quantite);
                header("Location: " . URI . "paniers/index");
            }
        }
    }

    public function ajouter($id_telephone)
    {
        if (is_numeric($id_telephone)) {
            $panier = new Panier();
            $panier->ajouter($id_telephone, 1);
            header("Location: " . URI . "telephones/index");
        }
    }

    public function supprimer($id_telephone)
    {
        if (is_numeric($id_telephone)) {
            $panier = new Panier();
            $panier->supprimer($id_telephone);
            header("Location: " . URI . "paniers/index");
        }
    }
}
